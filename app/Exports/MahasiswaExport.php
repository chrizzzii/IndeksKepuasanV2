<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MahasiswaExport
{
    /**
     * Method untuk mengekspor data mahasiswa ke file Excel.
     */
    public function export()
    {
        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menentukan urutan kolom yang diinginkan
        $columns = [
            'nama',
            'nim',
            'usia',
            'jeniskelamin',
            'alamat',
            'nomor_telepon',
            'saranmasukkan',
            'Program Studi', // Ganti prodi menjadi Program Studi
            'Pertanyaan 1', // u1 menjadi Pertanyaan 1
            'Pertanyaan 2', // u2 menjadi Pertanyaan 2
            'Pertanyaan 3', // u3 menjadi Pertanyaan 3
            'Pertanyaan 4', // u4 menjadi Pertanyaan 4
            'Pertanyaan 5', // u5 menjadi Pertanyaan 5
            'Pertanyaan 6', // u6 menjadi Pertanyaan 6
            'Pertanyaan 7', // u7 menjadi Pertanyaan 7
            'Pertanyaan 8', // u8 menjadi Pertanyaan 8
            'Pertanyaan 9', // u9 menjadi Pertanyaan 9
        ];

        // Tambahkan kolom p1 hingga p90, diubah menjadi Pertanyaan 10 hingga Pertanyaan 99
        for ($i = 1; $i <= 90; $i++) {
            $columns[] = 'Pertanyaan ' . ($i + 9); // p1 -> Pertanyaan 10, p2 -> Pertanyaan 11, dst.
        }

        // Menulis header
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $sheet->setCellValue($columnLetter . '1', $header); // Menulis header
            $columnLetter++;
        }

        // Mengambil data mahasiswa
        $mahasiswa = Mahasiswa::all();
        $row = 2; // Memulai dari baris kedua untuk data

        foreach ($mahasiswa as $item) {
            $columnLetter = 'A'; // Reset kolom untuk setiap baris
            foreach ($columns as $field) {
                // Jika kolom adalah "Program Studi" maka ambil nilai dari kolom 'prodi'
                if ($field == 'Program Studi') {
                    $programStudi = $item->prodi; // Ambil nilai dari kolom 'prodi'
                    $sheet->setCellValue($columnLetter . $row, $programStudi); // Isi nilai program studi
                }
                // Jika kolom adalah "Pertanyaan X" (misal Pertanyaan 1, Pertanyaan 2, dst.)
                elseif (strpos($field, 'Pertanyaan') === 0) {
                    // Ambil angka setelah "Pertanyaan" untuk menentukan p1, p2, dst.
                    // Memperbaiki cara mengambil angka agar bisa menghandle baik yang satu digit maupun dua digit
                    $questionNumber = trim(substr($field, 11)); // Ambil angka setelah kata "Pertanyaan"

                    if (intval($questionNumber) <= 9) {
                        $questionField = 'u' . $questionNumber; // Ambil nilai dari u1 hingga u9
                    } else {
                        $questionField = 'p' . ($questionNumber - 9); // Ambil nilai dari p1 hingga p9
                    }

                    // Debug: Pastikan kolom u1 - u9 dan p1 - p9 terbaca
                    if (!empty($item->$questionField)) {
                        $sheet->setCellValue($columnLetter . $row, $item->$questionField); // Isi data dari u1-u9 atau p1-p9
                    } else {
                        // Jika kosong, berikan tanda atau nilai default
                        $sheet->setCellValue($columnLetter . $row, 'Tidak Terisi');
                    }
                } else {
                    // Isi data untuk kolom lainnya
                    $sheet->setCellValue($columnLetter . $row, $item->$field);
                }
                $columnLetter++;
            }
            $row++; // Pindah ke baris berikutnya untuk data berikutnya
        }

        // Buat writer untuk file Excel
        $writer = new Xlsx($spreadsheet);

        // Tentukan nama file yang akan diunduh
        $fileName = 'mahasiswa.xlsx';

        // Kirim file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Simpan dan keluarkan file ke output
        $writer->save('php://output');
        exit;
    }
}
