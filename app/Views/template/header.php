<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">iFridge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('Mqtt') ?>">Mqtt</a>
                </li>
                <?php if (session('isLoggedIn')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Calendar') ?>">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Tags') ?>">Tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Inventory') ?>">Inventory</a>
                    </li>
                    <?php if (session('userData')['role']): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('admin') ?>">Admin</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if (session('isLoggedIn')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('account') ?>">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('logout') ?>"><?= lang('Auth.logout') ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('register') ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>