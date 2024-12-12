<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
if (! function_exists('presetSelect')) {
	function presetSelect($field = '', $value = '', $preset_value = '')
	{
		if ($value == $preset_value) {
			return set_select($field, $preset_value, true);
		} else {
			return set_select($field, $value);
		}
	}
}

if (! function_exists('presetRadio')) {
	function presetRadio($field = '', $value = '', $preset_value = '')
	{
		if ($value == $preset_value) {
			return set_radio($field, $preset_value, true);
		} else {
			return set_radio($field, $value);
		}
	}
}

if (! function_exists('presetCheckbox')) {
	function presetCheckbox($field = '', $value = '', $preset_value = '')
	{
		if ($value == $preset_value) {
			return set_checkbox($field, $preset_value, true);
		} else {
			return set_checkbox($field, $value);
		}
	}
}

if (! function_exists('kelamin')) {
	function kelamin($field = '')
	{
		$kelamin = ['l' => 'Laki-laki', 'p' => 'Perempuan'];
		return $kelamin[$field];
	}
}

if (! function_exists('formatPhone')) {
	function formatPhone($string)
	{
		return str_starts_with($string, '08') ? substr_replace($string, '628', 0, 2) : $string;
	}
}

if (! function_exists('uniqueCode')) {
	function uniqueCode($length = 3)
	{
		$randomKey			= '';
		$characters			= '01234';
		$charactersLength = strlen($characters);

		for ($i = 0; $i < $length; $i++) {
			$randomKey .= $characters[rand(0, $charactersLength - 1)];
		}

		return $randomKey;
	}
}

if (! function_exists('hitungExpire')) {
	function hitungExpire($tglExpire, $waktu = 'hari')
	{
		// Object Oriented style
		// Usefull with formatted result eg: x hour y minute z second
		$start 	= new DateTime('now');
		$end 	= new DateTime($tglExpire);

		if ($waktu === 'hari') {
			$interval = $start->diff($end)->format('%R%a');
			// $interval = $start->diff($end)->format('%R%a hr');
		} else if ($waktu === 'bulan') {
			$interval = $start->diff($end)->format('%R%m');
			// $interval = $start->diff($end)->format('%R%m bln %d hr');
		} else if ($waktu === 'full') {
			$interval = $start->diff($end)->format('%R%y');
			// $interval = $start->diff($end)->format('%R%y th %m bln %d hari');
		}

		// return $start->diff($end)->format('%R%m bln. %d hari');
		return $interval;

		/**
		 * Menghitung total bulan diantara tanggal
		 */
		// -- 1.
		// $begin		= new DateTime( '2014-10-16' );
		// $end 			= new DateTime( date('Y-m-d') );
		// $interval 	= DateInterval::createFromDateString('1 month');
		// $period 		= new DatePeriod($begin, $interval, $end);
		// $counter 	= iterator_count($period);
		// print_r($counter);

		// -- 2.
		// $date1	= strtotime('2015-06-10');
		// $date2	= strtotime('now');
		// $months	= 0;

		// while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
		// 	$months++;
		// print_r($months);

		// -- 3.
		// $start 		= new DateTime('2015-06-10');
		// $end 			= new DateTime('now');
		// $interval 	= $start->diff($end);
		// print_r($months = ($interval->y * 12) + $interval->m);
		/**--------------------------------------------------------*/

		// /3600 (detik), /60 (menit), default (detik)
		// $starttimestamp = strtotime($start);
		// $endtimestamp		= strtotime($end);
		// $difference			= abs($endtimestamp - $starttimestamp) / 60;

		// Result in minutes
		// $time 		= new DateTime($start);
		// $diff 		= $time->diff(new DateTime($end));
		// $minutes	= ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
	}
}

if (! function_exists('angka')) {
	function angka($number, $decimal = 0)
	{
		$number = floatval($number);
		return number_format($number, $decimal, ',', '.');
	}
}

if (! function_exists('generateCode')) {
	function generateCode($length = 5)
	{
		$randomKey			= '';
		$characters			= '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength	= strlen($characters);

		for ($i = 0; $i < $length; $i++) {
			$randomKey .= $characters[rand(0, $charactersLength - 1)];
		}

		return $randomKey;
	}
}

if (! function_exists('randomStr')) {
	function randomStr($length = 5)
	{
		$char 		= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLen	= strlen($char);
		$randomStr	= '';

		for ($i = 0; $i < $length; $i++) {
			$randomStr .= $char[rand(0, $charLen - 1)];
		}

		return $randomStr;
	}
}

if (! function_exists('terbilang')) {
	function terbilang($nominal)
	{
		$nominal = abs($nominal);
		$angka	= ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
		$temp		= "";

		if ($nominal < 12) {
			$temp = " " . $angka[$nominal];
		} elseif ($nominal < 20) {
			$temp = terbilang($nominal - 10) . " Belas";
		} elseif ($nominal < 100) {
			$temp = terbilang($nominal / 10) . " Puluh" . terbilang($nominal % 10);
		} elseif ($nominal < 200) {
			$temp = " Seratus" . terbilang($nominal - 100);
		} elseif ($nominal < 1000) {
			$temp = terbilang($nominal / 100) . " Ratus" . terbilang($nominal % 100);
		} elseif ($nominal < 2000) {
			$temp = " Seribu" . terbilang($nominal - 1000);
		} elseif ($nominal < 1000000) {
			$temp = terbilang($nominal / 1000) . " Ribu" . terbilang($nominal % 1000);
		} elseif ($nominal < 1000000000) {
			$temp = terbilang($nominal / 1000000) . " Juta" . terbilang($nominal % 1000000);
		} elseif ($nominal < 1000000000000) {
			$temp = terbilang($nominal / 1000000000) . " Milyar" . terbilang($nominal % 1000000000);
		}
		return $temp;
	}
}

if (! function_exists('hitungSelisihWaktu')) {
	function hitungSelisihWaktu($tgl_awal, $type = 'add', $interval = '')
	{
		$start = new DateTime($tgl_awal);

		if ($type === 'add') {
			$end = $start->add(new DateInterval($interval));
		} elseif ($type === 'sub') {
			$end = $start->sub(new DateInterval($interval));
		}

		return $end->format('Y-m-d');
	}
}

// ================== NOTIFIKASI REGISTRASI ================== //
if (! function_exists('notifRegistrasi')) {
	function notifRegistrasi(array $data)
	{
		$text = "Halo *{$data['event']['nama_peserta']}*,\r\n
Terima kasih telah melakukan pendaftaran di event NHC Batch 4 🤩

Silahkan melakukan pembayaran ke rekening berikut:

*Bank BRI*
*034301002590568*
*a/n Celebes Solusi Digital*

_Harap untuk mengirimkan bukti transfer setelah melakukan pembayaran_

Kami akan segera melakukan pengiriman QRCode e-tiket setelah proses validasi selesai 🤗

Terima kasih atas perhatian dan kerja samanya.

Salam Hangat,
Panitia Pelaksana";

		return $text;
	}
}

// ========================= NOTIFIKASI VALIDASI ========================= //
if (! function_exists('notifValidasi')) {
	function notifValidasi(array $data)
	{
		$text = "Haaalo *{$data['event']['nama_peserta']}*,\r\n
Terima kasih telah melakukan pembayaran untuk *NHC Batch 4* 😊

Berikut kami kirimkan QRCode 🎟️*E-TICKET* 🎟️ yang perlu kamu bawa saat kegiatan.

🌟 NHC Batch 4
🗓️ Jumat-Sabtu, 3-4 Januari 2025
📍 Hotel Favor
🛣️ Jl. Lasinrang No.15, Mangkura, Kec Ujung Pandang, Kota Makassar

*Penting:*
_Mohon untuk tidak membagikan e-ticket ini kepada siapa pun. E-ticket ini bersifat pribadi dan hanya dapat digunakan oleh kamu._

Jika kamu memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami dengan membalas pesan ini yahh😁

Terima kasih dan sampai ketemu di kelas✨

Salam Hangat,
*Panitia Pelaksana*";

		return $text;
	}
}
