<?php

namespace App\Libraries;

class MidtransPayment
{
	public function generateToken(Array $params)
	{
		\Midtrans\Config::$serverKey = 'SB-Mid-server-8oaWcyc7m3DFAc-3LEH_HWfr';
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;

		// 'transaction_details' => [
		// 	'order_id'		=> rand(),
		// 	'gross_amount'	=> 10000,
		// ],
		// 'customer_details' => [
		// 	'first_name'	=> 'budi',
		// 	'last_name'		=> 'pratama',
		// 	'email'			=> 'budi.pra@example.com',
		// 	'phone'			=> '08111222333',
		// ],

		// $params = [$transactionDetails, $customerDetails];

		$list = [
			'token' => \Midtrans\Snap::getSnapToken($params),
			'urlRedirect' => \Midtrans\Snap::createTransaction($params)->redirect_url
		];

		return $list;
	}

	public function urlRedirect(Array $params)
	{
		#your code here...
	}
}