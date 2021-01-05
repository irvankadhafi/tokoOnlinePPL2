<!DOCTYPE html>
<html x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KDHF SHOP ADMIN</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo base_url('css/app.css'); ?>">
    <script src="<?php echo base_url('js/app.js'); ?>"></script>
    <script src="<?php echo base_url('js/initAlphine.js'); ?>"></script>
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <?= $this->include('partials/admin/sidebar') ?>
      <div class="flex flex-col flex-1 w-full">
      <?= $this->include('partials/admin/navbar') ?>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
          <?= $this->renderSection('content') ?>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
