<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 login-form-1">
                <h3><?= lang('Auth.registration') ?></h3>

                <form method="POST" action="<?= route_to('register'); ?>" accept-charset="UTF-8"
                      onsubmit="registerButton.disabled = true; return true;">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="name_id"><?= lang('Auth.name') ?></label><br/>
                        <input id="name_id" class="form-control" required minlength="2" type="text" name="name"
                               value="<?= old('name') ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email_id"><?= lang('Auth.email') ?></label><br/>
                        <input id="email_id" class="form-control" required type="email" name="email"
                               value="<?= old('email') ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="password_id"><?= lang('Auth.password') ?></label><br/>
                        <input id="password_id" class="form-control" required minlength="5" type="password"
                               name="password" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="password_id"><?= lang('Auth.passwordAgain') ?></label><br/>
                        <input id="password_id" class="form-control" required minlength="5" type="password"
                               name="password_confirm" value=""/>
                    </div>
                    <div class="form-group">
                        <input class="btnSubmit" name="registerButton" type="submit" value="<?= lang('Auth.register') ?>">
                    </div>
                    <div>
                        <a href="<?= site_url('login'); ?>"
                           class="ForgetPwd"><?= lang('Auth.alreadyRegistered') ?></a>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?= $this->endSection() ?>