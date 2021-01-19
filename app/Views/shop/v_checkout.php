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
<div class="flex justify-center my-6">
        <div class="flex flex-col w-full text-gray-800 bg-white shadow pin-r pin-y md:w-4/5 lg:w-4/5 rounded">
            <form action="<?= route_to('customer_invoice') ?>" method="post">
            <div class="px-6 py-4 bg-gray-200 border-t border-gray-200 flex justify-end items-center">
                <h1 class="font-bold text-4xl mr-auto">
                    <span class="text-irvan-navbar font-medium">ORDER #<?php echo $idtrx; ?></span>
                </h1>
            </div>
            <div class="flex-1 p-8">
                <div class="flex mb-8 justify-between">
                    <div class="w-3/4">
                        <div class="mb-2 md:mb-1 md:flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Penerima</label>
                            <span class="mr-4 inline-block hidden md:block">:</span>
                            <div class="flex-1">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" name="cus_name" type="text" value="<?php echo $penerima; ?>" readonly>
                            </div>
                        </div>

                        <div class="mb-2 md:mb-1 md:flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Alamat</label>
                            <span class="mr-4 inline-block hidden md:block">:</span>
                            <div class="flex-1">
                                <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mt-2" id="inline-full-name" name="cus_address" type="text" cols="1" readonly><?php echo $alamat ?></textarea>
                                <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mt-2" id="inline-full-name" name="cus_kecamatan" type="text" cols="1" readonly><?php echo $kecamatan ?></textarea>
                                <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 mt-2" id="inline-full-name" name="cus_city" type="text" cols="1" readonly><?php echo $kota ?></textarea>
                            </div>
                        </div>

                        <div class="mb-2 md:mb-1 md:flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">No. Telp</label>
                            <span class="mr-4 inline-block hidden md:block">:</span>
                            <div class="flex-1">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 js-datepicker-2" id="datepicker2" name="cus_phone" type="text" value="<?php echo $nohp ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="w-32 h-32 mb-1 border rounded-lg overflow-hidden relative bg-gray-100">
                            <img id="image" class="object-cover w-full h-32" src="<?php echo base_url('img/customer.svg');?>" />
                        </div>

                    </div>
                </div>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <?php if(count($items) != 0){ // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: ?>
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="hidden md:table-cell"></th>
                                    <th class="px-4 py-3">Product</th>
                                    <th class="px-4 py-3">Quantity</th>
                                    <th class="px-4 py-3">Unit Price</th>
                                    <th class="px-4 py-3">Total Price</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php foreach($items as $key => $item) { ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="pl-4 py-3">
                                            <img src="<?php echo base_url('uploads/products/'.$item['photo']);?>" class="w-32 rounded" alt="Thumbnail">
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?php echo $item['name']; ?>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm lg:text-base font-medium">
                                                <?php echo $item['quantity']; ?> (<?php echo number_format(($item['weight']*$item['quantity']) / 1000, 2); ?>kg)
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm lg:text-base font-medium">
                                                Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?>
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-sm lg:text-base font-medium">
                                                Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr class="font-bold text-red-500">
                                    <td colspan="4" class="text-right px-4 py-3">Jumlah</td>
                                    <td class="text-right px-4 py-3">Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                                </tr>
                                <tr class="font-bold text-red-500">
                                    <td colspan="4" class="text-right px-4 py-3">Total Berat</td>
                                    <td class="text-right px-4 py-3"><?php echo number_format(($total_weight) / 1000, 2);  ?>kg (<?php echo number_format(($total_weight_pembulatan), 2);  ?>kg)</td>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 hidden" id="inline-full-name" name="total_berat" type="text" value="<?php echo $total_weight_pembulatan; ?>" readonly>
                                </tr>
                                <tr class="font-bold text-red-500">
                                    <td colspan="4" class="text-right px-4 py-3">Total Biaya Ongkir</td>
                                    <td class="text-right px-4 py-3">Rp. <?php echo number_format($total_ongkir, 0, 0, '.'); ?> (/kg Rp. <?php echo number_format($biaya_ongkir, 0, 0, '.'); ?>)</td>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 hidden" id="inline-full-name" name="total_ongkir" type="text" value="<?php echo $total_ongkir; ?>" readonly>
                                </tr>
                                <tr class="font-bold text-red-500">
                                    <td colspan="4" class="text-right px-4 py-3">Total Semua</td>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-56 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 hidden" id="inline-full-name" name="total_semua" type="text" value="<?php echo $total_semua; ?>" readonly>
                                    <td class="text-right px-4 py-3">Rp. <?php echo number_format($total_semua, 0, 0, '.'); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        <?php }?>
                    </div>
                </div>
                <?php if(count($items) == 0){ ?>
                    Keranjang belanja Anda sedang kosong.
                <?php } ?>
            </div>
            <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center">
                <a href="<?= route_to('cart_page') ?>" class="btn-red mr-auto">
                    Kembali
                </a>
                <button class="btn-green ml-auto" type="submit">
                    Konfirmasi
                </button>
            </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>