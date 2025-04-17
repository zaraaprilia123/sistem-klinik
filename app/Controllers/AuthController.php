<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/home'));
        }

        $data = array(
            'title' => 'Login Page',
        );
        return view('index', $data);
    }

    public function cek_login()
    {
        $users      = new User();
        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');
        $dataUser   = $users->where([
            'username'  => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'id'  => $dataUser->id,
                    'username'  => $dataUser->username,
                    'nama_user'  => $dataUser->nama_user,
                    'role'  => $dataUser->role,
                    'logged_in'  => TRUE
                ]);
                session()->setFlashdata('success', 'login berhasil');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', ' username & password salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', ' username & password salah');
            return redirect()->back();
        }
    }

    public function register()
    {
        $data = array(
            'title' => 'Login Page',
        );
        return view('register', $data);
    }

    public function tambah_user()
    {
        $users = new User();
        $users->insert([
            'nama_user' => $this->request->getVar('nama_user'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email' => $this->request->getVar('email'),
            'nohp' => $this->request->getVar('nohp'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'role' => $this->request->getVar('role'),

        ]);
        session()->setFlashdata('success', 'Register berhasil');
        return redirect()->to('/');
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
