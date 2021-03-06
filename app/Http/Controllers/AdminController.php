<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Paket;
use App\Payment;
use Carbon\Carbon;

use Midtrans\Notification;
use Midtrans\Config;
use Midtrans\Transaction;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        //Set Your server key
        Config::$serverKey = 'SB-Mid-server-XxYwNG3zWDPA4eWpHoXqGcka';

        // Uncomment for production environment
        Config::$isProduction = false;

        // Enable sanitization
        Config::$isSanitized = true;

        // Enable 3D-Secure
        Config::$is3ds = true;



        // $notif = new Notification();
        // $transaction = $notif->transaction_status;
        // $type = $notif->payment_type;
        // $order_id = $notif->order_id;
        // $fraud = $notif->fraud_status;
    }
   

    public function index(){
        $instat = Order::orderBy('created_at','DESC')->where('status', 0)->with(['paket'])->paginate(5);
        return view('admins.index', compact('instat'));
    }
    public function daftarCustomer(){
        $dafCust = Customer::orderBy('nama','ASC')->paginate(50);
        return view('admins.daftar-customer', compact('dafCust'));
    }

    public function daftarOrder(){
        $dafOrder = Order::orderBy('created_at','DESC')->with(['paket'])->paginate(50);
        return view('admins.daftar-order', compact('dafOrder'));
    }
    public function orderMemesan(){
        $orderPesan = Order::orderBy('created_at','DESC')->where('status', 0)->with(['paket'])->paginate(50);
        return view('admins.order-memesan', compact('orderPesan'));
    }

    public function orderMenunggu(){
        $orderTunggu = Order::orderBy('created_at','DESC')->where('status', 1)->with(['paket'])->paginate(50);
        return view('admins.order-menunggu', compact('orderTunggu'));
    }

    public function orderMenungguBayar(){
        $orderMenBayar = Order::orderBy('created_at','DESC')->where('status', 2)->with(['paket'])->paginate(50);
        return view('admins.order-menungguPembayaran', compact('orderMenBayar'));
    }

    public function orderDibatalkan(){
        $orderDibatalkan = Order::orderBy('created_at','DESC')->where('status', 3)->with(['paket'])->paginate(50);
        return view('admins.order-dibatalkan', compact('orderDibatalkan'));
    }

    public function orderTelahDibayar(){
        $orderTelahDibayar = Order::orderBy('created_at','DESC')->where('status', 4)->with(['paket'])->paginate(50);
        return view('admins.order-telahDibayar', compact('orderTelahDibayar'));
    }

    public function orderSelesai(){
        $orderSelesai = Order::orderBy('created_at','DESC')->where('status', 5)->with(['paket'])->paginate(50);
        return view('admins.order-selesai', compact('orderSelesai'));
    }

    public function view($id){
        $viewOrder = Order::find($id);
        return view('admins.view-order', compact('viewOrder'));
    }

    public function viewPayment($payid){

        // $transaction = $notif->transaction_status;
        // $type = $notif->payment_type;
        // $order_id = $notif->order_id;
        // $fraud = $notif->fraud_status;

        // $viewPay = Payment::orderBy('created_at','DESC')->where('order_id',$payid)->get();

        $viewpay = Payment::where('order_id',$payid)->value('invoice_order');

        // $pay = $viewpay->invoice_order;

        // $orderId = $viewPay;

        // Get transaction status to Midtrans API
        try {
            $status = Transaction::status($viewpay);

            $file = array($status);

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        // $lihat1 = Payment::where('invoice_order',$order_id);

        dd($file);

        // return view('admins.test-payment', compact('file'));

    }

    public function updateOrder(Request $request, $id){

        $this->validate($request, [
            'customer_nama' => 'required',
            'customer_alamat' => 'required',
            'tgl_datang' => 'required',
            'status' => 'required',         
        ]);

        $ubahOrder = Order::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        
        $ubahOrder->update([
                    'customer_nama' => $request->customer_nama,
                    'customer_alamat' => $request->customer_alamat,
                    'tgl_datang' =>  Carbon::parse($request->tgl_datang)->format('Y-m-d'),
                    'status' => $request->status,

        ]);

        return redirect(route('admin.daftar.order'))->with(['success' => 'Data Order Berhasil Diubah!']);


    }


}
