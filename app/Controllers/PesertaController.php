<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\UserModel;

class PesertaController extends BaseController
{
    public function index()
    {
        $model = new PesertaModel();
        $data = [
            'peserta' => $model->getPeserta()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_peserta', $data);
    }

    public function save()
    {
        $model = new PesertaModel();
        $data = array(
            'peserta_nama' => $this->request->getPost('nama'),
            'peserta_email' => $this->request->getPost('email'),
            'peserta_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        );
        $model->savePeserta($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/peserta');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new PesertaModel();
        $data = array(
            'peserta_nama' => $this->request->getPost('nama'),
        );
        $model->updatePeserta($data, $id);
        session()->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/admin/peserta');
    }

    public function delete()
    {
        $model = new PesertaModel();
        $id = $this->request->getPost('id');
        $model->deletePeserta($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/admin/peserta');
    }

    public function report()
    {
        $model = new PesertaModel();
        $data['peserta'] = $model->getPeserta()->getResultArray();
        echo view('report/report_peserta', $data);
    }

    public function reset()
    {
        $id = $this->request->getPost('id');

        $model = new PesertaModel();
        $data = array(
            'peserta_password' => password_hash('1234', PASSWORD_DEFAULT),
        );
        $model->updatePeserta($data, $id);
        session()->setFlashdata('success', 'Berhasil reset password');
        return redirect()->to('/admin/peserta');
    }
}
