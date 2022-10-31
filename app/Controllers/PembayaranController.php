<?php

namespace App\Controllers;

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
}
