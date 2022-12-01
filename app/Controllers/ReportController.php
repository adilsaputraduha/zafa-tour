<?php

namespace App\Controllers;

use App\Models\PaketModel;

class ReportController extends BaseController
{
	public function index()
	{
		$model = new PaketModel();
		$data = [
			'paket' => $model->getPaket()->getResultArray(),
			'validation' => \Config\Services::validation()
		];
		echo view('view_report', $data);
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

	public function reportBookingPaket($paket)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT document_nik, document_booking, document_nama, document_alamat, document_tempat_lahir, document_tgl_lahir,
        document_notelp, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal
        FROM tb_document JOIN tb_booking ON booking_nomor = document_booking
        WHERE booking_paket = '$paket'");

		$data = [
			'booking' => $query->getResultArray(),
			'paket' => $paket,
		];
		echo view('/report/report_booking_paket', $data);
	}
}
