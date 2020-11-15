<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIbuPesertadidikModel extends Model
{
    use HasFactory;
     protected $table = 'dataibupesertadidik';
    protected $fillable = [
    'id_ibu_peserta_didik',
     'nama_ibu',
     'tahun_lahir_ibu', 
     'kebutuhan_khusus',
     'perkerjaan_ibu',
     'pendidikan_ibu',
     'penghasilan_ibu'
 ];
}
