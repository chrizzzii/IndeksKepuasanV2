<?php

namespace App\Exports;

use App\Models\Mitra;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MitraExport
{
    /**
     * Method untuk mengekspor data mitra ke file Excel.
     */
    public function export()
    {
        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menentukan urutan kolom yang diinginkan
        $columns = [
            'nama',
            'jabatan',
            'nama_instansi',
            'alamat',
            'no_telepon',
            'bidang_kerjasama',
            'kota', // Pastikan kolom ini ada di tabel mitra
            'tanggal', // Pastikan kolom ini ada di tabel mitra
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
            'Pertanyaan 11', // Ganti u1 menjadi Pertanyaan 11
            'Pertanyaan 12', // Ganti u2 menjadi Pertanyaan 12
            'Pertanyaan 13', // Ganti u3 menjadi Pertanyaan 13
            'Pertanyaan 14', // Ganti u4 menjadi Pertanyaan 14
            'Pertanyaan 15', // Ganti u5 menjadi Pertanyaan 15
            'Pertanyaan 16', // Ganti u6 menjadi Pertanyaan 16
            'Pertanyaan 17', // Ganti u7 menjadi Pertanyaan 17
            'Pertanyaan 18', // Ganti u8 menjadi Pertanyaan 18
            'Pertanyaan 19', // Ganti u9 menjadi Pertanyaan 19
            'rencana',
            'saranmasukkan', // Perbaiki jika ada kesalahan penamaan
        ];

        // Menulis header
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $sheet->setCellValue($columnLetter . '1', $header); // Menulis header
            $columnLetter++;
        }

        // Mengambil data mitra
        $mitra = Mitra::all();
        $row = 2; // Memulai dari baris kedua untuk data

        foreach ($mitra as $item) {
            $columnLetter = 'A'; // Reset kolom untuk setiap baris
            foreach ($columns as $field) {
                // Jika kolom adalah "Pertanyaan 1" hingga "Pertanyaan 10"
                if (strpos($field, 'Pertanyaan') === 0) {
                    // Mengambil nomor pertanyaan berdasarkan panjang string
                    $questionNumber = (strlen($field) == 13) ? substr($field, -2) : substr($field, -1);

                    // Menentukan prefix (p) berdasarkan nomor pertanyaan
                    if ((int)$questionNumber <= 10) {
                        $questionField = 'p' . $questionNumber; // p1, p2, ..., p10
                    } else {
                        $questionField = 'u' . ($questionNumber - 10); // u1, u2, ..., u9
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
        $fileName = 'mitra.xlsx';

        // Kirim file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Simpan dan keluarkan file ke output
        $writer->save('php://output');
        exit;
    }
}
