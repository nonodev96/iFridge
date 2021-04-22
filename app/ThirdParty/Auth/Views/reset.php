<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <h1><?= lang('Auth.resetPassword') ?></h1>

                <form method="POST" action="<?= site_url('reset-password'); ?>" accept-charset="UTF-8">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="password_id"><?= lang('Auth.newPassword') ?></label><br/>
                        <input class="form-control" id="password_id" required type="password" name="password" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="password_confirm_id"><?= lang('Auth.newPasswordAgain') ?></label><br/>
                        <input class="form-control" id="password_confirm_id" required type="password"
                               name="password_confirm"
                               value=""/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="token" value="<?= $_GET['token'] ?>"/>
                        <button class="btn btn-primary" type="submit"><?= lang('Auth.resetPassword') ?></button>
                    </div>
                </form>


            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?= $this->endSection() ?>