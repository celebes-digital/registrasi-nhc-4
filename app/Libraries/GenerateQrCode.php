<?php

namespace App\Libraries;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class GenerateQrCode
{
	public static function generate(String $code)
	{
		$writer	= new PngWriter();
		$QrCode	= QrCode::create('E-Tiket : '.$code)
						->setEncoding(new Encoding('UTF-8'))
						->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
						->setSize(300)
						->setMargin(20)
						->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
						->setForegroundColor(new Color(2, 101, 146))
						->setBackgroundColor(new Color(255, 255, 255));

		// add logo
		$logo	= Logo::create( FCPATH . 'img/logo-kolaborasi-sm.png')->setResizeToWidth(70);
		// $label	= Label::create('Verified Peserta')->setTextColor(new Color(25, 25, 25));
		$result	= $writer->write($QrCode, $logo);

		// Save it to a file
		$result->saveToFile(FCPATH .'img/admin/qrcode/'.$code.'.png');
	}
}