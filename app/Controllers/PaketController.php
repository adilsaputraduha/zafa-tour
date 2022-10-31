<?php

namespace App\Controllers;

use App\Models\FasilitasModel;
use App\Models\PaketModel;
use App\Models\PersyaratanModel;
use App\Models\PesertaModel;
use App\Models\UserModel;

class PaketController extends BaseController
{
    public function index()
    {
        $model = new PaketModel();
        $data = [
            'paket' => $model->getPaket()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_paket', $data);
    }

    public function tambah()
    {
        $generateRandom = rand(100, 999);

        $modelsatu = new FasilitasModel();
        $modeldua = new PersyaratanModel();
        $data = [
            'fasilitas' => $modelsatu->getFasilitas()->getResultArray(),
            'syarat' => $modeldua->getSyarat()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'random' => $generateRandom
        ];
        echo view('view_paket_tambah', $data);
    }

    public function save()
    {
        $model = new PaketModel();
        $data = array(
            'paket_nama' => $this->request->getPost('nama'),
            'paket_harga' => $this->request->getPost('harga'),
            'paket_deskripsi' => $this->request->getPost('deskripsi'),
            'paket_tgl_mulai' => $this->request->getPost('tglmulai'),
            'paket_tgl_selesai' => $this->request->getPost('tglselesai'),
            'paket_kuota' => $this->request->getPost('kuota'),
            'paket_session' => $this->request->getPost('random'),
        );
        $model->savePaket($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/paket');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new PaketModel();
        $data = array(
            'paket_nama' => $this->request->getPost('nama'),
            'paket_harga' => $this->request->getPost('harga'),
            'paket_deskripsi' => $this->request->getPost('deskripsi'),
            'paket_tgl_mulai' => $this->request->getPost('tglmulai'),
            'paket_tgl_selesai' => $this->request->getPost('tglselesai'),
            'paket_kuota' => $this->request->getPost('kuota')
        );
        $model->updatePaket($data, $id);
        session()->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/admin/paket');
    }

    public function delete()
    {
        $model = new PaketModel();
        $id = $this->request->getPost('id');
        $model->deletePaket($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/admin/paket');
    }

    public function report()
    {
        $model = new PaketModel();
        $data['paket'] = $model->getPaket()->getResultArray();
        echo view('report/report_paket', $data);
    }

    public function detailindexfasilitas()
    {
        $id = $this->request->getPost('random');

        $model = new FasilitasModel();
        $data = [
            'detailfasilitas' => $model->getDataDetail($id)->getResultArray(),
        ];
        echo view('table_fasilitas', $data);
    }

    public function detailindexsyarat()
    {
        $id = $this->request->getPost('random');

        $model = new PersyaratanModel();
        $data = [
            'detailsyarat' => $model->getDataDetail($id)->getResultArray(),
        ];
        echo view('table_syarat', $data);
    }

    public function detailsavefasilitas()
    {
        $model = new FasilitasModel();
        $data = array(
            'detail_paket' => $this->request->getPost('random'),
            'detail_fasilitas' => $this->request->getPost('idfasilitas'),
        );
        $model->saveDetail($data);
    }

    public function detailsavesyarat()
    {
        $model = new PersyaratanModel();
        $data = array(
            'detail_paket' => $this->request->getPost('random'),
            'detail_syarat' => $this->request->getPost('idsyarat'),
        );
        $model->saveDetail($data);
    }

    public function detaildeletefasilitas()
    {
        $model = new FasilitasModel();
        $id = $this->request->getPost('detailid');
        $model->deleteDetail($id);
    }

    public function detaildeletesyarat()
    {
        $model = new PersyaratanModel();
        $id = $this->request->getPost('detailid');
        $model->deleteDetail($id);
    }
}
