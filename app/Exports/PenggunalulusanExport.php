<?php

namespace App\Exports;

use App\Models\Penggunalulusan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PenggunalulusanExport
{
    /**
     * Method untuk mengekspor data pengguna lulusan ke file Excel.
     */
    public function export()
    {
        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menentukan urutan kolom untuk Identitas Penilai dan Lulusan
        $columns = [
            'nama_identitaspenilai',
            'usia_identitaspenilai',
            'jeniskelamin_identitaspenilai',
            'alamat_identitaspenilai',
            'kontak_identitaspenilai',
            'instansi_identitaspenilai',
            'jabatan_identitaspenilai',
            'lamabekerjadenganlulusan',
            'nama_identitaslulusan',
            'jeniskelamin_identitaslulusan',
            'jabatan_identitaslulusan',
            'latarbelakang_identitaslulusan',
            'lamabekerja_identitaslulusan',
            'lamabekerjadiinstansisaatini',
            'saranmasukkan',
            'Pertanyaan 1',  // Ganti p1 menjadi Pertanyaan 1
            'Pertanyaan 2',  // Ganti p2 menjadi Pertanyaan 2
            'Pertanyaan 3',  // Ganti p3 menjadi Pertanyaan 3
            'Pertanyaan 4',  // Ganti p4 menjadi Pertanyaan 4
            'Pertanyaan 5',  // Ganti p5 menjadi Pertanyaan 5
            'Pertanyaan 6',  // Ganti p6 menjadi Pertanyaan 6
            'Pertanyaan 7',  // Ganti p7 menjadi Pertanyaan 7
            'Pertanyaan 8',  // Ganti p8 menjadi Pertanyaan 8
            'Pertanyaan 9',  // Ganti p9 menjadi Pertanyaan 9
            'Pertanyaan 10', // Ganti p10 menjadi Pertanyaan 10
            'Pertanyaan 11', // Ganti p11 menjadi Pertanyaan 11
            'Pertanyaan 12', // Ganti p12 menjadi Pertanyaan 12
            'Pertanyaan 13', // Ganti p13 menjadi Pertanyaan 13
            'Pertanyaan 14', // Ganti p14 menjadi Pertanyaan 14
            'Pertanyaan 15', // Ganti p15 menjadi Pertanyaan 15
            'Pertanyaan 16', // Ganti p16 menjadi Pertanyaan 16
            'Pertanyaan 17', // Ganti p17 menjadi Pertanyaan 17
            'Pertanyaan 18', // Ganti p18 menjadi Pertanyaan 18
            'Pertanyaan 19', // Ganti p19 menjadi Pertanyaan 19
            'Pertanyaan 20', // Ganti p20 menjadi Pertanyaan 20
            'Pertanyaan 21', // Ganti p21 menjadi Pertanyaan 21
            'Pertanyaan 22', // Ganti u1 menjadi Pertanyaan 22
            'Pertanyaan 23', // Ganti u2 menjadi Pertanyaan 23
            'Pertanyaan 24', // Ganti u3 menjadi Pertanyaan 24
            'Pertanyaan 25', // Ganti u4 menjadi Pertanyaan 25
            'Pertanyaan 26', // Ganti u5 menjadi Pertanyaan 26
            'Pertanyaan 27', // Ganti u6 menjadi Pertanyaan 27
            'Pertanyaan 28', // Ganti u7 menjadi Pertanyaan 28
            'Pertanyaan 29', // Ganti u8 menjadi Pertanyaan 29
            'Pertanyaan 30', // Ganti u9 menjadi Pertanyaan 30
        ];

        // Menulis header
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $sheet->setCellValue($columnLetter . '1', $header); // Menulis header
            $columnLetter++;
        }

        // Mengambil data mitra
        $penggunaLulusan = Penggunalulusan::all();
        $row = 2; // Memulai dari baris kedua untuk data

        foreach ($penggunaLulusan as $item) {
            $columnLetter = 'A'; // Reset kolom untuk setiap baris
            foreach ($columns as $field) {
                // Jika kolom adalah "Pertanyaan 1" hingga "Pertanyaan 10"
                if (strpos($field, 'Pertanyaan') === 0) {
                    // Mengambil nomor pertanyaan berdasarkan panjang string
                    $questionNumber = (strlen($field) == 13) ? substr($field, -2) : substr($field, -1);

                    // Menentukan prefix (p) berdasarkan nomor pertanyaan
                    if ((int)$questionNumber <= 21) {
                        $questionField = 'p' . $questionNumber; // p1, p2, ..., p10
                    } else {
                        $questionField = 'u' . ($questionNumber - 21); // u1, u2, ..., u9
                    }

                    // Isi data sesuai dengan nomor pertanyaan
                    $sheet->setCellValue($columnLetter . $row, $item->$questionField); // Isi data untuk p1-p10 atau u1-u9
                }
                // Kolom lainnya
                else {
                    $sheet->setCellValue($columnLetter . $row, $item->$field); // Isi data untuk kolom lainnya
                }
                $columnLetter++;
            }
            $row++; // Pindah ke baris berikutnya untuk data berikutnya
        }

        // Buat writer untuk file Excel
        $writer = new Xlsx($spreadsheet);

        // Tentukan nama file yang akan diunduh
        $fileName = 'penggunalulusan.xlsx';

        // Kirim file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Simpan dan keluarkan file ke output
        $writer->save('php://output');
        exit;
    }
}
