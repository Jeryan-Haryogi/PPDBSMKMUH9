<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertadidikbaruModel extends Model
{
    use HasFactory;
    protected $table = 'pesertadidikbaru';
    protected $fillable  = [
    	'nama_lengkap',
    	'nama_panggilan', 
    	'foto',
    	'jenis_kelamin', 
    	'nisn',
    	'nis',
    	'asal_sekolah',
    	'nik',
    	'ttgl',
    	'jurusan', 
    	'agama',
    	'kebutuhan_khusus', 
    	'alamat', 
    	'perumahan',
    	'rt', 
    	'rw',
    	'provinsi',
    	'kabupaten',
    	'kelu_des',
    	'kecamatan', 
    	'kodepos',
    	'alat_transpotasi',
    	'jenis_tinggal',
    	'no_tlprumah',
    	'no_tlppribadi',
    	'no_ujian',
    	'penerima_pks',
    	'no_pks',
    	'email_pribadi'
];
}
