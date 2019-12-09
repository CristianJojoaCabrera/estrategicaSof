<?php

namespace App\Http\Controllers;

use App\Personal;
use App\User;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //
    public function personal(){
        $personal = Personal::with(['tipo_documento','tipo_contrato','tipo_cargo'])->get();
        //dd($personal);
        return $personal;
    }

    public function store(Request $request){
        $personal = new Personal();
        $this->datosPerson($personal,$request);
        $personal->save();
        return $personal;

    }
    public function update(Request $request,$personaId){
        $user = Personal::find($personaId);
        $this->datosPerson($user,$request);
        $user->save();
        return $user;
    }

    public function persona ($personaId){
        $user = Personal::with(['tipo_documento','tipo_contrato','tipo_cargo'])->where('id',$personaId)->first();
        return $user;
    }

    public function datosPerson($personal,$request)
    {
        $personal->fecha_admision = "2019-11-11";
        $personal->nombres = $request->get('nombre');
        $personal->apellidos = $request->get('apellido');
        $personal->tipo_documento_id = $request->get('tipodocumento');
        $personal->numero_documento = $request->get('documento');
        $personal->lugar_documento = $request->get('lugar');
        $personal->direccion = $request->get('direccion');
        $personal->telefono = $request->get('telefono');
        $personal->celular = $request->get('celular');
        $personal->eps = $request->get('eps');
        $personal->pension = $request->get('pensiones');
        $personal->cesantias = $request->get('cesantias');
        $personal->tipo_cargo_id = $request->get('cargo');
        $personal->riesgo = $request->get('riesgo');
        $personal->tipo_contrato_id = $request->get('tipocontrato');
        $personal->tipo_duracion = 1;
        $personal->duracion = $request->get('duracionText');
        $personal->numero_contrato = $request->get('contrato');
        $personal->salario = $request->get('salario');
        $personal->comision = $request->get('comision');
        $personal->ppto = $request->get('ppto');
    }
}
