<?php
use yii\helpers\Html;
?>
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        <span class="float-right">
                            <a href="" class="text-light">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon">
                            <?= Html::img('@web/images/users/user-1.jpg', ['alt' => '','class' => 'img-fluid rounded-circle']) ?>
                        </div>
                        <p class="notify-details">Cristina Pride</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Hi, How are you? What about our next meeting</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">1 min ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <?= Html::img('@web/images/users/user-4.jpg', ['alt' => '','class' => 'img-fluid rounded-circle']) ?>
                        </div>
                        <p class="notify-details">Karen Robinson</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Wow ! this admin looks good and awesome design</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning">
                            <i class="mdi mdi-account-plus"></i>
                        </div>
                        <p class="notify-details">New user registered.
                            <small class="text-muted">5 hours ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">4 days ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-secondary">
                            <i class="mdi mdi-heart"></i>
                        </div>
                        <p class="notify-details">Carlos Crouch liked
                            <b>Admin</b>
                            <small class="text-muted">13 days ago</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" id="dropdownMenuLink" role="button">
                <?= Html::img('@web/images/users/user-1.jpg', ['alt' => 'user-image','class' => 'rounded-circle']) ?>
                <span class="pro-user-name ml-1">
                    <?= Yii::$app->user->identity->username ?> <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="dropdownMenuLink">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Welcome !
                    </h5>
                </div>

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

                <div class="dropdown-divider"></div>

                <!-- item-->
                <?= Html::beginForm(['/site/logout'], 'post') ?>
                <button type="submit" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Salir</span>
                </button>
                <?= Html::endForm() ?>
            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
            <?= Html::img('@web/images/logo-light.png', ['alt' => '','height' => 16]) ?>
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <?= Html::img('@web/images/logo-sm.png', ['alt' => '','height' => 18]) ?>
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