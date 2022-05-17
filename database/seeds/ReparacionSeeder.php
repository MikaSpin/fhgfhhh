<?php

use Illuminate\Database\Seeder;

class ReparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reparacion')->insert([
        'rep_fecha'=>'2005-06-20',
        'rep_descripcion'=>'Cambio de parachoques',
        'rep_costo'=>'11.00',
        'veh_id'=>'1',
        'mec_id'=>'1',
        ]);
        DB::table('reparacion')->insert([
        'rep_fecha'=>'2005-04-11',
        'rep_descripcion'=>'Cambio de llantas',
        'rep_costo'=>'22.00',
        'veh_id'=>'2',
        'mec_id'=>'2',
        ]); 
    }
}
