<?php

namespace App\Controllers;

use App\Models\BookingModel;

class BookingController extends BaseController
{
    public function index()
    {
        $model = new BookingModel();
        $data = [
            'booking' => $model->getBooking()->getResultArray(),
        ];
        echo view('view_booking', $data);
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

    public function status()
    {
        $model = new BookingModel();
        $nomor = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $data = array(
            'booking_status' => $status,
        );
        $model->updateBooking($data, $nomor);
        session()->setFlashdata('success', 'Berhasil mengubah status');
        return redirect()->to('/admin/booking');
    }

    public function document($nomor, $id)
    {
        $model = new BookingModel();
        $data['jamaah'] = $model->getDocument($nomor, $id)->getResultArray();
        echo view('report/report_document', $data);
    }
}
