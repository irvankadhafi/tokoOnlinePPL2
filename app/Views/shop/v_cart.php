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
        <div class="px-6 py-4 bg-gray-200 border-t border-gray-200 flex justify-end items-center">
            <h1 class="font-bold text-4xl mr-auto">
                <span class="text-irvan-navbar font-medium">Product Cart</span>
            </h1>
            <a href="<?= route_to('shop_home') ?>" class="btn-indigo float-right">
                Lanjut Belanja
            </a>
        </div>
        <div class="flex-1 p-8">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <?php if(count($items) != 0){ // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: ?>
                    <?php echo form_open('cart/update'); ?>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="hidden md:table-cell"></th>
                            <th class="px-4 py-3">Product</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Unit Price</th>
                            <th class="px-4 py-3">Total Price</th>
                            <th class="px-4 py-3">Actions</th>
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
                            <td class="px-4 py-3 text-xs">
                                <div class="w-20 h-10">
                                    <div class="relative flex flex-row w-full h-8">
                                        <input type="number" name="quantity[]" value="<?php echo $item['quantity']; ?>"
                                               class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                    </div>
                                </div>
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
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit" type="submit"
                                    >
                                        <svg
                                                class="w-5 h-4"
                                                aria-hidden="true"
                                                fill="currentColor"
                                                viewBox="0 0 438.529 438.528"
                                        >
                                            <g>
                                                <g>
                                                    <path d="M433.109,23.694c-3.614-3.612-7.898-5.424-12.848-5.424c-4.948,0-9.226,1.812-12.847,5.424l-37.113,36.835
			c-20.365-19.226-43.684-34.123-69.948-44.684C274.091,5.283,247.056,0.003,219.266,0.003c-52.344,0-98.022,15.843-137.042,47.536
			C43.203,79.228,17.509,120.574,5.137,171.587v1.997c0,2.474,0.903,4.617,2.712,6.423c1.809,1.809,3.949,2.712,6.423,2.712h56.814
			c4.189,0,7.042-2.19,8.566-6.565c7.993-19.032,13.035-30.166,15.131-33.403c13.322-21.698,31.023-38.734,53.103-51.106
			c22.082-12.371,45.873-18.559,71.376-18.559c38.261,0,71.473,13.039,99.645,39.115l-39.406,39.397
			c-3.607,3.617-5.421,7.902-5.421,12.851c0,4.948,1.813,9.231,5.421,12.847c3.621,3.617,7.905,5.424,12.854,5.424h127.906
			c4.949,0,9.233-1.807,12.848-5.424c3.613-3.616,5.42-7.898,5.42-12.847V36.542C438.529,31.593,436.733,27.312,433.109,23.694z"/>
                                                    <path d="M422.253,255.813h-54.816c-4.188,0-7.043,2.187-8.562,6.566c-7.99,19.034-13.038,30.163-15.129,33.4
			c-13.326,21.693-31.028,38.735-53.102,51.106c-22.083,12.375-45.874,18.556-71.378,18.556c-18.461,0-36.259-3.423-53.387-10.273
			c-17.13-6.858-32.454-16.567-45.966-29.13l39.115-39.112c3.615-3.613,5.424-7.901,5.424-12.847c0-4.948-1.809-9.236-5.424-12.847
			c-3.617-3.62-7.898-5.431-12.847-5.431H18.274c-4.952,0-9.235,1.811-12.851,5.431C1.807,264.844,0,269.132,0,274.08v127.907
			c0,4.945,1.807,9.232,5.424,12.847c3.619,3.61,7.902,5.428,12.851,5.428c4.948,0,9.229-1.817,12.847-5.428l36.829-36.833
			c20.367,19.41,43.542,34.355,69.523,44.823c25.981,10.472,52.866,15.701,80.653,15.701c52.155,0,97.643-15.845,136.471-47.534
			c38.828-31.688,64.333-73.042,76.52-124.05c0.191-0.38,0.281-1.047,0.281-1.995c0-2.478-0.907-4.612-2.715-6.427
			C426.874,256.72,424.731,255.813,422.253,255.813z"/>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </button>
                                    <a href="<?= route_to('cart_remove',$item['id']) ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')">
                                        <svg
                                                class="w-5 h-5"
                                                aria-hidden="true"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr class="font-bold text-red-500">
                            <td colspan="5" class="text-right px-4 py-3">Jumlah</td>
                            <td class="text-right px-4 py-3">Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>
                    <?php }?>
                </div>
            </div>
            <?php if(count($items) == 0){ ?>
                Keranjang belanja Anda sedang kosong.
            <?php } ?>
        </div>
        <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center">
            <form method="GET" action="<?= route_to('cart_checkout') ?>">
                <button class="btn-green float-right" type="submit">
                    Checkout
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
