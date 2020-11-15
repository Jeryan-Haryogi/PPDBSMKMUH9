<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWaliPesertadidikModel extends Model
{
    use HasFactory;
     protected $table = 'datawalipesertadidik';
    protected $fillable = [
    'id_wali_peserta_didik',
     'nama_wali',
     'tahun_lahir_wali', 
     'kebutuhan_khusus',
     'perkerjaan_wali',
     'pendidikan_wali',
     'penghasilan_wali'
 ];
}
