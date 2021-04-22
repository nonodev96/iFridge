<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Auth library</title>
    <link href="/assets/bootstrap-4.6.0-dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<?php
if (session('isLoggedIn')) {
    echo view('App\Views\template\header');
}
?>

<main role="main" class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= view('Auth\Views\_notifications') ?>
            </div>
        </div>
    </div>
    <?= $this->renderSection('main') ?>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
</body>
</html>