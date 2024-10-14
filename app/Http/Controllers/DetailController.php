<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show($id)
    {
        return view('detail', compact('id'));
    }
}
