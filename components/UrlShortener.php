<?php

namespace app\components;

use app\models\Link;
use yii\base\Component;

final class UrlShortener extends Component
{
    /**
     * Creates a new short link.
     *
     * @param string $url
     *
     * @return string
     *
     * @throws \Random\RandomException
     * @throws \yii\db\Exception
     */
    public function create(string $url): string
    {
        $link = new Link();
        $link->url = $url;
        $link->code = $this->createCode();
        // HACK: FIXME: If the code is not unique, try to generate a new one
        while (Link::find()->where(['code' => $link->code])->exists()) {
            $link->code = $this->createCode();
        }
        $link->save();

        return $link->code;
    }

    /**
     * TODO: Эта функция должна брать следующий свободный код из списка всех возможных кодов, отсортированного случайно. Так можно избежать бесконечного цикла.
     * Creates random 5-symbol code. Code contains only [A-Za-z0-9_-] characters.
     *
     * @return string
     *
     * @throws \Random\RandomException
     */
    private function createCode(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        $code = '';
        for ($i = 0; $i < 5; $i++) {
            $code .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $code;
    }
}
