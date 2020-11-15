<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeriodikPesertaDidikModel extends Model
{
    use HasFactory;
    protected $table = 'dataperiodikpesertadidik';
    protected $fillable = [
    	'id_periodik_peserta_didik',
    	'tinggi_badan',
    	'berat_badan', 
    	'jarak_sekolah',
    	'jarak_lebih_sekolah',
    	'waktu_ke_sekolah',
    	'waktu_lebih_ke_sekolah',
    	'anak_ke_berapa',
    	'dari_keberapa',
    	'kandung',
    	'tiri',
    	'angkat'
    ];
    
}
