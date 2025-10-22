<?php

namespace App\Exports;

use App\Models\Orangtua;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrangtuaExport
{
    /**
     * Method untuk mengekspor data Orangtua ke file Excel.
     */
    public function export()
    {
        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menentukan urutan kolom yang diinginkan
        $columns = [
            'nama',
            'usia',
            'jeniskelamin',
            'alamat',
            'nomor_telepon',
            'saranmasukkan',
            'namamahasiswa',
            'Program Studi', // Mengganti 'prodi' dengan 'Program Studi'
            'status',
            'pekerjaan',
            // Kolom pertanyaan u1, u2, ..., u9
            'Pertanyaan 1', // Ganti u1 dengan Pertanyaan 1
            'Pertanyaan 2', // Ganti u2 dengan Pertanyaan 2
            'Pertanyaan 3', // Ganti u3 dengan Pertanyaan 3
            'Pertanyaan 4', // Ganti u4 dengan Pertanyaan 4
            'Pertanyaan 5', // Ganti u5 dengan Pertanyaan 5
            'Pertanyaan 6', // Ganti u6 dengan Pertanyaan 6
            'Pertanyaan 7', // Ganti u7 dengan Pertanyaan 7
            'Pertanyaan 8', // Ganti u8 dengan Pertanyaan 8
            'Pertanyaan 9', // Ganti u9 dengan Pertanyaan 9
            // Kolom pertanyaan p1, p2, ..., p9
            'Pertanyaan 10', // Ganti p1 dengan Pertanyaan 10
            'Pertanyaan 11', // Ganti p2 dengan Pertanyaan 11
            'Pertanyaan 12', // Ganti p3 dengan Pertanyaan 12
            'Pertanyaan 13', // Ganti p4 dengan Pertanyaan 13
            'Pertanyaan 14', // Ganti p5 dengan Pertanyaan 14
            'Pertanyaan 15', // Ganti p6 dengan Pertanyaan 15
            'Pertanyaan 16', // Ganti p7 dengan Pertanyaan 16
            'Pertanyaan 17', // Ganti p8 dengan Pertanyaan 17
            'Pertanyaan 18', // Ganti p9 dengan Pertanyaan 18
            'Pertanyaan 19', // Ganti p10 dengan Pertanyaan 19
            'Pertanyaan 20', // Ganti p11 dengan Pertanyaan 20
            'Pertanyaan 21', // Ganti p12 dengan Pertanyaan 21
            'Pertanyaan 22', // Ganti p13 dengan Pertanyaan 22
            'Pertanyaan 23', // Ganti p14 dengan Pertanyaan 23
            'Pertanyaan 24', // Ganti p15 dengan Pertanyaan 24
            'Pertanyaan 25', // Ganti p16 dengan Pertanyaan 25
            'Pertanyaan 26', // Ganti p17 dengan Pertanyaan 26
            'Pertanyaan 27', // Ganti p18 dengan Pertanyaan 27
            'Pertanyaan 28', // Ganti p19 dengan Pertanyaan 28
            'Pertanyaan 29', // Ganti p20 dengan Pertanyaan 29
            'Pertanyaan 30', // Ganti p21 dengan Pertanyaan 30
            'Pertanyaan 31', // Ganti p22 dengan Pertanyaan 31
            'Pertanyaan 32', // Ganti p23 dengan Pertanyaan 32
            'Pertanyaan 33', // Ganti p24 dengan Pertanyaan 33
            'Pertanyaan 34', // Ganti p25 dengan Pertanyaan 34
            'Pertanyaan 35', // Ganti p26 dengan Pertanyaan 35
            'Pertanyaan 36', // Ganti p27 dengan Pertanyaan 36
        ];

        // Menulis header
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $sheet->setCellValue($columnLetter . '1', $header); // Menulis header
            $columnLetter++;
        }

        // Mengambil data Orangtua
        $Orangtua = Orangtua::all();
        $row = 2; // Memulai dari baris kedua untuk data

        foreach ($Orangtua as $item) {
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
        $fileName = 'Orangtua.xlsx';

        // Kirim file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Simpan dan keluarkan file ke output
        $writer->save('php://output');
        exit;
    }
}
