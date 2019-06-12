<?php
use yii\helpers\Html;
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
  <div class="slimscroll-menu">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <ul class="metismenu" id="side-menu">
        <li class="menu-title">Navigation</li>
        <li>
          <a href="javascript: void(0)" aria-expanded="false">
            <i class="la la-dashboard"></i>
            <span class="menu-arrow"></span>
            <span> <?= Yii::t('backend','men_Registry')?> </span>
          </a>
          <ul class="nav-second-level" aria-expanded="false">
            <li>
              <?= Html::a('Nuevo Usuario', [ 'user/' ]) ?>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript: void(0)" aria-expanded="false">
            <i class="fas fa-sync-alt"></i>
            <span class="menu-arrow"></span>
            <span> <?= Yii::t('backend','men_Sincr')?> </span>
          </a>
          <ul class="nav-second-level" aria-expanded="false">
            <li>
              <?= Html::a('Formulario',['commons/sincronizacion']) ?>
            </li>
          </ul>
        </li>
        <li>
          <?= Html::a('<i class="fas fa-user-tag"></i><span>'.Yii::t('backend','men_Client').'</span>',Yii::$app->request->baseUrl."/cliente",[ 'aria-expanded'=>'false' ]) ?>
        </li>
        <li>
          <?= Html::a('<i class="fas fa-boxes"></i><span>'.Yii::t('backend','men_Product').'</span>',Yii::$app->request->baseUrl."/item",[ 'aria-expanded'=>'false' ]) ?>
        </li>
      </ul>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Left Sidebar End -->