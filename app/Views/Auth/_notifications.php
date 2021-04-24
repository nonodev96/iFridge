<?php if (session()->has('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('success') ?>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger" role="alert">
        <ul class="notification error">
            <?php foreach (session('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
