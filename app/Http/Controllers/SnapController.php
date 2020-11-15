<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\ResponseTransaksiModel;
use App\Veritrans\Midtrans;

class SnapController extends Controller
{
    public function __construct()
    {   
        Midtrans::$serverKey = 'SB-Mid-server-Op2fTRHHufV4r0-_jNmPvIHt';
        //set is production to true for production mode
        Midtrans::$isProduction = false;
    }

    public function snap()
    {
        return view('peserta/snap_checkout');
    }

    public function token(Request $request) 
    {
        error_log('masuk ke snap token dri ajax');
        $midtrans = new Midtrans;
        $nama_lengkap = $request->nama_lengkap;
        $no_hp = $request->no_hp;
        $email_pribadi = $request->email_pribadi;
        $id_order = $request->id_order;
        $alamat = $request->alamat;
        $provinsi = $request->provinsi;
        $transaction_details = array(
            'order_id'      => $id_order,
            'gross_amount'  => 200000
        );

        // Populate items
        $items = [
            array(
                'id'        => 'Payment Get PPDB',
                'price'     => 200000,
                'quantity'  => 1,
                'name'      => 'Pembayaran Peserta Didik Baru'
            ),
        ];

       // Populate customer's billing address
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Setiawan",
            'address'       => "Karet Belakang 15A, Setiabudi.",
            'city'          => "Jakarta",
            'postal_code'   => "51161",
            'phone'         => "081322311801",
            'country_code'  => 'IDN'
            );

        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => "John",
            'last_name'     => "Watson",
            'address'       => $alamat,
            'city'          => $provinsi,
            'postal_code'   => $provinsi,
            'phone'         => "081322311801",
            'country_code'  => 'IDN'
            );

        // Populate customer's Info
        $customer_details = array(
            'first_name'      => $nama_lengkap,
            'phone'           => $no_hp,
              'email'           => $email_pribadi,
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour', 
            'duration'   => 3
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );
    
        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //return redirect($vtweb_url);
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }

    public function finish(Request $request)
    {
        $result = $request->input('result_data');

        $result = json_decode($result);
       
// $codepayment = $result->payment_code == NULL ? '-' : $result->payment_code;
        if ($request->pdf_url) {
        ResponseTransaksiModel::create([
        'order_by_id' => $result->order_id,
        'status_codes' => $result->status_code,
        'status_message' => $result->status_message,
        'transaction_id' => $result->transaction_id,
        'gross_amount' => $result->gross_amount,
        'payment_type' =>  $result->payment_type,
        'transaction_time' => $result->transaction_time,
        'transaction_status' => $result->transaction_status,
        'pdf_url' => $result->pdf_url,
        'fraud_status' => $result->fraud_status,
       ]);
        
        }else if ($request->fraud_status) {
        ResponseTransaksiModel::create([
        'order_by_id' => $result->order_id,
        'status_codes' => $result->status_code,
        'status_message' => $result->status_message,
        'transaction_id' => $result->transaction_id,
        'gross_amount' => $result->gross_amount,
        'payment_type' =>  $result->payment_type,
        'transaction_time' => $result->transaction_time,
        'transaction_status' => $result->transaction_status,
        'pdf_url' => '-',
        'fraud_status' => $result->fraud_status,
       ]);
        }else {
        ResponseTransaksiModel::create([
        'order_by_id' => $result->order_id,
        'status_codes' => $result->status_code,
        'status_message' => $result->status_message,
        'transaction_id' => $result->transaction_id,
        'gross_amount' => $result->gross_amount,
        'payment_type' =>  $result->payment_type,
        'transaction_time' => $result->transaction_time,
        'transaction_status' => $result->transaction_status,
        'pdf_url' => '-',
        'fraud_status' => '-',
       ]);
        }


        return redirect('peserta/ceta-formulir-pendaftaran')->with('status', 'Metode Pembayaran berhasil');
    }

    public function notification()
    {
        $midtrans = new Midtrans;
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);

        if($result){
        $notif = $midtrans->status($result->order_id);
        }

        error_log(print_r($result,TRUE));

        /*
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              echo "Transaction order_id: " . $order_id ." is challenged by FDS";
              } 
              else {
              // TODO set payment status in merchant's database to 'Success'
              echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
          echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          } 
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          } 
          else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }*/
   
    }
}    