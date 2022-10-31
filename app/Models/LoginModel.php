<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function cekLogin($email)
    {
        return $this->db->table('tb_user')
            ->where(array('user_email' => $email))
            ->get()->getRowArray();
    }
}
