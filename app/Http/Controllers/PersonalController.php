<?php

namespace App\Http\Controllers;

use App\Personal;
use App\User;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function store(Request $request){
        $personal = new Personal();
        $personal->fecha_admision = "2019-11-11";
        $personal->nombres = $request->get('nombre');
        $personal->apellidos = $request->get('apellido');
        $personal->tipo_documento = $request->get('tipodocumento');
        $personal->numero_documento = $request->get('documento');
        $personal->lugar_documento = $request->get('lugar');
        $personal->direccion = $request->get('direccion');
        $personal->telefono = $request->get('telefono');
        $personal->celular = $request->get('celular');
        $personal->eps = $request->get('eps');
        $personal->pension = $request->get('pensiones');
        $personal->cesantias = $request->get('cesantias');
        $personal->cargo = $request->get('cargo');
        $personal->riesgo = $request->get('riesgo');
        $personal->tipo_contrato = $request->get('tipocontrato');
        $personal->tipo_duracion = 1;
        $personal->duracion = $request->get('duracionText');
        $personal->numero_contrato = $request->get('contrato');
        $personal->salario = $request->get('salario');
        $personal->comision = $request->get('comision');
        $personal->ppto = $request->get('ppto');
        $personal->save();

    }
    public function update(Request $request){

        $user = Personal::find(1);
        dd($user);

    }

    public function persona ($personaId){
        $user = Personal::find($personaId);
        return $user;
    }
}