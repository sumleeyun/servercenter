<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>
<div class="row">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div>