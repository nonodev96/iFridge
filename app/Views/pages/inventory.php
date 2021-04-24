<?php $this->section('page_title') ?>Inventory<?php $this->endSection() ?>

<?php $this->section('css') ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<?php $this->endSection() ?>


<?php $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Inventory</h3>
                <?php
                var_dump($_SESSION);

                ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-inventory-add">
                    Añadir objeto al almacen
                </button>
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($table as $key => $value): ?>
                            <tr>
                                <?php foreach ($value as $key_2 => $value_2): ?>
                                    <td><?= $value_2 ?></td>
                                <?php endforeach; ?>
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
    <script>
        $(document).ready(function () {
            $('#table_id-Inventory').DataTable();
        });
    </script>
<?php $this->endSection() ?>