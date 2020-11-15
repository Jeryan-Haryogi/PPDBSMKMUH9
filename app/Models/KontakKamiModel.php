<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakKamiModel extends Model
{
    use HasFactory;
    protected $table = "kontakkami";
     protected $fillable = [
    	'nisn',
    	'nama_lengkap', 
    	'email',
    	'pesan'
    ];
}
