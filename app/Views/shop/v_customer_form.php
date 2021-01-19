<?= $this->extend('layouts/shop/v_template') ?>
<?= $this->section('content') ?>
<div class="leading-loose">
    <form
            action="<?= route_to('cart_checkout') ?>"
            method="post"
            class="max-w-xl my-10 p-10 bg-white rounded shadow-xl mx-auto">
        <p class="text-gray-800 font-medium">Informasi Pembeli</p>
        <div class="">
            <label class="block text-sm text-gray-600" for="cus_name">Name</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Nama Lengkap" aria-label="Name">
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
            <textarea class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_address" name="cus_address" rows="2" type="text" required="" placeholder="Jl. ..." aria-label="Address"></textarea>        </div>
        <div class="inline-block mt-2 w-1/2 pr-1">
            <label class="hidden block text-sm text-gray-600" for="cus_email">Kecamatan</label>
            <select name="cus_kecamatan" class="form-select block w-full bg-gray-200">
                <?php
                    foreach($ongkir as $key => $row) {
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['kecamatan_tujuan']; ?></option>
                <?php
                    }
                ?>
            </select>
<!--            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_kecamatan" name="cus_kecamatan" type="text" required="" placeholder="Kecamatan" aria-label="Kecamatan">-->
        </div>
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
            <label class="hidden block text-sm text-gray-600" for="cus_email">Kota</label>
            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_city"  name="cus_city" type="text" required="" placeholder="Kota" aria-label="Kota">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="cus_phone">Phone Number</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_phone" name="cus_phone" type="text" required="" placeholder="Phone" aria-label="Name">
        </div>

        <div class="bg-gray-100 flex justify-end items-center mt-6">
            <form method="GET" action="<?= route_to('cart_checkout') ?>">
                <button class="btn-green float-right py-2" type="submit">
                    Continue
                </button>
            </form>
        </div>
    </form>
</div>
<?= $this->endSection() ?>