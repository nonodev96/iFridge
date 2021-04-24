<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

    <div class="container login-container">
        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6 login-form-1">
                <h3><?= lang('Auth.forgottenPassword') ?></h3>

                <form method="POST" action="<?= site_url('forgot-password'); ?>" accept-charset="UTF-8"
                      onsubmit="submitButton.disabled = true; return true;">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="email_id"><?= lang('Auth.typeEmail') ?></label><br/>
                        <input id="email_id" class="form-control" required type="email" name="email"
                               value="<?= old('email') ?>"/>
                    </div>
                    <div class="form-group">
                        <input name="submitButton" class="btnSubmit" type="submit"
                               value="<?= lang('Auth.setNewPassword') ?>">
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>

<?= $this->endSection() ?>