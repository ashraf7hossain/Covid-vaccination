<?php

namespace App\Services;

use App\Enums\VaccineStatus;
use App\Models\Registration;
use App\Models\VaccineCenter;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class RegistrationService
{

    public function getVaccineCenters(){
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
                $vaccineCenter->update([
                    // Adding one day to the available date, ignoring weekends and holidays
                    'next_date' => \Carbon\Carbon::parse($vaccineCenter->next_date)->addDay(),
                    'occupied' => 0
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
            throw new \Exception('Could not register for the vaccine. Please try again later.'. $e->getMessage());
        }
    }
}
