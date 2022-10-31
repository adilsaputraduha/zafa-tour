<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    public function getPaket()
    {
        $bulder = $this->db->table('tb_paket')
            ->where(['paket_kuota >' => '0']);
        return $bulder->get();
    }
    public function savePaket($data)
    {
        $query = $this->db->table('tb_paket')->insert($data);
        return $query;
    }
    public function updatePaket($data, $id)
    {
        $query = $this->db->table('tb_paket')->update($data, array('paket_id' => $id));
        return $query;
    }
    public function deletePaket($id)
    {
        $query = $this->db->table('tb_paket')->delete(array('paket_id' => $id));
        return $query;
    }
}
