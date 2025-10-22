<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi, tambahkan deklarasi di bawah
    protected $table = 'orangtua';
    // Menentukan kolom primary key
    protected $primaryKey = 'orangtua_id';
    public $timestamps = false;    // Menonaktifkan fitur timestamp Eloquent

    // Jika Anda ingin mengizinkan kolom tertentu untuk diisi secara massal
    protected $fillable = [
        'orangtua_id',
        'status',
        'no_responden',
        'nama',
        'namamahasiswa',
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
        'p22',
        'p23',
        'p24',
        'p25',
        'p26',
        'p27',
        'p28',

    ];
}
