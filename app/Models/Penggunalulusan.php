<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunalulusan extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi, tambahkan deklarasi di bawah
    protected $table = 'pengguna_lulusan';
    // Menentukan kolom primary key
    protected $primaryKey = 'penggunalulusan_id';
    public $timestamps = false;    // Menonaktifkan fitur timestamp Eloquent

    // Jika Anda ingin mengizinkan kolom tertentu untuk diisi secara massal
    protected $fillable = [
        'status',
        'email',
        'nama_identitaspenilai',
        'usia_identitaspenilai',
        'alamat_identitaspenilai',
        'password',
        'role',
        'jeniskelamin_identitaspenilai',
        'instansi_identitaspenilai',
        'jabatan_identitaspenilai',
        'kontak_identitaspenilai',
        'lamabekerjadenganlulusan',
        'nama_identitaslulusan',
        'jeniskelamin_identitaslulusan',
        'jabatan_identitaslulusan',
        'latarbelakang_identitaslulusan',
        'lamabekerja_identitaslulusan',
        'lamabekerjadiinstansisaatini',
        'saranmasukkan',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
        'p9',
        'p10',
        'p11',
        'p12',
        'p13',
        'p14',
        'p15',
        'p16',
        'p17',
        'p18',
        'p19',
        'p20',
        'p21',
        'u1',
        'u2',
        'u3',
        'u4',
        'u5',
        'u6',
        'u7',
        'u8',
        'u9',

    ];
}
