<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    public function getPembayaran()
    {
        $bulder = $this->db->table('tb_pembayaran')
            ->join('tb_booking', 'pembayaran_nomor = booking_nomor')
            ->join('tb_peserta', 'booking_peserta = peserta_id')
            ->join('tb_paket', 'booking_paket = paket_id');
        return $bulder->get();
    }
    public function savePembayaran($data)
    {
        $query = $this->db->table('tb_pembayaran')->insert($data);
        return $query;
    }
    public function updatePembayaran($data, $id)
    {
        $query = $this->db->table('tb_pembayaran')->update($data, array('pembayaran_id' => $id));
        return $query;
    }
    public function deletePembayaran($id)
    {
        $query = $this->db->table('tb_pembayaran')->delete(array('pembayaran_id' => $id));
        return $query;
    }
}
