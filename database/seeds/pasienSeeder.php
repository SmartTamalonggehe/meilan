<?php

use App\pasien;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class pasienSeeder extends Seeder
{
    protected $pasien;
    protected $faker;

    public function __construct(pasien $pasien, Faker $faker)
    {
        $this->pasien=$pasien;
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
            $this->pasien->create([
                'no_pengenal'=>Str::random(10),
                'jenis_p'=>$this->faker->randomElement(['KTP','SIM','Kartu Pelajar']),
                'nm_pasien' =>$this->faker->sentence(2),
                'jenkel'=>$this->faker->randomElement(['Laki-laki','Perempuan']),
                'gol_darah'=>$this->faker->randomElement(['A','B','O','AB']),
                'tempat' =>$this->faker->sentence(2),
                'tgl_lahir'=>$this->faker->dateTimeBetween($startDate = '-15 years', $endDate = '-10 years'),
                'umur' =>rand(18,60),
                'no_hp' =>rand(),
                'alamat' =>$this->faker->sentence(5),
            ]);
        }
    }
}
