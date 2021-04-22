<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/bootstrap-4.6.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/plugins/fullcalendar.io/lib/main.css" rel="stylesheet"/>
</head>
<body>
<?= $this->include('template/header') ?>

<main role="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php $this->renderSection('calendar') ?>
            </div>

            <div class="col-lg-4">

            </div>
        </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>

<script src="/assets/plugins/fullcalendar.io/lib/main.js"></script>
<script src="/assets/plugins/fullcalendar.io/lib/locales/es.js"></script>
<script src="/assets/plugins/fullcalendar.io/jquery.codeigniter.js"></script>

</body>
</html>