<?php

namespace App\Controllers;

use App\Models\FasilitasModel;

class FasilitasController extends BaseController
{
    public function index()
    {
        $model = new FasilitasModel();
        $data = [
            'fasilitas' => $model->getFasilitas()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_fasilitas', $data);
    }

    public function save()
    {
        $model = new FasilitasModel();
        $data = array(
            'fasilitas_nama' => $this->request->getPost('nama'),
        );
        $model->saveFasilitas($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/fasilitas');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new FasilitasModel();
        $data = array(
            'fasilitas_nama' => $this->request->getPost('nama'),
        );
        $model->updateFasilitas($data, $id);
        session()->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/admin/fasilitas');
    }

    public function report()
    {
        $model = new FasilitasModel();
        $data['fasilitas'] = $model->getFasilitas()->getResultArray();
        echo view('report/report_fasilitas', $data);
    }
}
