<?php $this->section('page_title') ?>MQTT<?php $this->endSection() ?>
<?php $this->section('css') ?>

<?php $this->endSection() ?>


<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="loadingMessage">🎥 <?= lang('iFridge.unable_to_access_video_stream') ?></div>
            <canvas id="canvas" hidden></canvas>
            <div id="output" hidden>
                <div id="outputMessage">No QR code detected.</div>
                <div hidden><b>Data:</b> <span id="outputData"></span></div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 1em">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-qr">
                Generar QR
            </button>
        </div>

        <div class="col-md-12" style="margin-top: 1em">
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Label</th>
                    <th>QR</th>
                    <th>Actions</th>
                </tr>
                <!-- 1 => ['id' => 1] -->
                <?php //var_dump($qr_list ?? []) ?>
                <?php foreach ($qr_list ?? [] as $key => $qr): ?>
                    <tr>
                        <td><?= $qr['tag_id'] ?></td>
                        <td><?= $qr['label'] ?></td>
                        <td><img src="<?= $qr['url'] ?>" class="img-thumbnail" alt=""></td>
                        <td>
                            <form action="<?= site_url('QR_Controller/delete') ?>" method="post">
                                <input type="hidden" name="tag_id" value="<?= $qr['tag_id'] ?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</div>


<?php $this->endSection() ?>

<?php $this->include('modals/qr') ?>

<?php $this->section('scripts') ?>
<script src="/assets/plugins/jsQR-master/dist/jsQR.js"></script>
<script src="/assets/js/qr.codeigniter.js"></script>
<?php $this->endSection() ?>
