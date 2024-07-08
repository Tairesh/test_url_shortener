<?php

namespace app\models;

use Yii;
use yii\base\Model;

final class LinkForm extends Model
{
    /**
     * @var string Link URL
     */
    public string $url = '';

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['url'], 'trim'],
            [['url'], 'required'],
            [['url'], 'safe'],
            [['url'], 'string', 'max' => 255],
            [['url'], 'url'],
        ];
    }
}