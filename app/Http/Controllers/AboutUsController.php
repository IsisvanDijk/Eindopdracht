<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
 { public function show(){
        $company = 'Fantasy collection';
        return view('about-us', [ 'company' => $company ]);
    }
 }
