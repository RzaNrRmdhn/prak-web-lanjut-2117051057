<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
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
}