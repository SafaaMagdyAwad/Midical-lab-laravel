<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function make_testimonial(Request $request){
    
            $rules = [
                'name' => 'required|string|max:255',
                'testimonial' => 'required|max:255',
            
                'image' => 'max:1000',
                
            ];
    
            // Define custom error messages
            $messages = [
                'name.required' => 'The name field is required.',
                'testimonial.required' => 'The testimonial field is required.',
                
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
            Testimonial::create($request->all());
            return redirect()->back()->with('alert', 'your testimonial was booked successfully');
    
    }

    public function all_testimonials(){
        $testimonials=Testimonial::all();
        return redirect()->back()->with('testimonials', $testimonials);

    }
}
