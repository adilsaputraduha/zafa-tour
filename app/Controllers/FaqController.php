<?php

namespace App\Controllers;

use App\Models\FaqModel;
use App\Models\TestimonialModel;

class FaqController extends BaseController
{
    public function index()
    {
        $model = new FaqModel();
        $data = [
            'faq' => $model->getFaq()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_faq', $data);
    }

    public function save()
    {
        $model = new FaqModel();
        $data = array(
            'faq_title' => $this->request->getPost('title'),
            'faq_description' => $this->request->getPost('description'),
        );
        $model->saveFaq($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/faq');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new FaqModel();
        $data = array(
            'faq_title' => $this->request->getPost('title'),
            'faq_description' => $this->request->getPost('description'),
        );
        $model->updateFaq($data, $id);
        session()->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/admin/faq');
    }

    public function delete()
    {
        $model = new FaqModel();
        $id = $this->request->getPost('id');
        $model->deleteFaq($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/admin/faq');
    }
}
