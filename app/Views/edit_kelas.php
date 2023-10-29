<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <center>
        <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?= base_url('/kelas/' . $kelas['id']) ?>" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <?php echo csrf_field() ?>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_kelas">
                Nama Kelas
                <?php echo var_dump($kelas['nama_kelas'])?>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="nama_kelas" id="nama_kelas" value="<?php echo $kelas['nama_kelas']?>">
            </div>

            <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Update Kelas
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