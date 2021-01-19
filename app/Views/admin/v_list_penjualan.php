<?= $this->extend('layouts/admin/v_template') ?>
<?= $this->section('content') ?>
<h1 class="my-4 font-bold text-3xl">Riwayat Penjualan</h1>

<!-- <div x-data="button()">
  <button class="btn-green" x-on:click="open">Export Excel</button>
</div> -->
<div class="mb-6 flex justify-between items-center">
  <div class="ml-auto">
    <a class="btn-green" href="<?= route_to('admin_penjualan_xls') ?>">Export Excel</a>
    <a class="btn-indigo" href="<?= route_to('admin_penjualan_pdf') ?>">Export PDF</a>
  </div>
</div>
<div class="bg-white rounded shadow overflow-hidden">
  <table class="w-full whitespace-no-wrap">
    <tr class="text-center font-bold">
      <th class="px-6 pt-6 pb-4">ID Transaksi</th>
      <th class="px-6 pt-6 pb-4">Nama</th>
      <th class="px-6 pt-6 pb-4">Total Ongkir</th>
      <th class="px-6 pt-6 pb-4">Total Harga Barang</th>
      <th class="px-6 pt-6 pb-4">Waktu</th>
    </tr>
    <?php foreach($items as $key => $row) { ?>
    <tr class="text-center hover:bg-gray-100 focus-within:bg-gray-100">
      <td class="border-t py-4">
        <?php echo $row['id']; ?>
      </td>
      <td class="border-t py-4">
        <?php echo $row['nama_pembeli']; ?>
      </td>
      <td class="border-t py-4">
        <?php echo $row['total_harga_ongkir']; ?>
      </td>
      </td>
      <td class="border-t py-4">
        <?php echo $row['total_harga_barang']; ?>
      </td>
      </td>
      <td class="border-t py-4">
        <?php echo $row['waktu_transaksi']; ?>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>
<script>
  function button() {
        return {
            open()
            {
              console.log("WOYY")
            },
        }
    }
</script>
<?= $this->endSection() ?>