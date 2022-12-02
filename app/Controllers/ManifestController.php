<?php

namespace App\Controllers;

use App\Models\PaketModel;

class ManifestController extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT document_nik, document_booking, document_nama, document_alamat, document_tempat_lahir, document_tgl_lahir,
        document_notelp, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal
        FROM tb_document JOIN tb_booking ON booking_nomor = document_booking
        WHERE booking_paket = '1'");

		$model = new PaketModel();
		$data = [
			'booking' => $query->getResultArray(),
			'paket' => $model->getPaket()->getResultArray(),
			'paketselect' => 1,
		];

		echo view('view_manifest', $data);
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
