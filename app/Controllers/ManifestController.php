<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\DocumentModel;
use App\Models\PaketModel;

class ManifestController extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT document_id, booking_peserta, booking_jumlah, document_nik, document_booking, document_nama, document_alamat, document_tempat_lahir, document_tgl_lahir,
        document_notelp, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal
        FROM tb_document JOIN tb_booking ON booking_nomor = document_booking JOIN tb_peserta ON peserta_id = booking_peserta
        WHERE booking_paket = '1'");

		$model = new PaketModel();
		$data = [
			'booking' => $query->getResultArray(),
			'paket' => $model->getPaket()->getResultArray(),
			'paketselect' => 1,
		];

		echo view('view_manifest', $data);
	}

	public function indexParameter($id)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT document_id, booking_peserta, booking_jumlah, document_nik, document_booking, document_nama, document_alamat, document_tempat_lahir, document_tgl_lahir,
        document_notelp, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal
        FROM tb_document JOIN tb_booking ON booking_nomor = document_booking JOIN tb_peserta ON peserta_id = booking_peserta
        WHERE booking_paket = '$id'");

		$model = new PaketModel();
		$data = [
			'booking' => $query->getResultArray(),
			'paket' => $model->getPaket()->getResultArray(),
			'paketselect' => $id,
		];

		echo view('view_manifest', $data);
	}

	public function reportBookingPaket($paket)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT document_id, booking_peserta, booking_jumlah, document_nik, document_booking, document_nama, document_alamat, document_tempat_lahir, document_tgl_lahir,
        document_notelp, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal
        FROM tb_document JOIN tb_booking ON booking_nomor = document_booking JOIN tb_peserta ON peserta_id = booking_peserta
        WHERE booking_paket = '$paket'");

		$data = [
			'booking' => $query->getResultArray(),
			'paket' => $paket,
		];
		echo view('/report/report_booking_paket', $data);
	}

	public function ubahPaket()
	{
		$id = $this->request->getPost('id');
		$idnota = $this->request->getPost('idnota');
		$inputUbahPaket = $this->request->getPost('inputUbahPaket');
		$peserta = $this->request->getPost('peserta');
		$jumlahbooking = $this->request->getPost('jumlahbooking');

		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM tb_booking WHERE booking_peserta = '$peserta' AND booking_paket = '$inputUbahPaket'");

		$dataBooking =  $query->getResultArray();

		if ($dataBooking == null) {
			session()->setFlashdata('failed', 'Peserta belum memiliki paket yang dipilih. Silahkan order paket dan lakukan pembayaran');
			return redirect()->to('/admin/manifest');
		} else {
			$modeldua = new BookingModel();
			$datadua = array(
				'booking_jumlah' => $dataBooking[0]['booking_jumlah'] + 1,
			);
			$modeldua->updateBooking($datadua, $dataBooking[0]['booking_nomor']);
			// --------------------- //
			$modelsatu = new BookingModel();
			$datasatu = array(
				'booking_jumlah' => $jumlahbooking - 1,
			);
			$modelsatu->updateBooking($datasatu, $idnota);
			// --------------------- //
			$model = new DocumentModel();
			$data = array(
				'document_booking' => $dataBooking[0]['booking_nomor'],
			);
			$model->updateDocument($data, $id);
			session()->setFlashdata('success', 'Berhasil mengubah paket');
			return redirect()->to('/admin/manifest');
		}
	}
}
