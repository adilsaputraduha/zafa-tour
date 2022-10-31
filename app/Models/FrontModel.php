<?php

namespace App\Models;

use CodeIgniter\Model;

class FrontModel extends Model
{
    public function loginProcess($email)
    {
        return $this->db->table('tb_peserta')
            ->where(array('peserta_email' => $email))
            ->get()->getRowArray();
    }
    public function registerProcess($data)
    {
        $query = $this->db->table('tb_peserta')->insert($data);
        return $query;
    }
    public function bookingSave($data)
    {
        $query = $this->db->table('tb_booking')->insert($data);
        return $query;
    }
    public function bookingEdit($data, $id)
    {
        $query = $this->db->table('tb_booking')->update($data, array('booking_nomor' => $id));
        return $query;
    }
}
