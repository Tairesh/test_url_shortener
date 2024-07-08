<?php

/** @var yii\web\View $this */
/** @var string $code */

use yii\helpers\Html;

$this->title = 'Success';
$url = Yii::$app->request->hostInfo . '/h/' . $code;

?>

<div class="site-success">
    <div class="row">
        <div class="col-lg-5 text-center">
            <h1>Success!</h1>

            <p>Your shortened URL: <?=  Html::a($url, $url)?></p>

            <p><?= Html::a('Create another link', ['site/index']); ?></p>
        </div>
    </div>
</div>
