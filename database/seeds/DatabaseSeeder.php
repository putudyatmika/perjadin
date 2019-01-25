<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TabelGolonganSeeder::class);
        $this->call(TabelUnitkerjaSeeder::class);
        $this->call(TabelAkunSeeder::class);
        $this->call(TabelTujuanSeeder::class);
    }
}
