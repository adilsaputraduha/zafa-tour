<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PembayaranModel;

class PembayaranController extends BaseController
{
    public function index()
    {
        $model = new PembayaranModel();
        $data = [
            'pembayaran' => $model->getPembayaran()->getResultArray(),
        ];
        echo view('view_pembayaran', $data);
    }

    public function verif()
    {
        $nomor = $this->request->getPost('id');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_pembayaran WHERE pembayaran_nomor = '$nomor' AND pembayaran_bayar = 0");

        $dataPembayaran =  $query->getResultArray();

        $pembayaranfromdp = '';
        if ($dataPembayaran == null) {
            $pembayaranfromdp = 0;
        } else {
            $pembayaranfromdp = 1;
        }

        $model = new BookingModel();
        $idpembayaran = $this->request->getPost('idpembayaran');
        $verif = $this->request->getPost('verif');
        $dporlunas = $this->request->getPost('dporlunas');

        $status = '';
        if ($verif == 1 && $dporlunas == 0) {
            $status = 3;
        } else if ($verif == 1 && $dporlunas == 1) {
            $status = 9;
        } else if ($verif == 2 && $dporlunas == 0) {
            $status = 1;
        } else if ($verif == 2 && $dporlunas == 1 && $pembayaranfromdp == 1) {
            $status = 3;
        } else {
            $status = 1;
        }
        $data = array(
            'booking_status' => $status,
            'booking_isverif' => $verif,
        );
        $model->updateBooking($data, $nomor);

        if ($verif == 1) {
            $modeldua = new PembayaranModel();
            $datadua = array(
                'pembayaran_isverif' => 1,
            );
            $modeldua->updatePembayaran($datadua, $idpembayaran);
        } else {
            $modeldua = new PembayaranModel();
            $modeldua->deletePembayaran($idpembayaran);
        }

        session()->setFlashdata('success', 'Berhasil mengubah verifikasi');
        return redirect()->to('/admin/pembayaran');
    }

    public function verifCicilan()
    {
        $nomor = $this->request->getPost('id');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_booking WHERE booking_nomor = '$nomor'");

        $dataPembayaran =  $query->getResultArray();

        $model = new BookingModel();
        $idpembayaran = $this->request->getPost('idpembayaran');
        $verif = $this->request->getPost('verif');
        $idtenor = $this->request->getPost('idtenor');
        $dataPembayaran[0]['booking_tenor'];

        $status = '';
        $cicilanke = '';
        if ($verif == 1 && $idtenor == $dataPembayaran[0]['booking_tenor']) {
            $status = 9;
            $cicilanke = $idtenor;
        } else if ($verif == 1 && $idtenor != $dataPembayaran[0]['booking_tenor']) {
            $status = 7;
            $cicilanke = $idtenor + 1;
        } else if ($verif == 2 && $idtenor == 1) {
            $status = 1;
            $cicilanke = $idtenor;
        } else {
            $status = 7;
            $cicilanke = $idtenor;
        }

        $data = array(
            'booking_status' => $status,
            'booking_isverif' => $verif,
            'booking_cicilanke' => $cicilanke,
        );
        $model->updateBooking($data, $nomor);

        if ($verif == 1) {
            $modeldua = new PembayaranModel();
            $datadua = array(
                'pembayaran_isverif' => $verif,
            );
            $modeldua->updatePembayaran($datadua, $idpembayaran);
        } else {
            $modeldua = new PembayaranModel();
            $modeldua->deletePembayaran($idpembayaran);
        }

        session()->setFlashdata('success', 'Berhasil mengubah verifikasi');
        return redirect()->to('/admin/pembayaran');
    }
}
