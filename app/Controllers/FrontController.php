<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\ContactModel;
use App\Models\DocumentModel;
use App\Models\FaqModel;
use App\Models\FrontModel;
use App\Models\PaketModel;
use App\Models\PembayaranModel;
use App\Models\TestimonialModel;

class FrontController extends BaseController
{
	public function index()
	{
		$model = new PaketModel();
		$modeldua = new TestimonialModel();
		$modeltiga = new FaqModel();
		date_default_timezone_set('Asia/Jakarta');
		$data = [
			'paket' => $model->getPaket()->getResultArray(),
			'testi' => $modeldua->getTestimonialLimit3()->getResultArray(),
			'faq' => $modeltiga->getFaq()->getResultArray(),
			'tanggal' => date("Y-m-d"),
		];
		return view('view_front', $data);
	}

	public function paket()
	{
		$model = new PaketModel();
		date_default_timezone_set('Asia/Jakarta');
		$data = [
			'paket' => $model->getPaket()->getResultArray(),
			'tanggal' => date("Y-m-d"),
		];
		return view('view_front_paket', $data);
	}

	public function login()
	{
		return view('view_front_login');
	}

	public function register()
	{
		return view('view_front_register');
	}

	public function loginProcess()
	{
		$model = new FrontModel();
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		$peserta = $model->loginProcess($email);

		if ($peserta) {
			if (password_verify($password, $peserta['peserta_password'])) {
				session()->set('pesertaId', $peserta['peserta_id']);
				session()->set('pesertaNama', $peserta['peserta_nama']);
				session()->set('pesertaEmail', $peserta['peserta_email']);
				session()->setFlashdata('success', 'Berhasil login');
				return redirect()->to('/');
			} else {
				session()->setFlashdata('message', 'Password salah');
				return redirect()->to('/login');
			}
		} else {
			session()->setFlashdata('message', 'Email belum terdaftar');
			return redirect()->to('/login');
		}
	}

	public function registerProcess()
	{
		$model = new FrontModel();
		$email = $this->request->getPost('email');
		$peserta = $model->loginProcess($email);

		if ($peserta) {
			session()->setFlashdata('message', 'Email sudah ada');
			return redirect()->to('/register');
		} else {
			$data = array(
				'peserta_email' => $this->request->getPost('email'),
				'peserta_nama' => $this->request->getPost('name'),
				'peserta_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			);
			$model->registerProcess($data);
			session()->setFlashdata('success', 'Berhasil mendaftar, silahkan login');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		session()->remove('pesertaId');
		session()->remove('pesertaNama');
		session()->remove('pesertaEmail');
		session()->setFlashdata('success', 'Berhasil keluar');
		return redirect()->to('/');
	}

	public function contact()
	{
		return view('view_front_contact');
	}

	public function bookingList()
	{
		$id = session()->get('pesertaId');
		$model = new BookingModel();
		$data = [
			'booking' => $model->getBookingById($id)->getResultArray()
		];
		return view('view_front_booking', $data);
	}

	public function paymentList()
	{
		$id = session()->get('pesertaId');
		$model = new BookingModel();
		$data = [
			'booking' => $model->getBookingById($id)->getResultArray()
		];
		return view('view_front_payment', $data);
	}

	public function bookingDetail($id)
	{
		$model = new BookingModel();
		$data = [
			'booking' => $model->getDetailBooking($id)->getResultArray()
		];
		return view('view_front_booking_detail', $data);
	}

	public function bookingSave()
	{
		$model = new FrontModel();
		$generateRandom = rand(100, 999);
		$generateDate = date('Ymd');
		$generateInvoice = 'FP-' . $generateDate . "-" . $generateRandom;

		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			'booking_nomor' => $generateInvoice,
			'booking_tanggal' => date('Ymd'),
			'booking_peserta' => session()->get('pesertaId'),
			'booking_paket' => $this->request->getPost('idpaket'),
			'booking_status' => 0,
		);
		$model->bookingSave($data);
		return redirect()->to('/booking/' . $generateInvoice);
	}

	public function bookingEdit()
	{
		$tenorCicil = '';
		if ($this->request->getPost('metodepembayaran') == 0) {
			$tenorCicil = 1;
		} else {
			$tenorCicil = $this->request->getPost('tenor');
		}

		$model = new FrontModel();
		$nomor = $this->request->getPost('invoice');

		$data = array(
			'booking_jenis' => $this->request->getPost('exampleRadios'),
			'booking_jumlah' => $this->request->getPost('jumlah'),
			'booking_total' => $this->request->getPost('total'),
			'booking_status' => 1,
			'booking_metode' => $this->request->getPost('metodepembayaran'),
			'booking_tenor' => $tenorCicil
		);
		$model->bookingEdit($data, $nomor);
		session()->setFlashdata('success', 'Berhasil membuat order');
		return redirect()->to('/booking');
	}

	public function bookingDelete()
	{
		$model = new FrontModel();
		$id = $this->request->getPost('id');
		$model->bookingDelete($id);
		session()->setFlashdata('success', 'Berhasil menghapus transaksi');
		return redirect()->to('/booking');
	}

	public function pembayaranSave()
	{
		$fakturpemesanan = $this->request->getPost('fakturpemesanan');
		$status = $this->request->getPost('status');
		$fileGambar = $this->request->getFile('gambar');

		$fileName = $fileGambar->getRandomName();
		$fileGambar->move('upload/', $fileName);

		date_default_timezone_set('Asia/Jakarta');

		$model = new PembayaranModel();
		$data = array(
			'pembayaran_nomor' => $this->request->getPost('fakturpemesanan'),
			'pembayaran_tanggal' =>  date('Ymd'),
			'pembayaran_bukti' => $fileName,
			'pembayaran_bayar' => $status,
		);
		$model->savePembayaran($data);

		if ($status == 1) {
			$pemesananstatus = 3;
		} else {
			$pemesananstatus = 2;
		}
		$modelsatu = new BookingModel();
		$datadua = array(
			'booking_status' => $pemesananstatus,
		);
		$modelsatu->updateBooking($datadua, $fakturpemesanan);
		session()->setFlashdata('success', 'Berhasil membayar');
		return redirect()->to('payment');
	}

	public function pembayaranCicilan()
	{
		$fakturpemesanan = $this->request->getPost('fakturpemesanan');
		$status = $this->request->getPost('status');
		$fileGambar = $this->request->getFile('gambar');
		$idtenor = $this->request->getPost('idtenor');

		$fileName = $fileGambar->getRandomName();
		$fileGambar->move('upload/', $fileName);

		date_default_timezone_set('Asia/Jakarta');

		$model = new PembayaranModel();
		$data = array(
			'pembayaran_nomor' => $this->request->getPost('fakturpemesanan'),
			'pembayaran_tanggal' =>  date('Ymd'),
			'pembayaran_bukti' => $fileName,
			'pembayaran_bayar' => 2,
			'pembayaran_tenor' => $idtenor,
		);
		$model->savePembayaran($data);

		if ($status == 1) {
			$pemesananstatus = 3;
		} else {
			$pemesananstatus = 2;
		}
		$modelsatu = new BookingModel();
		$datadua = array(
			'booking_status' => $pemesananstatus,
		);
		$modelsatu->updateBooking($datadua, $fakturpemesanan);
		session()->setFlashdata('success', 'Berhasil membayar');
		return redirect()->to('payment');
	}

	public function faktur($id)
	{
		$model = new BookingModel();

		$data = [
			'booking' => $model->getDetailBooking($id)->getresultArray(),
			'nomorbooking' => $id
		];

		return view('report/report_faktur_booking', $data);
	}

	public function document($id, $urut)
	{
		$model = new BookingModel();

		$data = [
			'booking' => $model->getDetailBooking($id)->getresultArray(),
			'nomorbooking' => $id,
			'urut' => $urut,
		];

		return view('view_front_booking_document', $data);
	}

	public function documentedit($id, $urut)
	{
		$model = new BookingModel();

		$data = [
			'booking' => $model->getDocument($id, $urut)->getresultArray(),
			'nomorbooking' => $id,
			'urut' => $urut,
		];

		return view('view_front_booking_document_edit', $data);
	}

	public function documentSave()
	{
		$id = $this->request->getPost('idtransaksi');
		$urut = $this->request->getPost('urut');
		$peserta = session()->get('pesertaId');
		$fileKtp = $this->request->getFile('fotoktp');
		$filePasspor = $this->request->getFile('fotopassport');

		$fileNameKtp = $fileKtp->getRandomName();
		$fileKtp->move('document/', $fileNameKtp);

		$fileNamePasspor = $filePasspor->getRandomName();
		$filePasspor->move('document/', $fileNamePasspor);

		$model = new DocumentModel();
		$data = array(
			'document_nik' => $this->request->getPost('nik'),
			'document_nama' => $this->request->getPost('nama'),
			'document_booking' => $id,
			'document_alamat' =>  $this->request->getPost('alamat'),
			'document_tempat_lahir' => $this->request->getPost('tempat'),
			'document_tgl_lahir' => $this->request->getPost('tgllahir'),
			'document_notelp' => $this->request->getPost('notelp'),
			'document_kelamin' => $this->request->getPost('jenkel'),
			'document_no_paspor' => $this->request->getPost('passport'),
			'document_tgl_berlaku' => $this->request->getPost('tglpassport'),
			'document_foto_ktp' => $fileNameKtp,
			'document_foto_paspor' => $fileNamePasspor,
			'document_peserta' => $urut,
		);
		$model->saveDocument($data);

		$modeldua = new BookingModel();
		$datadua = array(
			'booking_document' => 1
		);
		$modeldua->updateBooking($datadua, $id);

		session()->setFlashdata('success', 'Berhasil input dokumen');
		return redirect()->to('booking');
	}

	public function documentEditProcess()
	{
		$id = $this->request->getPost('idtransaksi');
		$iddocument = $this->request->getPost('iddocument');
		$urut = $this->request->getPost('urut');

		$fileKtp = $this->request->getFile('fotoktp');
		$filePasspor = $this->request->getFile('fotopassport');

		if ($fileKtp->getError() == 4) {
			$fileNameKtp =  $this->request->getPost('ktplama');
		} else {
			$fileNameKtp = $fileKtp->getRandomName();
			$fileKtp->move('document/', $fileNameKtp);
		};

		if ($filePasspor->getError() == 4) {
			$fileNamePasspor =  $this->request->getPost('pasporlama');
		} else {
			$fileNamePasspor = $filePasspor->getRandomName();
			$filePasspor->move('document/', $fileNamePasspor);
		};

		$model = new DocumentModel();
		$data = array(
			'document_nik' => $this->request->getPost('nik'),
			'document_nama' => $this->request->getPost('nama'),
			'document_alamat' =>  $this->request->getPost('alamat'),
			'document_tempat_lahir' => $this->request->getPost('tempat'),
			'document_tgl_lahir' => $this->request->getPost('tgllahir'),
			'document_notelp' => $this->request->getPost('notelp'),
			'document_kelamin' => $this->request->getPost('jenkel'),
			'document_no_paspor' => $this->request->getPost('passport'),
			'document_tgl_berlaku' => $this->request->getPost('tglpassport'),
			'document_foto_ktp' => $fileNameKtp,
			'document_foto_paspor' => $fileNamePasspor,
		);
		$model->updateDocument($data, $iddocument);

		session()->setFlashdata('success', 'Berhasil update dokumen');
		return redirect()->to('booking');
	}

	public function about()
	{
		return view('view_front_about');
	}

	public function contactSave()
	{
		$model = new ContactModel();
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			'contact_nama' => $this->request->getPost('name'),
			'contact_email' => $this->request->getPost('email'),
			'contact_subject' => $this->request->getPost('subject'),
			'contact_phone_number' => $this->request->getPost('phone'),
			'contact_message' => $this->request->getPost('message'),
			'contact_created' => date("Y-m-d H:i:s"),
			'contact_status' => 0,
		);
		$model->saveContact($data);
		session()->setFlashdata('success', 'Berhasil membuat pesan! Silahkan tunggu pesan dibalas melalui email');
		return redirect()->to('/');
	}
}
