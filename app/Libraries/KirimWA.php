<?php

namespace App\Libraries;

class KirimWA
{
	// protected $apiToken = '82b1bc9c-5a6a-4055-8d71-116d7264384c';
	protected $apiToken = '51844543-5d96-4eda-9f5a-c49c66e64be7';

	/**
	 * [postMessageText description]
	 * @param  string $phone [description]
	 * @param  string $msg   [description]
	 * @return [type]        [description]
	 */
	public function postMessageText($msg, $noHp = '')
	{
		// $curl = curl_init();

		$pesan = [
			"messageType"	=> "text",
			"to"			=> $noHp,
			"body"			=> $msg,
			// "file" => "https://file-url.com",
			"delay"			=> 10,
			// "schedule" => 1665408510000
		];

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.starsender.online/api/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($pesan),
			// CURLOPT_SSL_VERIFYHOST	=> 0, // dont use this on LIVE SERVER
			// CURLOPT_SSL_VERIFYPEER	=> 0, // dont use this on LIVE SERVER
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json',
				'Authorization: ' . $this->apiToken
			]
		));

		$response	= curl_exec($curl);
		$message	= json_decode($response, true);

		curl_close($curl);

		return $response;
	}

	/**
	 * [postMsgImg description]
	 * @param  string $phone   [description]
	 * @param  string $img_url [description]
	 * @param  string $caption [description]
	 * @return [type]          [description]
	 */
	public function postMsgImg(string $msg, string $noHp, string $imgUrl)
	{
		$pesan = [
			"messageType"	=> "media",
			"to"			=> $noHp,
			"body"			=> $msg,
			"file"			=> $imgUrl,
			"delay"			=> 10,
		];

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.starsender.online/api/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($pesan),
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json',
				'Authorization: ' . $this->apiToken
			]
		));

		$response	= curl_exec($curl);
		$message	= json_decode($response, true);

		curl_close($curl);

		return $response;
	}

	/**
	 * [postMsgDocument description]
	 * @param  string $phone   [description]
	 * @param  string $doc_url [description]
	 * @param  string $caption [description]
	 * @return [type]          [description]
	 */
	public function postMsgDocument(string $phone = '', string $doc_url = '', string $caption = '')
	{
		try {
			$reqParams = [
				'token'		=> $this->apiToken,
				'url'			=> 'https://api.kirimwa.id/v1/messages',
				'method'		=> 'POST',
				'payload'	=> json_encode([
					'message'			=> $doc_url,
					'phone_number'		=> $phone,
					'message_type'		=> 'document',
					'device_id'			=> $this->device_I,
					'caption'			=> $caption
				])
			];

			$response = $this->apiKirimWa($reqParams);
			return $response['body'];
		} catch (Exception $e) {
			print_r($e);
		}
	}
}
