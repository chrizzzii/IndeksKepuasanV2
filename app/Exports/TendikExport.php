<?php

namespace App\Exports;

use App\Models\Tendik;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TendikExport
{
    /**
     * Method untuk mengekspor data tendik ke file Excel.
     */
    public function export()
    {
        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menentukan urutan kolom yang diinginkan
        $columns = [
            'nama',
            'nip', // Pastikan kolom ini ada di tabel tendik
            'usia',
            'jeniskelamin',
            'alamat',
            'nomor_telepon',
            'saranmasukkan',
            'Program Studi', // Ganti prodi menjadi program studi
            'Pertanyaan 1', // Ganti u1 menjadi Pertanyaan 1
            'Pertanyaan 2', // Ganti u2 menjadi Pertanyaan 2
            'Pertanyaan 3', // Ganti u3 menjadi Pertanyaan 3
            'Pertanyaan 4', // Ganti u4 menjadi Pertanyaan 4
            'Pertanyaan 5', // Ganti u5 menjadi Pertanyaan 5
            'Pertanyaan 6', // Ganti u6 menjadi Pertanyaan 6
            'Pertanyaan 7', // Ganti u7 menjadi Pertanyaan 7
            'Pertanyaan 8', // Ganti u8 menjadi Pertanyaan 8
            'Pertanyaan 9', // Ganti u9 menjadi Pertanyaan 9
        ];

        // Tambahkan kolom Pertanyaan 10 hingga Pertanyaan 35
        for ($i = 10; $i <= 35; $i++) {
            $columns[] = 'Pertanyaan ' . $i;
        }

        // Menulis header untuk kolom-kolom tersebut
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $sheet->setCellValue($columnLetter . '1', ucfirst($header)); // Menulis header
            $columnLetter++;
        }

        // Mengambil data tendik
        $tendik = Tendik::all();
        $row = 2; // Memulai dari baris kedua untuk data

        foreach ($tendik as $item) {
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
        $fileName = 'Tenaga Kependidikan.xlsx';

        // Kirim file Excel ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Simpan dan keluarkan file ke output
        $writer->save('php://output');
        exit;
    }
}
