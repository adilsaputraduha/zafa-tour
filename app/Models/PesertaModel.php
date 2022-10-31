<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    public function getPeserta()
    {
        $bulder = $this->db->table('tb_peserta');
        return $bulder->get();
    }
    public function savePeserta($data)
    {
        $query = $this->db->table('tb_peserta')->insert($data);
        return $query;
    }
    public function updatePeserta($data, $id)
    {
        $query = $this->db->table('tb_peserta')->update($data, array('peserta_id' => $id));
        return $query;
    }
    public function deletePeserta($id)
    {
        $query = $this->db->table('tb_peserta')->delete(array('peserta_id' => $id));
        return $query;
    }
}
