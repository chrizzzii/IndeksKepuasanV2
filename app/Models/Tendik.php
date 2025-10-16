<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi, tambahkan deklarasi di bawah
    protected $table = 'tendik';
    // Menentukan kolom primary key
    protected $primaryKey = 'tendik_id';
    public $timestamps = false;    // Menonaktifkan fitur timestamp Eloquent

    // Jika Anda ingin mengizinkan kolom tertentu untuk diisi secara massal
    protected $fillable = [
        'status',
        'email',
        'no_responden',
        'nama',
        'usia',
        'jeniskelamin',
        'alamat',
        'nomor_telepon',
        'saranmasukkan',
        'prodi',
        'password',
        'role',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
        'p9',
        'p10',  // Hanya satu p10
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
        'p21',  // Hanya satu p21
        'p22',
        'p23',
        'p24',
        'p25',
        'p26',
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
