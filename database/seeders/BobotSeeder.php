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
                'nilai' => 0.466,
                'batasan' => 18.64,
                'hasil' => 'Sekolah Sadar Lalu Lintas'
            ],
            [
                'jawaban' => 'Pernah',
                'nilai' => 0.277,
                'batasan' => 11.08,
                'hasil' => 'Sekolah Cukup Sadar Lalu Lintas'
            ],
            [
                'jawaban' => 'Jarang',
                'nilai' => 0.161,
                'batasan' => 6.44,
                'hasil' => 'Sekolah Kurang Sadar Lalu Lintas'
            ],
            [
                'jawaban' => 'Tidak Pernah',
                'nilai' => 0.096,
                'batasan' => 3.84,
                'hasil' => 'Sekolah Tidak Sadar Lalu Lintas'
            ],

        ];

        foreach ($bobots as $bobot) {
            bobot::create($bobot);
        }
    }
}
