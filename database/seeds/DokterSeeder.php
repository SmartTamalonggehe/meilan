<?php

use App\Dokter;
use App\Poli;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class DokterSeeder extends Seeder
{
    protected $Dokter;
    protected $faker;

    public function __construct(Dokter $Dokter, Faker $faker)
    {
        $this->Dokter=$Dokter;
        $this->faker=$faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,30) as $fk) {
            $this->Dokter->create([
                'id_poli' => Poli::inRandomOrder()->first()->id,
                'nm_dokter'=>$this->faker->sentence(1),
                'jenkel'=>$this->faker->randomElement(['Laki-laki','Perempuan']),
                'alamat'=>$this->faker->sentence(10),
            ]);
        }
    }
}
