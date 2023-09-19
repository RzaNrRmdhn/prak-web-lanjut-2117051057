<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function profile()
    {
        $data = [
            'Nama' => 'Reza Nur Ramadhan',
            'Kelas' => 'D',
            'Npm' => '2117051057',
        ];

        return view('profile', $data);
    }

    public function create(){
        return view ('create_user');
    }

    public function store(){
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ];
        return view ('profile', $data);
    }
}
