<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <center>
        <div class="w-full max-w-xs">
        <?php $nama_kelas = session()->getFlashdata('nama_kelas'); ?>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?= base_url('/user/' . $user['id']) ?>" enctype="multipart/form-data">
            <?php echo csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                Username
            </label>
            <input class="<?= (empty(validation_show_error('nama'))) ? '':'is-invalid' ?> shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="nama" id="nama" value="<?php echo $user['nama']?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama') ?>
                </div>
            </div>

            <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="kelas">
                Kelas
            </label>
            <!-- <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" name="kelas" id="kelas"> -->
            <select name="kelas" id="kelas">
                <?php
                    foreach ($kelas as $item){
                ?>
                    <option value="<?php echo $item['id']?>" <?php echo $user['id_kelas'] ==  $item['id'] ? 'selected' : ''?>>
                        <?php echo $item['nama_kelas']?>
                    </option>
                <?php        
                    }
                ?>
            </select>
            </div>

            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="npm">
                Npm
            </label>
            <input class="<?= (empty(validation_show_error('npm'))) ? '':'is-invalid' ?> shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="npm" id="npm" value="<?php echo $user['npm']?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama') ?>
                </div> 
            </div>

            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="npm">
                Foto
            </label>
            <img src="<?php echo $user['foto'] ?? '<default-foto>' ?>">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="foto" id="foto" value="<?php echo $user['foto']?>">
            </div>

            <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Create User
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                Forgot Password?
            </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
        </div>
    </center>
<?= $this->endSection() ?>