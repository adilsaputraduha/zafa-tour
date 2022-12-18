<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\DocumentModel;
use App\Models\FrontModel;
use App\Models\PaketModel;

class ManifestController extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT document_id, booking_peserta, booking_jumlah, document_nik, document_booking, document_nama, document_alamat, document_tempat_lahir, document_tgl_lahir,
        document_notelp, document_peserta, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal, booking_status, booking_metode, booking_tenor, booking_isverif, booking_cicilanke, booking_total, booking_paket
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
        document_notelp, document_peserta, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal, booking_status, booking_metode, booking_tenor, booking_isverif, booking_cicilanke, booking_total, booking_paket
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
        document_notelp, document_peserta, document_kelamin, document_no_paspor, document_tgl_berlaku, booking_nomor, booking_tanggal, booking_status, booking_metode, booking_tenor, booking_isverif, booking_cicilanke, booking_total, booking_paket
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
		$bookingstatus = $this->request->getPost('bookingstatus');
		$bookingmetode = $this->request->getPost('bookingmetode');
		$bookingtenor = $this->request->getPost('bookingtenor');
		$bookingverif = $this->request->getPost('bookingverif');
		$bookingcicilan = $this->request->getPost('bookingcicilan');
		$bookingtotal = $this->request->getPost('bookingtotal');
		$bookingpaket = $this->request->getPost('bookingpaket');
		$dokumenpeserta = $this->request->getPost('dokumenpeserta');

		if ($bookingpaket == $inputUbahPaket) {
			session()->setFlashdata('failed', 'Anda memilih paket yang sama dengan sebelumnya!');
			return redirect()->to('/admin/manifest');
		} else {
			$db = \Config\Database::connect();
			$query = $db->query("SELECT * FROM tb_booking WHERE booking_peserta = '$peserta' AND booking_paket = '$inputUbahPaket'");

			$dataBooking =  $query->getResultArray();

			$querydua = $db->query("SELECT * FROM tb_paket WHERE paket_id = '$bookingpaket'");

			$dataPaket =  $querydua->getResultArray();

			$querytiga = $db->query("SELECT * FROM tb_paket WHERE paket_id = '$inputUbahPaket'");

			$dataPaketDua =  $querytiga->getResultArray();

			if ($dataBooking == null) {
				$modeltiga = new FrontModel();
				$generateRandom = rand(100, 999);
				$generateDate = date('Ymd');
				$generateInvoice = 'FP-' . $generateDate . "-" . $generateRandom;

				date_default_timezone_set('Asia/Jakarta');
				$data = array(
					'booking_nomor' => $generateInvoice,
					'booking_tanggal' => date('Ymd'),
					'booking_peserta' => $peserta,
					'booking_paket' => $inputUbahPaket,
					'booking_status' => $bookingstatus,
					'booking_jenis' => 0,
					'booking_jumlah' => 1,
					'booking_total' => $dataPaketDua[0]['paket_harga'],
					'booking_metode' => $bookingmetode,
					'booking_tenor' => $bookingtenor,
					'booking_isverif' => $bookingverif,
					'booking_cicilanke' => $bookingcicilan,
				);
				$modeltiga->bookingSave($data);

				// --------------------- //
				$modelsatu = new BookingModel();
				$datasatu = array(
					'booking_total' => $bookingtotal - $dataPaket[0]['paket_harga'],
					'booking_jumlah' => $jumlahbooking - 1,
				);
				$modelsatu->updateBooking($datasatu, $idnota);
				// --------------------- //
				$model = new DocumentModel();
				$data = array(
					'document_peserta' => 1,
					'document_booking' => $generateInvoice,
				);
				$model->updateDocument($data, $id);
				// --------------------- //
				$p = 1;
				for ($x = $dokumenpeserta; $x <= $jumlahbooking + 1; $x++) {
					$modellima = new DocumentModel();
					$datalima = array(
						'document_peserta' => $x,
					);
					$modellima->updateDocumentBooking($datalima, $id + $p, $idnota);
					$p++;
				}
				session()->setFlashdata('success', 'Berhasil mengubah paket');
				return redirect()->to('/admin/manifest');
			} else {
				$modeldua = new BookingModel();
				$datadua = array(
					'booking_total' => $bookingtotal + $dataPaketDua[0]['paket_harga'],
					'booking_jumlah' => $dataBooking[0]['booking_jumlah'] + 1,
				);
				$modeldua->updateBooking($datadua, $dataBooking[0]['booking_nomor']);
				// --------------------- //
				$modelsatu = new BookingModel();
				$datasatu = array(
					'booking_total' => $bookingtotal - $dataPaket[0]['paket_harga'],
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
}
