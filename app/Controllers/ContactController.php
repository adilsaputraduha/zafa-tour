<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends BaseController
{
    public function index()
    {
        $model = new ContactModel();
        $data = [
            'contact' => $model->getContact()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_contact', $data);
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $model = new ContactModel();
        $data = array(
            'contact_status' => 1,
        );
        $model->updateContact($data, $id);
        session()->setFlashdata('success', 'Berhasil membaca pesan');
        return redirect()->to('/admin/contact');
    }
}
