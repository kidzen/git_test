<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentParent */

$this->title = 'Update Student Parent: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Student Parents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-parent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
