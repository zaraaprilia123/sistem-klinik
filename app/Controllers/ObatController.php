<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Obat;

class ObatController extends BaseController
{
    public function index()
    {
        $obat = new Obat();

        $data = array(
            'title'  => 'Data obat',
            'data_obat' => $obat->findAll(),
        );

        return view('admin/obat/list', $data);
    }

    public function store()
    {
        $obat = new Obat();
        $obat->insert([
            'nama_obat'  => $this->request->getVar('nama_obat'),
            'harga'      => $this->request->getVar('harga'),
            'stok'      => $this->request->getVar('stok'),
            'deskripsi'       => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to('/obat');
    }

    public function edit($id)
    {
        $obats = new Obat();
        $data['obat'] = $obats->where('id', $id)->first();
        $obats->update($id, [
            'nama_obat'  => $this->request->getVar('nama_obat'),
            'harga'      => $this->request->getVar('harga'),
            'stok'      => $this->request->getVar('stok'),
            'deskripsi'       => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/obat');
    }


    public function destroy($id)
    {
        $obat = new Obat();
        $obat->delete($id);

        session()->setFlashdata('success', 'Data Berhasil dihapus');
        return redirect()->to('/obat');
    }
}
