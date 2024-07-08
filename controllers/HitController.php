<?php

namespace app\controllers;

use app\models\Link;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

final class HitController extends Controller
{
    /**
     * @param string $code
     *
     * @return Response
     *
     * @throws NotFoundHttpException
     */
    public function actionIndex(string $code): Response
    {
        $link = Link::findOne(['code' => $code]);

        if ($link === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->redirect($link->url);
    }
}