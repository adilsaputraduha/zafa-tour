<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    public function getContact()
    {
        $bulder = $this->db->table('tb_contact');
        return $bulder->get();
    }
    public function saveContact($data)
    {
        $query = $this->db->table('tb_contact')->insert($data);
        return $query;
    }
    public function updateContact($data, $id)
    {
        $query = $this->db->table('tb_contact')->update($data, array('contact_id' => $id));
        return $query;
    }
}
