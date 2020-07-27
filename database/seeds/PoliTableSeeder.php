<?php

use App\Poli;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PoliTableSeeder extends Seeder
{
    protected $Poli;
    protected $faker;

    public function __construct(Poli $Poli, Faker $faker)
    {
        $this->Poli=$Poli;
        $this->faker=$faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,5) as $fk) {
            $this->Poli->create([
                'nm_poli' =>$this->faker->sentence(1),
            ]);
        }
    }
}
