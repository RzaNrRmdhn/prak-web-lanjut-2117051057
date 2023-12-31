<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends BaseController
{   
    public $userModel;
    public $kelasModel;
    protected $helpers=['form'];

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_users', $data);
    }

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
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

        session();
        // $kelas = [
        //     [
        //         'id' => 1,
        //         'nama_kelas' => 'A'
        //     ],
        //     [
        //         'id' => 2,
        //         'nama_kelas' => 'B'
        //     ],
        //     [
        //         'id' => 3,
        //         'nama_kelas' => 'C'
        //     ],
        //     [
        //         'id' => 4,
        //         'nama_kelas' => 'D'
        //     ],
        // ];
        // $kelasModel = new KelasModel();
        
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            // 'validation' => \Config\Services::validation(),
        ];

        return view ('create_user', $data);
    }

    public function store(){

        // $kelasModel = new KelasModel();
        if($this->request->getVar('kelas') != ''){
            $kelas_select = $this->kelasModel->where('id', $this->request->getVar('kelas'))->first();
            $nama_kelas = $kelas_select['nama_kelas'];
        }else{
            $nama_kelas = '';
        }

        // $userModel = new UserModel();
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $name = $foto->getRandomName();
        if($foto->move($path, $name)){
            $foto = base_url($path . $name);
        }

        if (!$this->validate([
            'nama' => 'required|is_unique[user.nama]',
            'npm' => 'required|is_unique[user.npm]',
            'kelas' => 'required'
        ])){
            // $validation = \Config\Services::validation();
            // return redirect()->back()->withInput()->with('validation', $validation);
            session()->setFlashdata('nama_kelas');
            return redirect()->back()->withInput()->with('nama_kelas', $nama_kelas);
        }
        
        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            'foto' => $foto,
        ]);

        // $data = [
        //     'title' => 'Profile User',
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm'),
        // ];
        // return view ('profile', $data);
        return redirect()->to('/user');
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas
        ];

        return view('edit_user', $data);
    }

    public function update($id){
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');

        $data = [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ];

        if ($foto->isValid()) {
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)) {
                $foto_path = base_url($path . $name);

                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);

        if (!$result) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }

        return redirect()->to(base_url('/user'));
    }
    public function destroy($id){
        $result = $this->userModel ->deleteUser($id);
        
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        
        return redirect()->to(base_url('/user'))->with('succcess', 'Berhasil menghapus data');
    }
}
