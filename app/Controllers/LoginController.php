<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('userId')) {
            return redirect()->to(base_url('/admin'));
        }
        echo view('view_login');
    }

    public function ceklogin()
    {
        $model = new LoginModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->cekLogin($email);

        if ($user) {
            if (password_verify($password, $user['user_password'])) {
                session()->set('userId', $user['user_id']);
                session()->set('userNama', $user['user_name']);
                session()->set('userEmail', $user['user_email']);
                session()->set('userLevel', $user['user_level']);
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('message', 'Password salah');
                return redirect()->to('admin/login');
            }
        } else {
            session()->setFlashdata('message', 'Email belum terdaftar');
            return redirect()->to('admin/login');
        }
    }

    public function logout()
    {
        session()->remove('userId');
        session()->remove('userNama');
        session()->remove('userEmail');
        session()->remove('userLevel');
        session()->setFlashdata('success', 'Berhasil keluar');
        return redirect()->to('admin/login');
    }
}
