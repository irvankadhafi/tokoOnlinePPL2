<?= $this->extend('layouts/admin/v_template') ?>
<?= $this->section('content') ?>

<h1 class="my-4 font-bold text-3xl">
  <a class="text-indigo-400 hover:text-indigo-600" href="<?= route_to('admin_product_create') ?>">Product</a>
  <span class="text-indigo-400 font-medium">/</span> Create
</h1>
<div class="bg-white rounded shadow overflow-hidden">
  <form
        action="<?= route_to('admin_product_store') ?>"
        method="post"
        enctype="multipart/form-data"
        x-data="{ files: null }">

    <div class="p-8 flex flex-wrap">

      <div class="lg:pr-6 pb-8 w-full lg:w-1/2">
        <label class="form-label font-bold" for="name">Nama</label>
        <input name="productName" id="name" class="form-input" placeholder="Masukan nama produk">
      </div>

      <div class="pb-8 w-full lg:w-1/2">
        <div class="flex flex-col">
          <label class="form-label font-bold" for="price">Harga</label>
          <div class="flex flex-row">
              <span class="flex items-center rounded rounded-r-none px-3 font-bold text-gray-600">Rp </span>
              <input type="number" name="productPrice" id="price" class="form-input">
          </div>
        </div>
      </div>

      <div class="lg:pr-6 pb-8 w-full lg:w-1/3">
        <div class="flex flex-col">
          <label class="form-label font-bold" for="stock">Stok</label>
          <div class="flex flex-row">
              <input type="number" name="productStock" id="stock" class="form-input">
              <span class="flex items-center rounded rounded-r-none px-3 font-bold text-gray-600">pcs</span>
          </div>
        </div>
      </div>

      <div class="lg:pr-6 pb-8 w-full lg:w-1/3">
        <div class="flex flex-col">
          <label class="form-label font-bold" for="weight">Berat</label>
          <div class="flex flex-row">
              <input type="number" name="productWeight" id="weight" class="form-input">
              <span class="flex items-center rounded rounded-r-none px-3 font-bold text-gray-600">gram/pcs</span>
          </div>
        </div>
      </div>

      <div class="pb-8 w-full lg:w-1/3">
        <div class="flex flex-col">
          <label class="form-label font-bold">Foto</label>
          <div class="flex flex-row">
            <label class="form-input cursor-pointer bg-gray-200" for="photo">
                <input type="file" class="sr-only" name="productPhoto" id="photo" x-on:change="files = Object.values($event.target.files)">
                <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose photo'"></span>
            </label>
            <button type="reset" @click="files = null" class="bg-gray-300 text-gray-800 px-3 py-1 rounded ml-1">Reset</button>
          </div>
        </div>
      </div>

      <div class="pb-8 w-full">
          <label class="form-label font-bold" for="description">Deskripsi</label>
          <textarea class="form-input" id="description" name="productDesc" rows="4"></textarea>
      </div>

    </div>
    <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center">
      <button class="btn-indigo" type="submit">Create</button>
    </div>
  </form>
</div>
<?= $this->endSection() ?>