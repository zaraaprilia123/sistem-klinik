<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $table = "tbl_transaksi";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['no_transaksi', 'id_customer', 'id_pendaftaran', 'tgl_transaksi', 'biaya pengobatan', 'status_transaksi', 'total_biaya'];

    public function getAllData()
    {
        $db = \Config\DataBase::connect();

        $builder = $db->table('tbl_transaksi');
        $builder->select('tbl_transaksi.*, tbl_user.nama_user');
        $builder->join('tbl_user', 'tbl_user.id = tbl_transaksi.id_customer');
        $builder->orderBy('tbl_transaksi.id', 'DESC');
        $query = $builder->get();

        return $query->getResult();
    }

    // public function getNoTransaksi()
    // {
    //     $db = \Config\DataBase::connect();

    //     $builder = $db->table('tbl_transaksi');
    //     $builder->select('RIGHT(tbl_transaksi.no_transaksi,3) as no_transaksi', FALSE);
    //     $builder->orderBy('no_transaksi', 'DESC');
    //     $builder->limit(1);
    //     $query = $builder->get();

    //     if ($query->getFieldCount() <> 0) {
    //         $data = $query->getRow();
    //         $kode = intval($data->no_transaksi) + 1;
    //     } else {
    //         $kode = 1;
    //     }
    //     $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
    //     $kodetampil = "NT-" . $batas;
    //     return $kodetampil;
    // }
}
