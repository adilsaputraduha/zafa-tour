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
        $model = new BookingModel();
        $nomor = $this->request->getPost('id');
        $idpembayaran = $this->request->getPost('idpembayaran');
        $verif = $this->request->getPost('verif');

        $status = '';
        if ($verif == 1) {
            $status = 3;
        } else {
            $status = 1;
        }
        $data = array(
            'booking_status' => $status,
            'booking_isverif' => $verif,
        );
        $model->updateBooking($data, $nomor);

        $modeldua = new PembayaranModel();
        $datadua = array(
            'pembayaran_isverif' => $verif,
        );
        $modeldua->updatePembayaran($datadua, $idpembayaran);

        session()->setFlashdata('success', 'Berhasil mengubah verifikasi');
        return redirect()->to('/admin/pembayaran');
    }

    public function verifCicilan()
    {
        $model = new BookingModel();
        $nomor = $this->request->getPost('id');
        $idpembayaran = $this->request->getPost('idpembayaran');
        $verif = $this->request->getPost('verif');

        $status = '';
        if ($verif == 1) {
            $status = 7;
        } else {
            $status = 1;
        }
        $data = array(
            'booking_status' => $status,
            'booking_isverif' => $verif,
        );
        $model->updateBooking($data, $nomor);

        $modeldua = new PembayaranModel();
        $datadua = array(
            'pembayaran_isverif' => $verif,
        );
        $modeldua->updatePembayaran($datadua, $idpembayaran);

        session()->setFlashdata('success', 'Berhasil mengubah verifikasi');
        return redirect()->to('/admin/pembayaran');
    }
}
