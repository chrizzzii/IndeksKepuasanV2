<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi, tambahkan deklarasi di bawah
    protected $table = 'masyarakat';
    // Menentukan kolom primary key
    protected $primaryKey = 'masyarakat_id';
    public $timestamps = false;    // Menonaktifkan fitur timestamp Eloquent

    // Jika Anda ingin mengizinkan kolom tertentu untuk diisi secara massal
    protected $fillable = [
        'masyarakat_id',
        'status',
        'no_responden',
        'nama',
        'role',
        'usia',
        'jeniskelamin',
        'alamat',
        'nomor_telepon',
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
    ];
}
