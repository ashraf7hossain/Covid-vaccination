<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\SearchRequest;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    protected $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function search(SearchRequest $request)
    {
        $request->validate([
            'nid' => 'required|string',
        ]);

        $registration = $this->registrationService->getRegisteredUsers($request->validated());


        if ($registration) {
            return view('partials.registration_result', compact('registration'));
        }

        return view('partials.registration_result')->with('notRegistered', true);
    }

    public function create()
    {
        $vaccinationCenters = $this->registrationService->getVaccineCenters();
        return view('registration', compact('vaccinationCenters'));
    }

    public function store(RegistrationRequest $request)
    {
        try {
            $this->registrationService->register($request->validated());
            return redirect()->back()->with('success', 'You have successfully registered for the vaccine!');
        } catch (\Exception $e) {
            // \Log::error('Registration Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Could not register for the vaccine. Please try again later.'])->withInput();
        }
    }
}
