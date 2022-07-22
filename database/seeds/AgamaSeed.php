<?php

use App\Model\Agama;
use Illuminate\Database\Seeder;

class AgamaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Agama::create(['nama_agama' => 'Islam']);
        Agama::create(['nama_agama' => 'Kristen']);
        Agama::create(['nama_agama' => 'Hindu']);
        Agama::create(['nama_agama' => 'Budha']);
        Agama::create(['nama_agama' => 'Konghucu']);
    }
}
