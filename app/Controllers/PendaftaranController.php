<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Pendaftaran;

class PendaftaranController extends BaseController
{
    public function index()
    {
        $pendaftaran = new Pendaftaran();

        $data = array(
            'title'  => 'Data pendaftaran',
            'data_pendaftaran' => $pendaftaran->getAllData(),
        );

        return view('customer/pendaftaran/list', $data);
    }

    public function kasir()
    {
        $pendaftaran = new Pendaftaran();

        $data = array(
            'title'  => 'Data pendaftaran',
            'data_pendaftaran' => $pendaftaran->getAllData(),
        );

        return view('kasir/pendaftaran/list', $data);
    }

    public function add()
    {
        $pendaftaran = new Pendaftaran();

        $data = array(
            'title'  => 'Create Data pendaftaran',
            'no_pendaftaran' => $pendaftaran->getNoPendaftaran(),

        );

        return view('customer/pendaftaran/add', $data);
    }

    public function store()
    {
        $pendaftaran = new Pendaftaran();
        $pendaftaran->insert([
            'no_pendaftaran'    => $this->request->getVar('no_pendaftaran'),
            'id_customer'       => $this->request->getVar('id_customer'),
            'tgl_pendaftaran'   => $this->request->getVar('tgl_pendaftaran'),
            'keluhan'           => $this->request->getVar('keluhan'),
            'status_pendaftaran' => $this->request->getVar('status_pendaftaran'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/pendaftaran');
    }

    public function proses($id)
    {
        $pendaftarans = new Pendaftaran();
        $data['pendaftaran'] = $pendaftarans->where('id', $id)->first();
        $pendaftarans->update($id, [
            'status_pendaftaran'  => 'proses',

        ]);
        session()->setFlashdata('success', 'Data Berhasil Diproses');
        return redirect()->to('/pendaftaran/kasir');
    }

    public function tolak($id)
    {
        $pendaftarans = new Pendaftaran();
        $data['pendaftaran'] = $pendaftarans->where('id', $id)->first();
        $pendaftarans->update($id, [
            'status_pendaftaran'  => 'dibatalkan',

        ]);
        session()->setFlashdata('success', 'Data Berhasil Dibatalkan');
        return redirect()->to('/pendaftaran/kasir');
    }
}
