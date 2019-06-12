<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Nuevo Pedido';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/select2/select2.min.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/datatables/dataTables.bootstrap4.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/rwd-table/rwd-table.min.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/datatables/responsive.bootstrap4.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/datatables/buttons.bootstrap4.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/datatables/select.bootstrap4.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Pedido</a></li>
          <li class="breadcrumb-item active"><?= $this->title ?></li>
        </ol>
      </div>
      <h4 class="page-title"><?= $this->title ?></h4>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <button class="btn btn-success btn-lg pull-right waves-effect waves-light" data-toggle="modal" data-target="#cliente"><i class="fas fa-plus"></i>&nbsp;Agregar Cliente</button>
      </div>
      <div class="card-body" style="display:none">
        <div class="row">
          <div class="col-md-12">
            <form id="frm-cabecera">
              <div class="form-group row">
                <label for="cardCode" class="col-sm-2 col-form-label">Codigo: </label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="cardCode" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Nombre: </label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="cardName" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Direccion: </label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="address" value="">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button class="btn btn-success btn-lg pull-right waves-effect waves-light mb-3" data-toggle="modal" data-target="#producto"><i class="fas fa-plus"></i>&nbsp;Agregar Producto</button>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                  <div class="table-responsive" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th data-priority="1">Last Trade</th>
                          <th data-priority="3">Trade Time</th>
                          <th data-priority="1">Change</th>
                          <th data-priority="3">Prev Close</th>
                          <th data-priority="3">Open</th>
                          <th data-priority="6">Bid</th>
                          <th data-priority="6">Ask</th>
                          <th data-priority="6">1y Target Est</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>GOOG <span class="co-name">Google Inc.</span></th>
                          <td>597.74</td>
                          <td>12:12PM</td>
                          <td>14.81 (2.54%)</td>
                          <td>582.93</td>
                          <td>597.95</td>
                          <td>597.73 x 100</td>
                          <td>597.91 x 300</td>
                          <td>731.10</td>
                        </tr>
                        <tr>
                          <th>AAPL <span class="co-name">Apple Inc.</span></th>
                          <td>378.94</td>
                          <td>12:22PM</td>
                          <td>5.74 (1.54%)</td>
                          <td>373.20</td>
                          <td>381.02</td>
                          <td>378.92 x 300</td>
                          <td>378.99 x 100</td>
                          <td>505.94</td>
                        </tr>
                        <tr>
                          <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                          <td>191.55</td>
                          <td>12:23PM</td>
                          <td>3.16 (1.68%)</td>
                          <td>188.39</td>
                          <td>194.99</td>
                          <td>191.52 x 300</td>
                          <td>191.58 x 100</td>
                          <td>240.32</td>
                        </tr>
                        <tr>
                          <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                          <td>31.15</td>
                          <td>12:44PM</td>
                          <td>1.41 (4.72%)</td>
                          <td>29.74</td>
                          <td>30.67</td>
                          <td>31.14 x 6500</td>
                          <td>31.15 x 3200</td>
                          <td>36.11</td>
                        </tr>
                        <tr>
                          <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                          <td>25.50</td>
                          <td>12:27PM</td>
                          <td>0.66 (2.67%)</td>
                          <td>24.84</td>
                          <td>25.37</td>
                          <td>25.50 x 71100</td>
                          <td>25.51 x 17800</td>
                          <td>31.50</td>
                        </tr>
                        <tr>
                          <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                          <td>18.65</td>
                          <td>12:45PM</td>
                          <td>0.97 (5.49%)</td>
                          <td>17.68</td>
                          <td>18.23</td>
                          <td>18.65 x 10300</td>
                          <td>18.66 x 24000</td>
                          <td>21.12</td>
                        </tr>
                        <tr>
                          <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                          <td>15.81</td>
                          <td>12:25PM</td>
                          <td>0.11 (0.67%)</td>
                          <td>15.70</td>
                          <td>15.94</td>
                          <td>15.79 x 6100</td>
                          <td>15.80 x 17000</td>
                          <td>18.16</td>
                        </tr>
                        <!-- Repeat -->
                        <tr>
                          <th>GOOG <span class="co-name">Google Inc.</span></th>
                          <td>597.74</td>
                          <td>12:12PM</td>
                          <td>14.81 (2.54%)</td>
                          <td>582.93</td>
                          <td>597.95</td>
                          <td>597.73 x 100</td>
                          <td>597.91 x 300</td>
                          <td>731.10</td>
                        </tr>
                        <tr>
                          <th>AAPL <span class="co-name">Apple Inc.</span></th>
                          <td>378.94</td>
                          <td>12:22PM</td>
                          <td>5.74 (1.54%)</td>
                          <td>373.20</td>
                          <td>381.02</td>
                          <td>378.92 x 300</td>
                          <td>378.99 x 100</td>
                          <td>505.94</td>
                        </tr>
                        <tr>
                          <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                          <td>191.55</td>
                          <td>12:23PM</td>
                          <td>3.16 (1.68%)</td>
                          <td>188.39</td>
                          <td>194.99</td>
                          <td>191.52 x 300</td>
                          <td>191.58 x 100</td>
                          <td>240.32</td>
                        </tr>
                        <tr>
                          <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                          <td>31.15</td>
                          <td>12:44PM</td>
                          <td>1.41 (4.72%)</td>
                          <td>29.74</td>
                          <td>30.67</td>
                          <td>31.14 x 6500</td>
                          <td>31.15 x 3200</td>
                          <td>36.11</td>
                        </tr>
                        <tr>
                          <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                          <td>25.50</td>
                          <td>12:27PM</td>
                          <td>0.66 (2.67%)</td>
                          <td>24.84</td>
                          <td>25.37</td>
                          <td>25.50 x 71100</td>
                          <td>25.51 x 17800</td>
                          <td>31.50</td>
                        </tr>
                        <tr>
                          <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                          <td>18.65</td>
                          <td>12:45PM</td>
                          <td>0.97 (5.49%)</td>
                          <td>17.68</td>
                          <td>18.23</td>
                          <td>18.65 x 10300</td>
                          <td>18.66 x 24000</td>
                          <td>21.12</td>
                        </tr>
                        <tr>
                          <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                          <td>15.81</td>
                          <td>12:25PM</td>
                          <td>0.11 (0.67%)</td>
                          <td>15.70</td>
                          <td>15.94</td>
                          <td>15.79 x 6100</td>
                          <td>15.80 x 17000</td>
                          <td>18.16</td>
                        </tr>
                        <!-- Repeat -->
                        <tr>
                          <th>GOOG <span class="co-name">Google Inc.</span></th>
                          <td>597.74</td>
                          <td>12:12PM</td>
                          <td>14.81 (2.54%)</td>
                          <td>582.93</td>
                          <td>597.95</td>
                          <td>597.73 x 100</td>
                          <td>597.91 x 300</td>
                          <td>731.10</td>
                        </tr>
                        <tr>
                          <th>AAPL <span class="co-name">Apple Inc.</span></th>
                          <td>378.94</td>
                          <td>12:22PM</td>
                          <td>5.74 (1.54%)</td>
                          <td>373.20</td>
                          <td>381.02</td>
                          <td>378.92 x 300</td>
                          <td>378.99 x 100</td>
                          <td>505.94</td>
                        </tr>
                        <tr>
                          <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                          <td>191.55</td>
                          <td>12:23PM</td>
                          <td>3.16 (1.68%)</td>
                          <td>188.39</td>
                          <td>194.99</td>
                          <td>191.52 x 300</td>
                          <td>191.58 x 100</td>
                          <td>240.32</td>
                        </tr>
                        <tr>
                          <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                          <td>31.15</td>
                          <td>12:44PM</td>
                          <td>1.41 (4.72%)</td>
                          <td>29.74</td>
                          <td>30.67</td>
                          <td>31.14 x 6500</td>
                          <td>31.15 x 3200</td>
                          <td>36.11</td>
                        </tr>
                        <tr>
                          <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                          <td>25.50</td>
                          <td>12:27PM</td>
                          <td>0.66 (2.67%)</td>
                          <td>24.84</td>
                          <td>25.37</td>
                          <td>25.50 x 71100</td>
                          <td>25.51 x 17800</td>
                          <td>31.50</td>
                        </tr>
                        <tr>
                          <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                          <td>18.65</td>
                          <td>12:45PM</td>
                          <td>0.97 (5.49%)</td>
                          <td>17.68</td>
                          <td>18.23</td>
                          <td>18.65 x 10300</td>
                          <td>18.66 x 24000</td>
                          <td>21.12</td>
                        </tr>
                        <tr>
                          <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                          <td>15.81</td>
                          <td>12:25PM</td>
                          <td>0.11 (0.67%)</td>
                          <td>15.70</td>
                          <td>15.94</td>
                          <td>15.79 x 6100</td>
                          <td>15.80 x 17000</td>
                          <td>18.16</td>
                        </tr>
                        <!-- Repeat -->
                        <tr>
                          <th>GOOG <span class="co-name">Google Inc.</span></th>
                          <td>597.74</td>
                          <td>12:12PM</td>
                          <td>14.81 (2.54%)</td>
                          <td>582.93</td>
                          <td>597.95</td>
                          <td>597.73 x 100</td>
                          <td>597.91 x 300</td>
                          <td>731.10</td>
                        </tr>
                        <tr>
                          <th>AAPL <span class="co-name">Apple Inc.</span></th>
                          <td>378.94</td>
                          <td>12:22PM</td>
                          <td>5.74 (1.54%)</td>
                          <td>373.20</td>
                          <td>381.02</td>
                          <td>378.92 x 300</td>
                          <td>378.99 x 100</td>
                          <td>505.94</td>
                        </tr>
                        <tr>
                          <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                          <td>191.55</td>
                          <td>12:23PM</td>
                          <td>3.16 (1.68%)</td>
                          <td>188.39</td>
                          <td>194.99</td>
                          <td>191.52 x 300</td>
                          <td>191.58 x 100</td>
                          <td>240.32</td>
                        </tr>
                        <tr>
                          <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                          <td>31.15</td>
                          <td>12:44PM</td>
                          <td>1.41 (4.72%)</td>
                          <td>29.74</td>
                          <td>30.67</td>
                          <td>31.14 x 6500</td>
                          <td>31.15 x 3200</td>
                          <td>36.11</td>
                        </tr>
                        <tr>
                          <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                          <td>25.50</td>
                          <td>12:27PM</td>
                          <td>0.66 (2.67%)</td>
                          <td>24.84</td>
                          <td>25.37</td>
                          <td>25.50 x 71100</td>
                          <td>25.51 x 17800</td>
                          <td>31.50</td>
                        </tr>
                        <tr>
                          <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                          <td>18.65</td>
                          <td>12:45PM</td>
                          <td>0.97 (5.49%)</td>
                          <td>17.68</td>
                          <td>18.23</td>
                          <td>18.65 x 10300</td>
                          <td>18.66 x 24000</td>
                          <td>21.12</td>
                        </tr>
                        <tr>
                          <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                          <td>15.81</td>
                          <td>12:25PM</td>
                          <td>0.11 (0.67%)</td>
                          <td>15.70</td>
                          <td>15.94</td>
                          <td>15.79 x 6100</td>
                          <td>15.80 x 17000</td>
                          <td>18.16</td>
                        </tr>
                        <!-- Repeat -->
                        <tr>
                          <th>GOOG <span class="co-name">Google Inc.</span></th>
                          <td>597.74</td>
                          <td>12:12PM</td>
                          <td>14.81 (2.54%)</td>
                          <td>582.93</td>
                          <td>597.95</td>
                          <td>597.73 x 100</td>
                          <td>597.91 x 300</td>
                          <td>731.10</td>
                        </tr>
                        <tr>
                          <th>AAPL <span class="co-name">Apple Inc.</span></th>
                          <td>378.94</td>
                          <td>12:22PM</td>
                          <td>5.74 (1.54%)</td>
                          <td>373.20</td>
                          <td>381.02</td>
                          <td>378.92 x 300</td>
                          <td>378.99 x 100</td>
                          <td>505.94</td>
                        </tr>
                        <tr>
                          <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                          <td>191.55</td>
                          <td>12:23PM</td>
                          <td>3.16 (1.68%)</td>
                          <td>188.39</td>
                          <td>194.99</td>
                          <td>191.52 x 300</td>
                          <td>191.58 x 100</td>
                          <td>240.32</td>
                        </tr>
                        <tr>
                          <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                          <td>31.15</td>
                          <td>12:44PM</td>
                          <td>1.41 (4.72%)</td>
                          <td>29.74</td>
                          <td>30.67</td>
                          <td>31.14 x 6500</td>
                          <td>31.15 x 3200</td>
                          <td>36.11</td>
                        </tr>
                        <tr>
                          <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                          <td>25.50</td>
                          <td>12:27PM</td>
                          <td>0.66 (2.67%)</td>
                          <td>24.84</td>
                          <td>25.37</td>
                          <td>25.50 x 71100</td>
                          <td>25.51 x 17800</td>
                          <td>31.50</td>
                        </tr>
                        <tr>
                          <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                          <td>18.65</td>
                          <td>12:45PM</td>
                          <td>0.97 (5.49%)</td>
                          <td>17.68</td>
                          <td>18.23</td>
                          <td>18.65 x 10300</td>
                          <td>18.66 x 24000</td>
                          <td>21.12</td>
                        </tr>
                        <tr>
                          <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                          <td>15.81</td>
                          <td>12:25PM</td>
                          <td>0.11 (0.67%)</td>
                          <td>15.70</td>
                          <td>15.94</td>
                          <td>15.79 x 6100</td>
                          <td>15.80 x 17000</td>
                          <td>18.16</td>
                        </tr>
                      </tbody>
                    </table>
                  </div> <!-- end .table-responsive -->

                </div> <!-- end .table-rep-plugin-->
            </div> <!-- end .responsive-table-plugin-->
          </div> <!-- end col -->
        </div>
      </div>
    </div>
  </div>
</div>
<div id="cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Busqueda de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body p-4">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="nombre" class="control-label">Nombre:</label>
              <select name="nombre" id="nombre" class="form-control" style="width: 100%">
                <option value="">Seleccione...</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info waves-effect waves-light" id="btn-aceptar">Aceptar</button>
      </div>
    </div>
  </div>
</div><!-- /.modal -->
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/select2/select2.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/js/pedido/es.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/rwd-table/rwd-table.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/jquery.dataTables.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/dataTables.bootstrap4.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/dataTables.responsive.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/responsive.bootstrap4.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/dataTables.buttons.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/buttons.bootstrap4.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/buttons.html5.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/datatables/buttons.print.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/pdfmake/pdfmake.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/pdfmake/vfs_fonts.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/js/pedido/nuevo.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>