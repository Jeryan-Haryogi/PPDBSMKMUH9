<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseTransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'responsetransaksi';
   protected $fillable = [
   						'order_by_id',
						'status_codes',
						'transaction_id',
						'gross_amount',
						'payment_type',
						'status_message',
						'transaction_time',
						'transaction_status',
						'pdf_url',
						'fraud_status'

							];
}
