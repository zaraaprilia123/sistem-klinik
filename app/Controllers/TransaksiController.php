<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Transaksi;

class TransaksiController extends BaseController
{
    public function index()
    {
        $transaksi = new Transaksi();

        $data = array(
            'title'  => 'Data transaksi',
            'data_transaksi' => $transaksi->getAllData(),
        );

        return view('dokter/transaksi/list', $data);
    }

    public function add()
    {
        $transaksi = new Transaksi();

        $data = array(
            'title'  => 'Creat Data transaksi',

        );

        return view('dokter/transaksi/add', $data);
    }
}
