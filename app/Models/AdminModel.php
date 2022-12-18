<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function getAdmin()
    {
        $bulder = $this->db->table('tb_admin');
        return $bulder->get();
    }
    public function saveAdmin($data)
    {
        $query = $this->db->table('tb_admin')->insert($data);
        return $query;
    }
    public function updateAdmin($data, $id)
    {
        $query = $this->db->table('tb_admin')->update($data, array('admin_id' => $id));
        return $query;
    }
    public function deleteAdmin($id)
    {
        $query = $this->db->table('tb_admin')->delete(array('admin_id' => $id));
        return $query;
    }
}
