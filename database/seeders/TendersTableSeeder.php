<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::table('tenders')->insert([
            'title' => 'Instalación y puesta en servicio de mamparas de separación pa la UCI',
            'summary' => 'Instalación y puesta en servicio de mamparas de separación para el áerea de urgencias del complejo asistencial de León',
            'link' => 'http:\\contrataciondelestado.es',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}