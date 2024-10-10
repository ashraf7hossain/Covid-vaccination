<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\VaccinationReminder;
use App\Models\Registration;

class SendVaccinationReminders extends Command
{
    protected $signature = 'vaccination:remind';
    protected $description = 'Send vaccination reminder emails to users';

    public function handle()
    {
        $tomorrow = now()->addDay()->format('Y-m-d');

        // Get registrations for tomorrow
        $registrations = Registration::whereDate('scheduled_date', $tomorrow)->get();

        foreach ($registrations as $registration) {
            Mail::to($registration->email)->send(new VaccinationReminder($registration));
        }

        $this->info('Vaccination reminders sent successfully!');
    }
}
