<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    public function getFasilitas()
    {
        $bulder = $this->db->table('tb_fasilitas');
        return $bulder->get();
    }
    public function saveFasilitas($data)
    {
        $query = $this->db->table('tb_fasilitas')->insert($data);
        return $query;
    }
    public function updateFasilitas($data, $id)
    {
        $query = $this->db->table('tb_fasilitas')->update($data, array('fasilitas_id' => $id));
        return $query;
    }
    public function deleteFasilitas($id)
    {
        $query = $this->db->table('tb_fasilitas')->delete(array('fasilitas_id' => $id));
        return $query;
    }
    public function getDataDetail($id)
    {
        $bulder = $this->db->table('tb_detail_fasilitas')
            ->join('tb_fasilitas', 'tb_detail_fasilitas.detail_fasilitas = tb_fasilitas.fasilitas_id')
            ->where(['detail_paket' => $id]);
        return $bulder->get();
    }
    public function saveDetail($data)
    {
        $query = $this->db->table('tb_detail_fasilitas')->insert($data);
        return $query;
    }
    public function deleteDetail($id)
    {
        $query = $this->db->table('tb_detail_fasilitas')->delete(array('detail_id' => $id));
        return $query;
    }
}
