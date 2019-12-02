<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function store(Request $request){
        dd($request->all(),$request->get('fecha'));
    }
}
