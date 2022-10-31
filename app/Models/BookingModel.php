<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    public function getBooking()
    {
        $bulder = $this->db->table('tb_booking')
            ->join('tb_peserta', 'booking_peserta = peserta_id')
            ->join('tb_paket', 'booking_paket = paket_id')
            ->where(['booking_status >' => '0']);
        return $bulder->get();
    }
    public function getDetailBooking($id)
    {
        $bulder = $this->db->table('tb_booking')
            ->join('tb_peserta', 'peserta_id = booking_peserta')
            ->join('tb_paket', 'paket_id = booking_paket')
            ->where(['booking_nomor' => $id]);
        return $bulder->get();
    }
    public function getBookingById($id)
    {
        $bulder = $this->db->table('tb_booking')
            ->join('tb_peserta', 'peserta_id = booking_peserta')
            ->join('tb_paket', 'paket_id = booking_paket')
            ->where(['peserta_id' => $id])
            ->where(['booking_status >' => '0']);
        return $bulder->get();
    }
    public function saveBooking($data)
    {
        $query = $this->db->table('tb_booking')->insert($data);
        return $query;
    }
    public function updateBooking($data, $id)
    {
        $query = $this->db->table('tb_booking')->update($data, array('booking_nomor' => $id));
        return $query;
    }
    public function getDocument($nomor, $id)
    {
        $bulder = $this->db->table('tb_document')
            ->where(['document_booking' => $nomor])
            ->where(['document_peserta' => $id]);
        return $bulder->get();
    }
}
