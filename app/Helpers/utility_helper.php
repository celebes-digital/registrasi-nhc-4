<?php

if ( ! function_exists('preset_select'))
{
	function preset_select($field = '', $value = '', $preset_value = '')
	{
		if ($value == $preset_value)
		{
			return set_select($field, $preset_value, TRUE);
		}
		else
		{
			return set_select($field, $value);
		}
	}
}

if ( ! function_exists('preset_checkbox'))
{
	function preset_checkbox($field = '', $value = '', $preset_value = '')
	{
		if ($value == $preset_value)
		{
			return set_checkbox($field, $preset_value, TRUE);
		}
		else
		{
			return set_checkbox($field, $value);
		}
	}
}

if ( ! function_exists('preset_radio'))
{
	function preset_radio($field = '', $value = '', $preset_value = '')
	{
		if ($value == $preset_value)
		{
			return set_radio($field, $preset_value, TRUE);
		}
		else
		{
			return set_radio($field, $value);
		}
	}
}

if ( ! function_exists('jenis_usaha'))
{
	function jenis_usaha($jenisUsaha)
	{
		return strtoupper(str_replace('_', ' ', $jenisUsaha));
	}
}

if ( ! function_exists('gender'))
{
	function gender($gender)
	{
		$listGender = ['p' => 'Perempuan', 'l' => 'Laki-laki'];

		return $listGender[$gender];
	}
}

if ( ! function_exists('angka'))
{
	function angka($number, $decimal = 0)
	{
		$number = floatval($number);
		return number_format($number, $decimal, ',', '.');
	}
}

if ( ! function_exists('tanggal'))
{
	function tanggal($tanggal, $short = FALSE, $full_format = FALSE)
	{
		// $date = new DateTime();
		// echo $date->format('z')+1;
		// var_dump($totalDaysInYear = date('z', strtotime('2020-12-31')) + 1);

		// 12 Februari 2020 13:51:59
		if ( $full_format )
		{
			return strftime("%d %B %Y", strtotime($tanggal));
			// return strftime("%d %B %Y %T", strtotime($tanggal));
		}
		// 12 Feb 2020
		elseif ( $short )
		{
			return strftime("%d %b %Y", strtotime($tanggal));
		}
		// 12-02-2020 12:21:49
		elseif ( $short && $full_format )
		{
			return strftime("%d %b %Y %T", strtotime($tanggal));
		}
		else
		{
			return date('d-m-Y', strtotime($tanggal));
		}
	}
}

if ( ! function_exists('tgl_jatuh_tempo') )
{
	function tgl_jatuh_tempo($tgl_awal)
	{
		// Normalisai jika pencairan bulan Januari dan Jatuh Tempo di Februari
		$tanggal = new DateTime($tgl_awal);
		$tanggal->format('Y-m-d');

		$hari = $tanggal->format('j');
		$tanggal->modify('first day of +1 month')->modify('+' . (min($hari, $tanggal->format('t')) - 1) . ' days');

		return $tanggal->format('Y-m-d');
	}
}

if ( ! function_exists('hitung_selisih_hari') )
{
	function hitung_selisih_hari($tgl_jatuh_tempo, $format = 'hari')
	{
		$start = new DateTime('NOW');
		$end	= new DateTime($tgl_jatuh_tempo);

		// Hasilnya positive (jika tgl sekarang > tgl terhitung)
		if ( $format === 'hari' )
		{
			$hasil = $end->diff($start)->format("%r%a");
		}
		elseif ( $format === 'bulan' )
		{
			$hasil = ($end->diff($start)->y * 12) + $end->diff($start)->m;
		}

		return $hasil;
	}
}

if ( ! function_exists('hitung_selisih_tanggal') )
{
	function hitung_selisih_tanggal($start, $end = 'now', $format = 'hari')
	{
		// public function nb_mois($date1, $date2)
		// {
		//     $begin = new DateTime( $date1 );
		//     $end = new DateTime( $date2 );
		//     $end = $end->modify( '+1 month' );

		//     $interval = DateInterval::createFromDateString('1 month');

		//     $period = new DatePeriod($begin, $interval, $end);
		//     $counter = iterator_count($period); // or
		//		 // and loop through $period
		//     $counter = 0;
		//     foreach($period as $dt) {
		//         $counter++;
		//     }

		//     return iterator_count($period)
		// }

		$tgl_awal 	= new DateTime($start);
		$tgl_akhir	= new DateTime($end);

		// Hasilnya positive (jika tgl sekarang > tgl terhitung)
		if ( $format === 'hari' )
		{
			return $tgl_awal->diff($tgl_akhir)->days + 1;
			// return $tgl_awal->diff($tgl_akhir)->format("%r%a");
		}
		elseif ( $format === 'bulan' )
		{
			return ($tgl_awal->diff($tgl_akhir)->y * 12) + $tgl_awal->diff($tgl_akhir)->m;
		}
	}
}

if ( ! function_exists('hitungWaktuSelisih'))
{
	function hitungWaktuSelisih($tgl_awal, $type = 'add', $interval = '')
	{
		$start = new DateTime($tgl_awal);

		if ( $type === 'add' )
		{
			$end = $start->add(new DateInterval($interval));
		}
		elseif ( $type === 'sub' )
		{
			$end = $start->sub(new DateInterval($interval));
		}

		return $end->format('Y-m-d');
	}
}

if ( ! function_exists('generateCode') )
{
	function generateCode($length = 5)
	{
		$randomKey			= '';
		$characters			= '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);

		for ( $i = 0; $i < $length; $i++ )
		{
			$randomKey .= $characters[rand(0, $charactersLength - 1)];
		}

		return $randomKey;
	}
}

if ( ! function_exists('random_str') )
{
	function random_str($length = 5)
	{
		$char 		= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLen		= strlen($char);
		$randomStr	= '';

		for ( $i = 0; $i < $length; $i++ )
		{
			$randomStr .= $char[rand(0, $charLen - 1)];
		}

		return $randomStr;
	}
}