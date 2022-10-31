<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    public function getTestimonial()
    {
        $bulder = $this->db->table('tb_testimonial');
        return $bulder->get();
    }
    public function saveTestimonial($data)
    {
        $query = $this->db->table('tb_testimonial')->insert($data);
        return $query;
    }
    public function updateTestimonial($data, $id)
    {
        $query = $this->db->table('tb_testimonial')->update($data, array('testi_id' => $id));
        return $query;
    }
    public function deleteTestimonial($id)
    {
        $query = $this->db->table('tb_testimonial')->delete(array('testi_id' => $id));
        return $query;
    }
    public function getTestimonialLimit3()
    {
        $bulder = $this->db->table('tb_testimonial')
            ->limit(3);
        return $bulder->get();
    }
}
