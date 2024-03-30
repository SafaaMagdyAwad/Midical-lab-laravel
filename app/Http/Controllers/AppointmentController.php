<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\appointmentmail;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class AppointmentController extends Controller
{
   
    public function make_appointment(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'checkes' => 'max:500',
            'image' => 'max:1000',
            
        ];

        // Define custom error messages
        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
           
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request->all());
        $formattedTomorrow = Carbon::tomorrow()->toDateString();
        // dd($formattedTomorrow);
        
        Appointment::create($request->all());
        Mail::to($request->email)->send(new appointmentmail($request->name,$formattedTomorrow));
        return redirect()->back()->with('alert', 'your appointment was booked successfully check your email ');

    }
}
