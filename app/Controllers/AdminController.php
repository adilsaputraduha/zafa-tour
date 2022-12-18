<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        $model = new AdminModel();
        $data = [
            'admin' => $model->getAdmin()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_admin', $data);
    }

    public function save()
    {
        $rules = [
            'email' => [
                'rules' => 'required|max_length[100]|is_unique[tb_admin.admin_email]',
                'errors' => [
                    'is_unique' => 'Email sudah ada',
                    'required' => 'Email harus diisi',
                    'max_length' => 'Kolom email tidak boleh lebih dari 100 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'max_length' => 'Kolom password tidak boleh lebih dari 100 karakter',
                    'min_length' => 'Kolom password setidaknya terdiri dari 4 karakter'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = array(
                'admin_email' => $this->request->getPost('email'),
                'admin_name' => $this->request->getPost('nama'),
                'admin_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'admin_level' => $this->request->getPost('level')
            );
            $model->saveAdmin($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('admin/admin');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/admin')->withInput()->with('validation', $validation);
        }
    }

    public function edit()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ]
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = array(
                'admin_name' => $this->request->getPost('nama'),
                'admin_level' => $this->request->getPost('level')
            );
            $model->updateAdmin($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/admin/admin');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/admin' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new AdminModel();
        $id = $this->request->getPost('id');
        $model->deleteAdmin($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/admin');
    }

    public function report()
    {
        $model = new AdminModel();
        $data['admin'] = $model->getAdmin()->getResultArray();
        echo view('report/report_admin', $data);
    }
}
