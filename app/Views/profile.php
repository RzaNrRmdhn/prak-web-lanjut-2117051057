<?=$this->extend('layouts/app');?>
<?=$this->section('content');?>
    <section style="font-family: Montserrat" class=" bg-[#071e34] flex font-medium items-center justify-center h-screen">
        <section class="w-64 mx-auto bg-[#20354b] rounded-2xl px-8 py-6 shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-gray-400 text-sm">2d ago</span>
                <span class="text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </span>
            </div>
            <div class="mt-6 w-fit mx-auto">
                <img src="<?php echo $user['foto'] ?? '<default-foto>' ?>" class="rounded-full w-28 " alt="profile picture" width="100" height="100">
            </div>

            <div class="mt-8 text-center">
                <h2 class="text-white font-bold text-2l tracking-wide"><?php echo $user['nama'] ?></h2>
            </div>
            <div class="mt-2 text-center">
                <h2 class="text-white font-bold text-2l tracking-wide"><?php echo $user['npm'] ?></h2>
            </div>
            <p class="text-center text-emerald-400 font-semibold mt-2.5" >
                Kelas <?php echo $user['nama_kelas'] ?>
            </p> 
            <p class="text-center text-emerald-400 font-semibold mt-2.5" >
                Id Data Ke- <?php echo $user['id'] ?>
            </p>

            <div class="h-1 w-full bg-black mt-8 rounded-full">
                <div class="h-1 rounded-full w-1/5 bg-yellow-500 "></div>
            </div>
            <div class="mt-3 text-white text-sm">
                <span class="text-gray-400 font-semibold">Progress Life:</span>
                <span>10%</span>
            </div>
        </section>
    </section>
<?=$this->endSection();?>


