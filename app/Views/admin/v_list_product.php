<?= $this->extend('layouts/admin/v_template') ?>
<?= $this->section('content') ?>
<h1 class="my-4 font-bold text-3xl">Product</h1>
<div class="mb-6 flex justify-between items-center">
  <div class="ml-auto">
    <a class="btn-green" href="#">Export Excel</a>
    <a class="btn-indigo" href="#">Export PDF</a>
  </div>
</div>
<div class="bg-white rounded shadow overflow-hidden">
  <table class="w-full whitespace-no-wrap">
    <tr class="text-center font-bold">
      <th class="px-6 pt-6 pb-4">ID</th>
      <th class="px-6 pt-6 pb-4">Nama</th>
      <th class="px-6 pt-6 pb-4">Harga</th>
      <th class="px-6 pt-6 pb-4">Stock</th>
      <th class="px-6 pt-6 pb-4">Berat</th>
    </tr>
    <?php foreach($items as $key => $row) { ?>
    <tr class="text-center hover:bg-gray-100 focus-within:bg-gray-100">
      <td class="border-t py-4">
        <?php echo $row['id']; ?>
      </td>
      <td class="border-t py-4">
        <?php echo $row['name']; ?>
      </td>
      <td class="border-t py-4">
        <?php echo $row['price']; ?>
      </td>
      <td class="border-t py-4">
        <?php echo $row['stock']; ?>
      </td>
      <td class="border-t py-4">
        <?php echo $row['weight']; ?>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

<?= $this->endSection() ?>