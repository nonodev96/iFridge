<?php $this->section('modals') ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-inventory-add" tabindex="-1" role="dialog" aria-labelledby="modal-inventory-add"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-inventory-add">Añadir Objeto al almacén</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open('Inventory/insert', 'method="post"') ?>
                <div class="modal-body">

                    <div class="flex-center">
                        <div id="loadingMessage">🎥 <?= lang('iFridge.unable_to_access_video_stream') ?></div>
                        <canvas id="canvas" hidden></canvas>
                    </div>
                    <div id="output" hidden>
                        <div id="outputMessage">No QR code detected.</div>
                        <div hidden><b>Data:</b> <span id="outputData"></span></div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?? "" ?>">

                    <div class="form-group">
                        <label for="name_id">Name</label>
                        <input type="text" id="name_id" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="amount_id">Amount</label>
                        <input type="number" id="amount_id" name="amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tag_id">Tag</label>
                        <select name="tag_id" id="tag_id" class="form-control">
                            <?php foreach ($tags ?? [] as $key => $value): ?>
                                <option value="<?= $value['tag_id'] ?>"><?= $value['label'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date_id">Start Date</label>
                        <input type="date" id="start_date_id" class="form-control" name="start_date"
                               value="<?= date("Y-m-d") ?>">
                    </div>
                    <div class="form-group">
                        <label for="end_date_id">End Date</label>
                        <input type="date" id="end_date_id" class="form-control" name="end_date"
                               value="<?= date("Y-m-d") ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="<?= lang('Form.add') ?>">
                </div>
                <?= form_close() ?>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-inventory-update" tabindex="-1" role="dialog"
         aria-labelledby="modal-inventory-update"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-inventory-update">Modificar Objeto del almacén</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open('Inventory/update', 'method="post"') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="object_id">ID</label>
                        <input type="text" id="object_id" name="object_id" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="modal_amount_id">Amount</label>
                        <input type="number" id="modal_amount_id" name="amount" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="<?= lang('Form.update') ?>">
                </div>
                <?= form_close() ?>

            </div>
        </div>
    </div>
<?php $this->endSection() ?>