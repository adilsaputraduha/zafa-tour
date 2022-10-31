<?php

namespace App\Models;

use CodeIgniter\Model;

class PersyaratanModel extends Model
{
    public function getSyarat()
    {
        $bulder = $this->db->table('tb_syarat');
        return $bulder->get();
    }
    public function saveSyarat($data)
    {
        $query = $this->db->table('tb_syarat')->insert($data);
        return $query;
    }
    public function updateSyarat($data, $id)
    {
        $query = $this->db->table('tb_syarat')->update($data, array('syarat_id' => $id));
        return $query;
    }
    public function deleteSyarat($id)
    {
        $query = $this->db->table('tb_syarat')->delete(array('syarat_id' => $id));
        return $query;
    }
    public function getDataDetail($id)
    {
        $bulder = $this->db->table('tb_detail_syarat')
            ->join('tb_syarat', 'tb_detail_syarat.detail_syarat = tb_syarat.syarat_id')
            ->where(['detail_paket' => $id]);
        return $bulder->get();
    }
    public function saveDetail($data)
    {
        $query = $this->db->table('tb_detail_syarat')->insert($data);
        return $query;
    }
    public function deleteDetail($id)
    {
        $query = $this->db->table('tb_detail_syarat')->delete(array('detail_id' => $id));
        return $query;
    }
}
