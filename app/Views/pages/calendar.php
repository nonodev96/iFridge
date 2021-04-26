<?php $this->section('page_title') ?>Calendar<?php $this->endSection() ?>

<?php $this->section('css') ?>
    <link href="/assets/plugins/fullcalendar.io/lib/main.css" rel="stylesheet"/>
    <style>
        .widget {
            height: 98px;
        }
    </style>
<?php $this->endSection() ?>


<?php $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>El tiempo</h3>
                <hr>
                <div class="widget">
                    <a class="weatherwidget-io" href="https://forecast7.com/es/37d78n3d78/jaen/" data-label_1="JAÉN"
                       data-label_2="Jaén" data-icons="Climacons" data-theme="pure">JAÉN Jaén</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Calendario</h3>
                <hr>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>


<?php $this->section('scripts') ?>

    <script>
        !function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
    </script>
    <script src="/assets/plugins/fullcalendar.io/lib/main.js"></script>
    <script src="/assets/plugins/fullcalendar.io/lib/locales/es.js"></script>
    <script src="/assets/js/fullcalendar.codeigniter.js"></script>
<?php $this->endSection() ?>