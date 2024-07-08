<?php

/** @var yii\web\View $this */
/** @var \app\models\LinkForm $model */


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Url shortener';

?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-5 text-center">

            <h1>Url shortener</h1>

            <p>Enter the URL you want to shorten:</p>

            <?php $form = ActiveForm::begin(['id' => 'url-shortener-form']); ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'autofocus' => true])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton('Create link', ['class' => 'btn btn-success']); ?>
            </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>
