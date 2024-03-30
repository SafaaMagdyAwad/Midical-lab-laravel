<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function start(){
        $testimonials=Testimonial::all();
        $doctors=Doctor::all();
        return view('index',["testimonials"=>$testimonials,"doctors"=>$doctors]);
    }
}
