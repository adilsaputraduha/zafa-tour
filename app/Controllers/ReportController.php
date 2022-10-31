<?php

namespace App\Controllers;

class ReportController extends BaseController
{
	public function index()
	{
		return view('view_report');
	}

	public function reportBooking($tanggalawal, $tanggalakhir)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT booking_nomor, booking_tanggal, booking_peserta, peserta_nama,
        booking_paket, paket_nama, paket_harga, booking_status, booking_jenis, booking_jumlah, booking_total
        FROM tb_booking JOIN tb_peserta ON peserta_id = booking_peserta JOIN tb_paket ON paket_id = booking_paket
        WHERE booking_tanggal BETWEEN '$tanggalawal' and '$tanggalakhir'");

		$data = [
			'booking' => $query->getResultArray(),
			'tanggalawal' => $tanggalawal,
			'tanggalakhir' => $tanggalakhir,
		];
		echo view('/report/report_booking', $data);
	}
}
