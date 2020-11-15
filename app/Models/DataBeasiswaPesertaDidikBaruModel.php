<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBeasiswaPesertaDidikBaruModel extends Model
{
    use HasFactory;
    protected $table = 'databeasiswapesertadidik';
    protected $fillable = [
    	'id_beasiswa_peserta_didik',
    	'jenis_beasiswa',
    	'sumber_beasiswa', 
    	'tahun_mulai',
    	'tahun_selesai'
    ];
}
