<?php

namespace App\Services;

use App\Enums\VaccineStatus;
use App\Models\Registration;
use App\Models\VaccineCenter;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegistrationService
{

  public function getVaccineCenters()
  {
    $vaccineCenters = VaccineCenter::all();
    return $vaccineCenters;
  }

  public function getRegisteredUsers(array $data)
  {
    return Registration::where('nid', $data['nid'])->first();
  }

  public function register(array $data)
  {

    DB::beginTransaction();

    try {
      $vaccineCenter = VaccineCenter::find($data['vaccine_center_id']);

      if ($vaccineCenter->occupied >= $vaccineCenter->capacity_per_day) {
        $nextDate = Carbon::parse($vaccineCenter->next_date);

        // Get the configured weekend days
        $weekendDays = config('weekend.weekend_days');

        // Increment the date until it's a weekday
        do {
          $nextDate->addDay();
        } while (in_array($nextDate->dayOfWeek, $weekendDays));

        $vaccineCenter->update([
          'next_date' => $nextDate,
          'occupied' => 0,
        ]);
      } else {
        $vaccineCenter->increment('occupied');
      }

      $registration = Registration::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'nid' => $data['nid'],
        'vaccine_center_id' => $data['vaccine_center_id'],
        'scheduled_date' => $vaccineCenter->next_date,
        'status' => VaccineStatus::Scheduled->value
      ]);

      DB::commit();

      return $registration;
    } catch (QueryException $e) {
      DB::rollBack();
      throw new \Exception('Could not register for the vaccine. Please try again later.' . $e->getMessage());
    }
  }
}
