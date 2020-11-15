<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAyahPesertadidikModel extends Model
{
    use HasFactory;
    protected $table = 'dataayahpesertadidik';
    protected $fillable = [
     'id_ayah_peserta_didik',
     'nama_ayah',
     'tahun_lahir_ayah', 
     'kebutuhan_khusus', 
     'perkerjaan_ayah', 
     'pendidikan_ayah',
     'penghasilan_ayah'
 ];
 
}
