<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <center>
        <h1>List User</h1>
        <h1><a href="<?php echo base_url('user/create')?>">Tambah Data</a></h1>
    </center>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        Npm
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach ($users as $user){
                ?>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        <?= $no++ ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $user['nama']?>
                    </td>
                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                        <?= $user['npm']?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $user['nama_kelas']?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('user/' . $user['id']) ?>">Details</a>
                        <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Edit</button>
                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>