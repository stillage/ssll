<?php

namespace Database\Seeders;

use App\Models\kategori;
use App\Models\pertanyaan;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'kategori-list',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',
            'pertanyaan-list',
            'pertanyaan-create',
            'pertanyaan-edit',
            'pertanyaan-delete',
            'sekolah-list',
            'sekolah-create',
            'sekolah-edit',
            'sekolah-delete',
            'departement-list',
            'departement-create',
            'departement-edit',
            'departement-delete',
            'config-list',
            'config-create',
            'config-edit',
            'config-delete',
            'bobot-list',
            'bobot-create',
            'bobot-edit',
            'bobot-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $kategori = [
            [
                'nama' => 'GURU DAN LINGKUNGAN MANUSIA',
                'prioritas' => 1
            ],
            [
                'nama' => 'KURIKULUM',
                'prioritas' => 2
            ],
            [
                'nama' => 'PEMBIAYAAN',
                'prioritas' => 3
            ],
            [
                'nama' => 'PENGOLAAN',
                'prioritas' => 4
            ],
            [
                'nama' => 'LINGKUNGAN BENDA',
                'prioritas' => 5
            ],
        ];

        foreach ($kategori as $k) {
            kategori::create($k);
        }

        $pertanyaan = [
            [
                'nama' => 'Apakah telah dilaksanakan kegiatan sosialisasi pendidikan karakter sadar lalu lintas usia dini ( SALUD)',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakah sudah dibuatan komitmen dengan seluruh komponen (guru, manajemen dan komite sekolah) untuk mendukung pelaksanaan pendidikan karakter SALUD di sekolah.',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakah telah dilakukan analisis terhadap kondisi sekolah (internal dan eksternal) yang dikaitkan dengan nilai-nilai karakter keselamatan jalan yang dikembangkan di sekolah, analisis ini dilakukan untuk menetapkan nilai-nilai dan indikator keberhasilan yang diprioritaskan, sumber daya, sarana yang diperlukan, serta prosedur penilaian keberhasilan pendidikan karakter keselamatan jalan',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakah sudah disusun rencana aksi sekolah yang berkaitan dengan penetapan nilai-nilai pendidikan karakter keselamatan jalan dan melibatkan guru, siswa dan orang tua.',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakah sudah dibuat perencanaan dan program pelaksanaan pendidikan karakter keselamatan jalan yang berisi: pengintegrasian melalui pembelajaran, penyisipan ke tematik seperti RPPH/RPS; kegiatan lain, dan penjadwalan dan penambahan jam belajar di sekolah.',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakah sudah dilakukan pengkondisian seperti: penyediaan media SALUD, keteladanan, dan penghargaan dan pemberdayaan anak-anak dalam penyyusunan hasil karya SALUD',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakakah sudah dilakukan penilaian keberhasilan program pendidikan karakter sadar lalu lintas dan pengawasan pada anak-anak',
                'kategori' => 1
            ],
            [
                'nama' => 'Apakah sudah  dilaukan identifikasi dan analisis terkait permasalah implementasi pendidikan karakter keselamatan jalan SALUD di sekolah',
                'kategori' => 2
            ],
            [
                'nama' => 'Apakah sudah dilaukannya perumusuan terkait visi, misi, dan tujuan program keseselamatan jalan SALUD di Sekolah.',
                'kategori' => 2
            ],
            [
                'nama' => 'Apakah sudah dilaukannya perumusuan indikator perilaku peserta didik sesuai dengan tujuan program keseselamatan jalan SALUD',
                'kategori' => 2
            ],
            [
                'nama' => 'Apakah sudah dikembangkannya instrumen penilaian pendidikan untuk mengukur ketercapaian program pendidikan karakter SALUD',
                'kategori' => 2
            ],
            [
                'nama' => 'Apakah sudah dibangunnya komunikasi dan kerjasama tentang program pendidikan karakter SALUD antara sekolah dengan orang tua peserta didik.',
                'kategori' => 2
            ],
            [
                'nama' => 'Apakah Sekolah Menginventarisasi rencana terkait pendidikan karakter SALUD yang akan dilaksanakan.',
                'kategori' => 3
            ],
            [
                'nama' => 'Apakah Sekolah dan Guru menyusun rencana berdasarkan skala prioritas pelaksanaan pendidikan karakter SALUD.',
                'kategori' => 3
            ],
            [
                'nama' => 'Apakah Sekolah menentukan program kerja pendidikan karakter SALUD dan rincian kerja.',
                'kategori' => 3
            ],
            [
                'nama' => 'Apakah Sekolah menghitung dana yang dibutuhkan untuk pengembangan program pendidikan karakter keselamatan jalan. SALUD',
                'kategori' => 3
            ],
            [
                'nama' => 'Apakah Sekolah bersama Komite Sekolah menentukan sumber dana untuk membiayai rencana ',
                'kategori' => 3
            ],
            [
                'nama' => 'Apakah dari pihak sekolah menanamkan jiwa kepemimpinan, moral, dan akademik.',
                'kategori' => 4
            ],
            [
                'nama' => 'Apakah sifat kedisiplinan telah ditegakkan di sekolah secara menyeluruh.',
                'kategori' => 4
            ],
            [
                'nama' => 'Apakah warga sekolah memiliki rasa persaudaraan.',
                'kategori' => 4
            ],
            [
                'nama' => 'Apakah warga sekolah memiliki sifat saling menghargai, adil dan bergotong royong.',
                'kategori' => 4
            ],
            [
                'nama' => 'Apakah pihak sekolah melakukan kegiatan peningkatkan perhatikan terhadap moralitas dengan cara menggunakan waktu tertentu untuk mengatasi masalah-masalah moral',
                'kategori' => 4
            ],
            [
                'nama' => 'Apakah telah tersedianya taman lalu lintas.',
                'kategori' => 5
            ],
            [
                'nama' => 'Apakah telah tersedianya APE (Alat Permainan Edukatif) Keselamatan Lalu Lintas.',
                'kategori' => 5
            ],
            [
                'nama' => 'Apakah telah tersedianya buku materi sosialisasi SALUD.',
                'kategori' => 5
            ],
            [
                'nama' => 'Apakah telah tersedianya hasil karya siswa tentang SALUD.',
                'kategori' => 5
            ],
            [
                'nama' => 'Apakah telah ditetapkannya regulasi mengenai keselamatan jalan di sekolah',
                'kategori' => 5
            ],
        ];

        foreach ($pertanyaan as $p) {
            pertanyaan::create($p);
        }
    }
}
