<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
    protected $table = "personal";

    public function tipo_documento(){
        return $this->belongsTo('App\TipoDocumento', 'tipo_documento_id','id');
    }

    public function tipo_contrato(){
        return $this->belongsTo('App\TipoContrato', 'tipo_contrato_id','id');
    }

    public function tipo_cargo(){
        return $this->belongsTo('App\TipoCargo', 'tipo_cargo_id','id');
    }

}
