<?php

use Illuminate\Database\Seeder;

class TipoContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data = [
            ['nombre'=>'Termino fijo'],
            ['nombre'=>'Termino indefinido'],
            ['nombre'=>'Prestacion de servicios'],
        ];
        \DB::table('tipo_contratos')->insert($data);
    }
}
