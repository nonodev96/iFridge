<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>


<div class="container login-container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-form-1">
            <h3><?= lang('Auth.login') ?></h3>

            <form method="POST" action="<?= site_url('login'); ?>" accept-charset="UTF-8">
                <div class="form-group">
                    <label for="email_id"><?= lang('Auth.email') ?></label><br/>
                    <input id="email_id" class="form-control" required type="email" name="email"
                           value="<?= old('email') ?>"/>
                </div>

                <div class="form-group">
                    <label for="password_id"><?= lang('Auth.password') ?></label><br/>
                    <input id="password_id" class="form-control" required minlength="5" type="password" name="password"
                           value=""/>
                </div>

                <div class="form-group">
                    <?= csrf_field() ?>
                    <input class="btnSubmit" type="submit" value="<?= lang('Auth.login') ?>">
                </div>
                <div class="form-group">
                    <a href="<?= site_url('forgot-password'); ?>"
                       class="ForgetPwd"><?= lang('Auth.forgotYourPassword') ?></a>
                </div>
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?= $this->endSection() ?>

