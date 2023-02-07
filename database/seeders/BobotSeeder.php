<?php

namespace Database\Seeders;

use App\Models\bobot;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobots = [
            [
                'jawaban' => 'Sering',
                'nilai' => 4,
                'batasan' => 40,
                'hasil' => 'Sekolah Sadar Lalu Lintas'
            ],
            [
                'jawaban' => 'Pernah',
                'nilai' => 3,
                'batasan' => 30,
                'hasil' => 'Sekolah Cukup Sadar Lalu Lintas'
            ],
            [
                'jawaban' => 'Jarang',
                'nilai' => 2,
                'batasan' => 20,
                'hasil' => 'Sekolah Kurang Sadar Lalu Lintas'
            ],
            [
                'jawaban' => 'Tidak Pernah',
                'nilai' => 1,
                'batasan' => 10,
                'hasil' => 'Sekolah Tidak Sadar Lalu Lintas'
            ],

        ];

        foreach ($bobots as $bobot) {
            bobot::create($bobot);
        }
    }
}
