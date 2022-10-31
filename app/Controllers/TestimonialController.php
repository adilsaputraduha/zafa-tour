<?php

namespace App\Controllers;

use App\Models\TestimonialModel;

class TestimonialController extends BaseController
{
    public function index()
    {
        $model = new TestimonialModel();
        $data = [
            'testi' => $model->getTestimonial()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_testimonial', $data);
    }

    public function save()
    {
        $model = new TestimonialModel();
        $data = array(
            'testi_name' => $this->request->getPost('name'),
            'testi_jobs' => $this->request->getPost('jobs'),
            'testi_title' => $this->request->getPost('title'),
            'testi_message' => $this->request->getPost('message'),
            'testi_star' => $this->request->getPost('star'),
        );
        $model->saveTestimonial($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/testimonial');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new TestimonialModel();
        $data = array(
            'testi_name' => $this->request->getPost('name'),
            'testi_jobs' => $this->request->getPost('jobs'),
            'testi_title' => $this->request->getPost('title'),
            'testi_message' => $this->request->getPost('message'),
            'testi_star' => $this->request->getPost('star'),
        );
        $model->updateTestimonial($data, $id);
        session()->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/admin/testimonial');
    }

    public function delete()
    {
        $model = new TestimonialModel();
        $id = $this->request->getPost('id');
        $model->deleteTestimonial($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/admin/testimonial');
    }
}
