<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ebook;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data eBook
        $ebooks = [
            [
                'title' => 'Soal Assessment Siswa Kelas XII',
                'file_path' => 'assets/Soal Assessment Siswa Kelas XII.pdf',
            ],
            [
                'title' => 'Soal Assessment Siswa Kelas XI',
                'file_path' => 'assets/Soal Assessment Siswa Kelas XI.pdf',
            ],
            [
                'title' => 'Soal Assessment Siswa Kelas X',
                'file_path' => 'assets/Soal Assesment Siswa Kelas X.pdf',
            ],
        ];

        // Insert data ke tabel ebooks
        foreach ($ebooks as $ebook) {
            Ebook::create($ebook);
        }
    }
}
