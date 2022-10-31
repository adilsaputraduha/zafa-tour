<?php

namespace App\Controllers;

use App\Models\PersyaratanModel;

class PersyaratanController extends BaseController
{
    public function index()
    {
        $model = new PersyaratanModel();
        $data = [
            'syarat' => $model->getSyarat()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_syarat', $data);
    }

    public function save()
    {
        $model = new PersyaratanModel();
        $data = array(
            'syarat_nama' => $this->request->getPost('nama'),
        );
        $model->saveSyarat($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/persyaratan');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new PersyaratanModel();
        $data = array(
            'syarat_nama' => $this->request->getPost('nama'),
        );
        $model->updateSyarat($data, $id);
        session()->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/admin/persyaratan');
    }

    public function report()
    {
        $model = new PersyaratanModel();
        $data['syarat'] = $model->getSyarat()->getResultArray();
        echo view('report/report_syarat', $data);
    }
}
