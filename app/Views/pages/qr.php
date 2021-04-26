<?php $this->section('page_title') ?>MQTT<?php $this->endSection() ?>
<?php $this->section('css') ?>

<?php $this->endSection() ?>


<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Tags</h3>
        </div>
        <div class="col-md-4 float-right">
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-add-qr">
                Generar QR
            </button>
        </div>
    </div>
    <hr>
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
                        <td><img src="<?= $qr['url'] ?>" data-tagID="<?= $qr['tag_id'] ?>" class="img-thumbnail" alt="">
                        </td>
                        <td>
                            <button class="btn btn-block btn-outline-warning" data-tagID="<?= $qr['tag_id'] ?>">
                                <?= lang('Form.print') ?>
                            </button>
                            <hr>
                            <form action="<?= site_url('Tags/delete') ?>" method="post">
                                <input type="hidden" name="tag_id" value="<?= $qr['tag_id'] ?>">
                                <input type="submit" class="btn btn-block btn-outline-danger"
                                       value="<?= lang('Form.delete') ?>">
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
<script>
    function printImage(image) {
        let printWindow = window.open("", "Print Window", "height=400,width=600");
        printWindow.document.write("<html><head><title>Print Window</title>");
        printWindow.document.write("</head><body ><img alt='image' src='");
        printWindow.document.write(image.src);
        printWindow.document.write("' /></body></html>");
        printWindow.document.close();
        printWindow.print();
    }

    const buttons_print = document.querySelectorAll('button[data-tagID]');
    buttons_print.forEach((button, key) => {
        button.addEventListener('click', () => {
            const tag_id = button.dataset.tagid;
            const img = document.querySelectorAll(`img[data-tagID="${tag_id}"]`)[0];
            console.log(img)
            printImage(img);
        })
    });
</script>
<?php $this->endSection() ?>
