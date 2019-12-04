<?php

use Illuminate\Database\Seeder;

class TipoDocumentosTableSeeder extends Seeder
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
            ['nombre'=>'C.C'],
            ['nombre'=>'C.E'],
            ['nombre'=>'Nit'],
        ];
        \DB::table('tipo_documentos')->insert($data);
    }
}
