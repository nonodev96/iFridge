<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h2><?= lang('Auth.accountSettings') ?></h2>

                <form method="POST" action="<?= site_url('account'); ?>" accept-charset="UTF-8">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="name_id"><?= lang('Auth.name') ?></label>
                        <input id="name_id" required class="form-control" type="text" name="name"
                               value="<?= $userData['name']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email_id"><?= lang('Auth.email') ?></label>
                        <input id="email_id" disabled type="text" value="<?= $userData['email']; ?>" class="form-control"/>
                    </div>
                    <?php if ($userData['new_email']) : ?>
                        <div class="form-group">
                            <label for="new_email_id"><?= lang('Auth.pendingEmail') ?></label>
                            <input id="new_email_id" disabled type="text" value="<?= $userData['new_email']; ?>" class="form-control"/>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="<?= lang('Auth.update') ?>">
                    </div>
                </form>

            </div>
            <div class="col-md-6">

                <!-- CHANGE EMAIL -->
                <h2><?= lang('Auth.changeEmail') ?></h2>
                <div class="form-group"><?= lang('Auth.changeEmailInfo') ?></div>

                <form method="POST" action="<?= site_url('change-email'); ?>" accept-charset="UTF-8"
                      onsubmit="changeEmail.disabled = true; return true;">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="change_email_id"><?= lang('Auth.newEmail') ?></label>
                        <input id="change_email_id" required class="form-control" type="email" name="new_email"
                               value="<?= old('new_email') ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="current_password_id"><?= lang('Auth.currentPassword') ?></label>
                        <input id="current_password_id" required class="form-control" type="password" name="password"
                               value=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="changeEmail" class="btn btn-primary"
                               value="<?= lang('Auth.update') ?>">
                    </div>
                </form>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <!-- CHANGE PASSWORD -->
                <h2><?= lang('Auth.changePassword') ?></h2>

                <form method="POST" action="<?= site_url('change-password'); ?>" accept-charset="UTF-8"
                      onsubmit="changePassword.disabled = true; return true;">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="password_id"><?= lang('Auth.currentPassword') ?></label>
                        <input id="password_id" required class="form-control" type="password" minlength="5"
                               name="password" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="new_password_id"><?= lang('Auth.newPassword') ?></label>
                        <input id="new_password_id" required class="form-control" type="password" minlength="5"
                               name="new_password" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirm_id"><?= lang('Auth.newPasswordAgain') ?></label>
                        <input id="new_password_confirm_id" required class="form-control" type="password" minlength="5"
                               name="new_password_confirm" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="changePassword" class="btn btn-primary"
                               value="<?= lang('Auth.update') ?>">
                    </div>
                </form>
            </div>


            <div class="col-md-6">
                <!-- DELETE ACCOUNT -->
                <h2><?= lang('Auth.deleteAccount') ?></h2>

                <form method="POST" action="<?= site_url('delete-account') ?>" accept-charset="UTF-8">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="delete_account_password_id"><?= lang('Auth.currentPassword') ?></label>
                        <input id="delete_account_password_id" required class="form-control" type="password"
                               name="password" value=""/>
                    </div>
                    <p><?= lang('Auth.deleteAccountInfo') ?></p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('<?= lang('Auth.areYouSure') ?>')"><?= lang('Auth.deleteAccount') ?></button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <!-- CHANGE PASSWORD -->
                <h2><?= lang('House.changeHouse') ?></h2>

                <form method="POST" action="<?= site_url('update-house'); ?>" accept-charset="UTF-8"
                      onsubmit="changePassword.disabled = true; return true;">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="house_id"><?= lang('House.currentNameHouse') ?></label>
                        <input type="text" id="house_id" name="name" class="form-control" value="<?= $houseData['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="broker_id"><?= lang('House.currentBroker') ?></label>
                        <input type="text" id="broker_id" name="broker" class="form-control" value="<?= $houseData['broker'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="port_id"><?= lang('House.currentPort') ?></label>
                        <input type="text" id="port_id" name="port" class="form-control" value="<?= $houseData['port'] ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="changeHouse" class="btn btn-primary"
                               value="<?= lang('Auth.update') ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>