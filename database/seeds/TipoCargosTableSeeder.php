<?php

use Illuminate\Database\Seeder;

class TipoCargosTableSeeder extends Seeder
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
            ['nombre'=>'Ejecutivo'],
        ];
        \DB::table('tipo_cargos')->insert($data);
    }
}
