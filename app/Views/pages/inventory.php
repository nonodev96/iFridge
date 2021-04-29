<?php $this->section('page_title') ?>Inventory<?php $this->endSection() ?>

<?php $this->section('css') ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<?php $this->endSection() ?>


<?php $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Inventory</h3>
            </div>
            <div class="col-md-4 float-right">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-inventory-add">
                    Añadir objeto al almacen
                </button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?php
                $iterator = [
                    'Inventory' => $inventory ?? []
                ]
                ?>
                <?php foreach ($iterator as $name_table => $table): ?>
                    <table id="table_id-Inventory" class="display">
                        <thead>
                        <tr>
                            <?php $keys_ = array_keys($table[0] ?? []) ?>
                            <?php foreach ($keys_ as $key => $value): ?>
                                <th><?= $value ?></th>
                            <?php endforeach; ?>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($table as $key => $value): ?>
                            <tr>
                                <?php foreach ($value as $key_2 => $value_2): ?>
                                    <td><?= $value_2 ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <button type="button" class="btn btn-block btn-outline-warning" data-toggle="modal"
                                            data-object_id="<?= $value['id'] ?>"
                                            data-amount="<?= $value['amount'] ?>"
                                            data-target="#modal-inventory-update">
                                        <?= lang('Form.update') ?>
                                    </button>
                                    <hr>
                                    <?= form_open('Inventory/delete', 'method="post"') ?>
                                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                    <button type="submit" class="btn btn-block btn-outline-danger">Borrar</button>
                                    <?= form_close() ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>

<?php $this->include('modals/inventory') ?>

<?php $this->section('scripts') ?>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/jsQR-master/dist/jsQR.js"></script>
    <script src="/assets/js/qr.codeigniter.js"></script>
    <script>
        $(document).ready(function () {
            $('#table_id-Inventory').DataTable();
            const buttons_update = document.querySelectorAll('button[data-object_id]');
            buttons_update.forEach((button, key) => {
                button.addEventListener('click', () => {
                    const object_id = button.dataset.object_id;
                    const amount = button.dataset.amount;
                    const input_modal_object_id = document.getElementById('object_id');
                    const input_modal_amount_id = document.getElementById('modal_amount_id');
                    input_modal_object_id.value = object_id;
                    input_modal_amount_id.value = amount;
                })
            });
        });

    </script>
<?php $this->endSection() ?>