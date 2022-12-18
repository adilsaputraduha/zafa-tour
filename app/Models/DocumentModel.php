<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    public function getDocument()
    {
        $bulder = $this->db->table('tb_document');
        return $bulder->get();
    }
    public function saveDocument($data)
    {
        $query = $this->db->table('tb_document')->insert($data);
        return $query;
    }
    public function updateDocument($data, $id)
    {
        $query = $this->db->table('tb_document')->update($data, array('document_id' => $id));
        return $query;
    }
    public function deleteDocument($id)
    {
        $query = $this->db->table('tb_document')->delete(array('document_id' => $id));
        return $query;
    }
    public function updateDocumentBooking($data, $id, $idnota)
    {
        $query = $this->db->table('tb_document')->update($data, array('document_id' => $id, 'document_booking' => $idnota));
        return $query;
    }
}
