<?= $this->section('page_title') ?>Calendar<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="/assets/plugins/fullcalendar.io/lib/main.css" rel="stylesheet"/>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
    <script src="/assets/plugins/fullcalendar.io/lib/main.js"></script>
    <script src="/assets/plugins/fullcalendar.io/lib/locales/es.js"></script>
    <script src="/assets/js/fullcalendar.codeigniter.js"></script>
<?= $this->endSection() ?>