<?php $this->section('page_title') ?>Admin<?php $this->endSection() ?>

<?php $this->section('css') ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<?php $this->endSection() ?>


<?php $this->section('content') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
var_dump($_SESSION);
                ?>
                <?php
                $iterator = [
                    'Users'     => $users ?? [],
                    'Tags'      => $tags ?? [],
                    'Inventory' => $inventory ?? []
                ]
                ?>
                <?php foreach ($iterator as $name_table => $table): ?>
                    <h2><?= $name_table ?></h2>
                    <table id="table_id-<?= $name_table ?>" class="display">
                        <thead>
                        <tr>
                            <?php $keys_ = array_keys($table[0] ?? []) ?>
                            <?php foreach ($keys_ ?? [] as $key => $value): ?>
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
                    <hr>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
<?php $this->endSection() ?>


<?php $this->section('scripts') ?>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table_id-Users').DataTable();
            $('#table_id-Tags').DataTable();
            $('#table_id-Inventory').DataTable();
        });
    </script>
<?php $this->endSection() ?>