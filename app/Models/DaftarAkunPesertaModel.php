<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarAkunPesertaModel extends Model
{
    use HasFactory;
    protected $table = 'daftarakunpesertabaru';
    protected $fillable = [
     'nisn',
     'nama_lengkap',
     'role_akses',
     'password'
 ];
}
