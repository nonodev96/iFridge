<?php $this->section('modals') ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-add-qr" tabindex="-1" role="dialog" aria-labelledby="modal-add-qr-label"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-qr-label">Añadir QR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('Tags/insert') ?>
                <div class="modal-body">
                    <div class="flex-center">
                        <div id="loadingMessage">🎥 <?= lang('iFridge.unable_to_access_video_stream') ?></div>
                        <canvas id="canvas" hidden></canvas>
                    </div>
                    <div id="output" hidden>
                        <div id="outputMessage">No QR code detected.</div>
                        <div hidden><b>Data:</b> <span id="outputData"></span></div>
                    </div>

                    <div class="form-group">
                        <label for="qr_id">Text</label>
                        <input id="qr_id" type="text" name="label" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Añadir">
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>