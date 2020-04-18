<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\Paypalpayment;
use App\Cardpayment;
use App\OrderProduct;


class CheckoutController extends Controller
{
   
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect('/');//->route('shop.index');
        } 
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $paypalToken = $gateway->ClientToken()->generate();
 
        return view('checkout', compact('paypalToken'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $nonce = $request->payment_method_nonce;
        $result = $gateway->transaction()->sale([
            'amount' => round(Cart::total(), 2),
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        $transaction = $result->transaction;
        //dd($transaction);
        $order = new Order([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_address' => $request->address1 . ' '. $request->address2,
            'billing_city' => $request->city,
            //'billing_province' => $request->province,
            'billing_postalcode' => $request->zipcode,
            //'billing_phone' => $request->phone,
            //'billing_name_on_card' => $request->name_on_card,
            //'billing_discount' => getNumbers()->get('discount'),
           // 'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => Cart::subtotal(),
            'billing_tax' => Cart::tax(),
            'billing_total' => Cart::total(),
            'payment_type' => $transaction->paymentInstrumentType == 'paypal_account'? 'Paypal' : 'Card',
           
        ]);
        
        if($transaction->paymentInstrumentType == 'paypal_account')
        {
            $paypal = New Paypalpayment();
            $paypal->payerEmail =  $transaction->paypal['payerEmail'];
            $paypal->paymentId = $transaction->paypal['paymentId'];
            $paypal->payerStatus = $transaction->paypal['payerStatus'];
            $paypal->paymentId = $transaction->paypal['transactionFeeAmount'];
            $paypal->save();
            $paypal->order()->save($order);
        }
        else
        {
            $card = New Cardpayment();
            $card->cardno = $transaction->creditCard['bin'] . '****' . $transaction->creditCard['last4'];
            $card->cardType = $transaction->creditCard['cardType'];
            $card->save();
            $card->order()->save($order);
        }
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'licence_type' => $item->options->licencetype,
            ]);
        }
        Cart::instance('default')->destroy();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
