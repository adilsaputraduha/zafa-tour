<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    public function getFaq()
    {
        $bulder = $this->db->table('tb_faq');
        return $bulder->get();
    }
    public function saveFaq($data)
    {
        $query = $this->db->table('tb_faq')->insert($data);
        return $query;
    }
    public function updateFaq($data, $id)
    {
        $query = $this->db->table('tb_faq')->update($data, array('faq_id' => $id));
        return $query;
    }
    public function deleteFaq($id)
    {
        $query = $this->db->table('tb_faq')->delete(array('faq_id' => $id));
        return $query;
    }
}
