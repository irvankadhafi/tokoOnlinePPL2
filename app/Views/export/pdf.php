<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Print PDF</title>
</head>

<body>

    <div class="container mt-5">
    <h1 align="center">Data Penjualan</h1>
    <h1 align="center"><?= date('d-m-Y'); ?></h1>
        <table class="table table-bordered table-striped text-center m-auto" border="1">
                <tr class="text-center m-auto" style="text-align: center">
                <th><strong>ID Transaksi</strong></th>
                <th><strong>Nama Pembeli</strong></th>
                <th><strong>Total Ongkir</strong></th>
                <th><strong>Total Harga Barang</strong></th>
                <th><strong>Waktu</strong></th>
                </tr>
                <?php foreach ($pdf_penjualan as $row) : ?>
                    <tr class="text-center" style="text-align: center">
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nama_pembeli']; ?></td>
                        <td>Rp <?php echo number_format($row['total_harga_ongkir'], 0, 0, '.'); ?></td>
                        <td>Rp <?php echo number_format($row['total_harga_barang'], 0, 0, '.'); ?></td>
                        <td><?= $row['waktu_transaksi']; ?></td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>