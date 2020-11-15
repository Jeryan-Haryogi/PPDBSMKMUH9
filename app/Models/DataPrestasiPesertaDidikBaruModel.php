<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPrestasiPesertaDidikBaruModel extends Model
{
    use HasFactory;
    protected $table = 'dataprestasipesertadidik';
    protected $fillable = [
    	'id_prestasi_peserta_didik',
    	'jenis_lomba',
    	'tingkat', 
    	'nama_prestasi',
    	'tahun',
    	'penyelenggara'
    ];
    
}
