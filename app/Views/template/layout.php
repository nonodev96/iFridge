<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->renderSection('page_title') ?></title>

    <link href="/assets/bootstrap-4.6.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">

    <?php if (session('isLoggedIn')): ?>
        <meta property="user_id" content="<?= session('userData')['user_id'] ?>">
        <meta property="broker" content="<?= session('houseData')['broker'] ?>">
        <meta property="port" content="<?= session('houseData')['port'] ?>">
    <?php endif; ?>

    <?php $this->renderSection('css') ?>

</head>
<body>

<?= $this->include('template/header') ?>

<?= $this->include('template/notifications') ?>

<main role="main">
    <?php $this->renderSection('content') ?>
</main>

<?php $this->renderSection('modals') ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="/assets/bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>

<?php $this->renderSection('scripts') ?>

</body>
</html>