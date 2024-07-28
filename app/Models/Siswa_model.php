<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_model extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'namalengkap',
        'nisn',
        'nis',
        'namalengkap',
        'objectjeniskelaminfk',
        'tgllahir',
        'alamat',
        'asalsekolah',
        'alamatsekolah',
        'objectjurusanfk',
        'notelp',
        'jalurmasuk',
        'ketjalurmasuk'
    ];
}
