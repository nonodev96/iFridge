<?php $this->section('modals') ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-inventory-add" tabindex="-1" role="dialog" aria-labelledby="modal-inventory-add"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-inventory-add">Añadir Objeto al almacen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open('Inventory/insert', 'method="post"') ?>
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?? "" ?>">
                    <input type="hidden" id="tag_id" name="tag_id" value="<?= $tag_id ?? "" ?>">

                    <div class="form-group">
                        <label for="name_id">Name</label>
                        <input type="text" id="name_id" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="amount_id">Amount</label>
                        <input type="number" id="amount_id" name="amount" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="name" value="<?= lang('Form.add') ?>">
                </div>
                <?= form_close() ?>

            </div>
        </div>
    </div>
<?php $this->endSection() ?>