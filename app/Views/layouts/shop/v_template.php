<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Toko Online Irvan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link rel="stylesheet" href="<?php echo base_url('css/app.css'); ?>">
  <script src="<?php echo base_url('js/app.js'); ?>"></script>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
</head>


<body class="bg-gray-100 h-screen">
	<?= $this->include('partials/shop/navbar') ?>
  <?= $this->renderSection('content') ?>
  <?= $this->include('partials/shop/footer') ?>
</body>

</html>