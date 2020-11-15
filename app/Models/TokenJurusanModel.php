<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenJurusanModel extends Model
{
    use HasFactory;
   public $timestamps = false;
   protected $table = 'tokenpilihjurusanpeserta';
   protected $fillable = ['id_token_peserta_didik','jurusan','token_jurusan'];
}
