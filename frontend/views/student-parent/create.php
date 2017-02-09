<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StudentParent */

$this->title = 'Create Student Parent';
$this->params['breadcrumbs'][] = ['label' => 'Student Parents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-parent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
