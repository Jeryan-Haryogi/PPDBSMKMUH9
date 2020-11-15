<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verifikasiPesertaDidikBaru extends Model
{
    use HasFactory;
     protected $table = 'verifiksipersertadidikbaru';
    protected $fillable  = [
    	'id_verifikasi_perserta_didik',
    	'status_verifikasi',
    	'nama_lengkap',
    	'nama_panggilan', 
    	'nisn',
    	'nis'
];
}
