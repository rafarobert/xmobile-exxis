<?php
use yii\helpers\Html;
?>
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        <span class="float-right">
                        </span>Notificaciones
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">

                    <?php if(Yii::$app->session->get('offline')){ ?>
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <p class="mb-0 user-msg">
                                <small>Estas Trabajando en modo Offline</small>
                            </p>
                        </a>
                    <?php } ?>
                </div>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" id="dropdownMenuLink" role="button">
                <?= Html::img('@web/images/default-user.png', ['alt' => 'user-image','class' => 'rounded-circle']) ?>
                <span class="pro-user-name ml-1">
                    <?= Yii::$app->user->identity->username ?> <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="dropdownMenuLink">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        <?= Yii::t('backend','men_Welcome')?>
                    </h5>
                </div>
<?php /*
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>
*/ ?>
                <div class="dropdown-divider"></div>

                <!-- item-->
                <?= Html::beginForm(['/site/logout'], 'post') ?>
                <button type="submit" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span><?= Yii::t('backend','men_Logout') ?></span>
                </button>
                <?= Html::endForm() ?>
            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
            <?= Html::img('@web/images/logologin.png', ['alt' => '','height' => 16]) ?>
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <?= Html::img('@web/images/logologin-sm.png', ['alt' => '','height' => 18]) ?>
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>
    </ul>
</div>