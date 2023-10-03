<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       
            for ($i = 1; $i < 11; $i++) {
                DB::table('clients')->insert(['clientname' => 'Client ' . $i]);
            }
            for ($i = 1; $i < 21; $i++) {
                DB::table('equipements')->insert(['modele' => 'Equipement ' . $i, 'client_id_client' => rand(1, 10)]);
            }
            for ($i = 1; $i < 21; $i++) {
                DB::table('sous_equipements')->insert(['designation' => 'Sous_equipement ' . $i, 'equipement_id_equipement' => rand(1, 20)]);
            }
       
    }
}
