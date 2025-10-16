<?php

namespace App\Exports;

use App\Models\Dosen;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DosenExport
{
    /**
     * Method untuk mengekspor data dosen ke file Excel.
     */
    public function export()
    {
        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menentukan urutan kolom untuk Dosen
        $columns = [
            'nama',
            'nip',
            'usia',
            'jeniskelamin',
            'alamat',
            'nomor_telepon',
            'saranmasukkan',
            'Program Studi 1', // Mengganti kolom "prodi" menjadi "Program Studi 1" di Excel
            'Program Studi 2', // Program Studi 2
            'Program Studi 3', // Program Studi 3
            'Program Studi 4', // Program Studi 4
            'Program Studi 5', // Program Studi 5
            'Pertanyaan 1', // Mengganti u1 menjadi Pertanyaan 1
            'Pertanyaan 2', // Mengganti u2 menjadi Pertanyaan 2
            'Pertanyaan 3', // Mengganti u3 menjadi Pertanyaan 3
            'Pertanyaan 4', // Mengganti u4 menjadi Pertanyaan 4
            'Pertanyaan 5', // Mengganti u5 menjadi Pertanyaan 5
            'Pertanyaan 6', // Mengganti u6 menjadi Pertanyaan 6
            'Pertanyaan 7', // Mengganti u7 menjadi Pertanyaan 7
            'Pertanyaan 8', // Mengganti u8 menjadi Pertanyaan 8
            'Pertanyaan 9', // Mengganti u9 menjadi Pertanyaan 9
        ];

        // Tambahkan kolom p1 hingga p38 dan ubah menjadi Pertanyaan 10 hingga Pertanyaan 47
        for ($i = 1; $i <= 38; $i++) {
            $columns[] = 'Pertanyaan ' . ($i + 9); // Pertanyaan 10 hingga Pertanyaan 47
        }

        // Menulis header untuk semua atribut
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $sheet->setCellValue($columnLetter . '1', $header); // Menulis header
            $columnLetter++;
        }

        // Mengambil data dosen
        $dosen = Dosen::all();
        $row = 2; // Baris untuk data dimulai dari baris kedua

        foreach ($dosen as $item) {
            $columnLetter = 'A'; // Reset kolom untuk setiap baris

            // Menulis data untuk semua atribut
            foreach ($columns as $field) {
                // Jika kolom adalah "Program Studi 1" (prodi di database)
                if ($field == 'Program Studi 1') {
                    $sheet->setCellValue($columnLetter . $row, $item->prodi); // Isi data dari prodi
                }
                // Jika kolom adalah "Program Studi X" (Program Studi 2, Program Studi 3, dst.)
                elseif (strpos($field, 'Program Studi') === 0) {
                    // Ambil angka setelah "Program Studi" untuk menentukan prodi2, prodi3, dst.
                    $prodiNumber = substr($field, -1); // Mengambil angka, misalnya "2" dari "Program Studi 2"
                    $prodiField = 'prodi' . $prodiNumber; // Ambil dari prodi2, prodi3, dst.
                    $sheet->setCellValue($columnLetter . $row, $item->$prodiField); // Isi data dari prodi2, prodi3, dst.
                }
                // Jika kolom adalah "Pertanyaan X" (misal Pertanyaan 1, Pertanyaan 2, dst.)
                elseif (strpos($field, 'Pertanyaan') === 0) {
                    // Ambil angka setelah "Pertanyaan" untuk menentukan u1, u2, dst.
                    $questionNumber = substr($field, -2); // Mengambil angka, misalnya "10" dari "Pertanyaan 10"

                    // Jika angkanya kurang dari atau sama dengan 9, maka ambil dari u1, u2, dst.
                    if (intval($questionNumber) <= 9) {
                        $questionField = 'u' . $questionNumber; // Ambil dari u1, u2, dst.
                    } else {
                        $questionField = 'p' . ($questionNumber - 9); // Ambil dari p1, p2, dst.
                    }

                    // Isi data berdasarkan kolom u atau p yang sesuai
                    $sheet->setCellValue($columnLetter . $row, $item->$questionField); // Isi data dari u1, p1, dst.
                } else {
                    $sheet->setCellValue($columnLetter . $row, $item->$field); // Isi data untuk kolom lainnya
                }
                $columnLetter++;
            }
            $row++; // Pindah ke baris berikutnya untuk data berikutnya
        }

        // Buat writer untuk file Excel
        $writer = new Xlsx($spreadsheet);

        // Tentukan nama file yang akan diunduh
        $fileName = 'dosen.xlsx';

        // Kirim file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Simpan dan keluarkan file ke output
        $writer->save('php://output');
        exit;
    }
}
