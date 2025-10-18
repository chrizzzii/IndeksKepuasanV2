<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanOrangtuaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pertanyaan_orangtua')->insert([
            ['pertanyaan_id' => 1, 'kategori' => null, 'pertanyaan' => 'Program Studi'],
            ['pertanyaan_id' => 2, 'kategori' => 'Informasi dan Komunikasi', 'pertanyaan' => 'Kejelasan informasi penerimaan mahasiswa baru'],
            ['pertanyaan_id' => 3, 'kategori' => 'Informasi dan Komunikasi', 'pertanyaan' => 'Kemudahan akses informasi akademik dan administrasi (jadwal kuliah, ujian, kalender akademik)'],
            ['pertanyaan_id' => 4, 'kategori' => 'Informasi dan Komunikasi', 'pertanyaan' => 'Kemudahan komunikasi orang tua dengan pihak kampus (dosen wali, prodi, administrasi)'],
            ['pertanyaan_id' => 5, 'kategori' => 'Informasi dan Komunikasi', 'pertanyaan' => 'Kejelasan informasi terkait biaya pendidikan dan pembayaran'],
            ['pertanyaan_id' => 6, 'kategori' => 'Layanan Akademik', 'pertanyaan' => 'Kualitas pembelajaran yang diterima mahasiswa'],
            ['pertanyaan_id' => 7, 'kategori' => 'Layanan Akademik', 'pertanyaan' => 'Kesesuaian kurikulum dengan kebutuhan dunia kerja'],
            ['pertanyaan_id' => 8, 'kategori' => 'Layanan Akademik', 'pertanyaan' => 'Dukungan dosen terhadap perkembangan akademik mahasiswa'],
            ['pertanyaan_id' => 9, 'kategori' => 'Layanan Akademik', 'pertanyaan' => 'Mekanisme evaluasi pembelajaran (ujian, remedial, hasil studi) yang transparan'],
            ['pertanyaan_id' => 10, 'kategori' => 'Layanan Non Akademik', 'pertanyaan' => 'Layanan bimbingan konseling, kesehatan dan pendampingan mahasiswa selama studi'],
            ['pertanyaan_id' => 11, 'kategori' => 'Layanan Non Akademik', 'pertanyaan' => 'Layanan kegiatan kemahasiswaan (organisasi, UKM, kegiatan positif lainnya)'],
            ['pertanyaan_id' => 12, 'kategori' => 'Layanan Non Akademik', 'pertanyaan' => 'Layanan pengembangan soft skills (kepemimpinan, komunikasi, kewirausahaan, dll)'],
            ['pertanyaan_id' => 13, 'kategori' => 'Layanan Non Akademik', 'pertanyaan' => 'Layanan dukungan karier dan tracer study untuk kesiapan kerja lulusan'],
            ['pertanyaan_id' => 14, 'kategori' => 'Layanan Non Akademik', 'pertanyaan' => 'Layanan keamanan, keselamatan dan kenyamanan lingkungan kampus bagi mahasiswa'],
            ['pertanyaan_id' => 15, 'kategori' => 'Sarana dan Prasarana', 'pertanyaan' => 'Fasilitas ruang kuliah dan laboratorium'],
            ['pertanyaan_id' => 16, 'kategori' => 'Sarana dan Prasarana', 'pertanyaan' => 'Fasilitas perpustakaan dan akses sumber belajar'],
            ['pertanyaan_id' => 17, 'kategori' => 'Sarana dan Prasarana', 'pertanyaan' => 'Fasilitas ibadah, parkir, kantin, dan toilet'],
            ['pertanyaan_id' => 18, 'kategori' => 'Sarana dan Prasarana', 'pertanyaan' => 'Fasilitas sarana olahraga dan kegiatan mahasiswa'],
            ['pertanyaan_id' => 19, 'kategori' => 'Sarana dan Prasarana', 'pertanyaan' => 'Fasilitas teknologi informasi (akses internet, sistem akademik online)'],
            ['pertanyaan_id' => 20, 'kategori' => 'Output Pendidikan', 'pertanyaan' => 'Output Pendidikan'],
            ['pertanyaan_id' => 21, 'kategori' => 'Output Pendidikan', 'pertanyaan' => 'Harapan orang tua terhadap keterserapan lulusan di dunia kerja'],
            ['pertanyaan_id' => 22, 'kategori' => 'Output Pendidikan', 'pertanyaan' => 'Kepercayaan orang tua terhadap kualitas lulusan Poltekkes Kemenkes Semarang'],
            ['pertanyaan_id' => 23, 'kategori' => 'Output Pendidikan', 'pertanyaan' => 'Relevansi kompetensi lulusan dengan kebutuhan dunia kerja dan masyarakat'],
            ['pertanyaan_id' => 24, 'kategori' => 'Output Pendidikan', 'pertanyaan' => 'Dampak pendidikan di Poltekkes terhadap perkembangan kepribadian dan kemandirian mahasiswa'],
            ['pertanyaan_id' => 25, 'kategori' => 'Keuangan', 'pertanyaan' => 'Kesesuaian besaran biaya pendidikan dengan fasilitas dan layanan yang diberikan'],
            ['pertanyaan_id' => 26, 'kategori' => 'Keuangan', 'pertanyaan' => 'Kemudahan proses pembayaran biaya pendidikan'],
            ['pertanyaan_id' => 27, 'kategori' => 'Keuangan', 'pertanyaan' => 'Transparansi informasi terkait biaya tambahan di luar biaya pendidikan utama'],
            ['pertanyaan_id' => 28, 'kategori' => 'Keuangan', 'pertanyaan' => 'Ketersediaan program beasiswa atau keringanan biaya untuk mahasiswa yang membutuhkan'],
        ]);
    }
}
