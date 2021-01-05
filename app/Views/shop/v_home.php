<?= $this->extend('layouts/shop/v_template') ?>
<?= $this->section('content') ?>
    <!-- tampilkan pesan success -->
    <?php if(session()->getFlashdata('success') != null){ ?>
    <div class="flex items-center justify-between bg-green-500 rounded mx-20 mt-5">
        <div class="flex items-center">
            <svg class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="0 11 2 9 7 14 18 3 20 5 7 18" /></svg>
            <div class="py-4 text-white text-sm font-medium">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- selesai menampilkan pesan success -->
<div class="flex flex-col container mx-auto md:flex-row md:items-center md:justify-between">
  <div class="my-6">
    <div class="px-10 grid grid-cols-4 gap-4">
      <?php
        foreach($items as $key => $row) {
      ?>
      <div class="col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-1 xl:col-span-1 flex flex-col items-center">
        <div class="bg-white rounded-lg mt-5">
        <a style="display:block" href="<?= route_to('product_buy',$row['id']) ?>">
          <img src="<?php echo base_url('uploads/products/'.$row['photo']);?>" class="h-40 rounded-md"/>
        </a>
        </div>
        <div class="bg-white shadow-md rounded-lg -mt-4 w-64">
          <div class="py-5 px-5">
          <a style="display:block" href="<?= route_to('product_buy',$row['id']) ?>">
            <span class="font-bold text-gray-800 text-lg"><?php echo $row['name']; ?></span>
            <div class="flex items-center justify-between">
              <div class="text-sm text-gray-600 font-light">
                  Stock : <?php echo $row['stock']; ?>
                </div>
              <div class="text-md text-red-600 font-bold">
                Rp. <?php echo number_format($row['price'], 0, 0, '.'); ?>
              </div>
            </div>
          </a>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>