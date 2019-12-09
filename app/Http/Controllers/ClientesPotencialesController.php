<?php

namespace App\Http\Controllers;

use App\ClientesPotenciales;
use Illuminate\Http\Request;

class ClientesPotencialesController extends Controller
{
    //
    public function clientes_potenciales () {

      return ClientesPotenciales::all();

    }
}
