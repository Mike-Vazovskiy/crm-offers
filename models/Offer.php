<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $created_at
 */
class Offer extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required', "message" => "Поле обязательно для заполнения"],
            [['created_at'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['email'], 'email', 'message' => 'Введите корректный email адрес.'],
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название оффера',
            'email' => 'Email представителя',
            'phone' => 'Телефон представителя',
            'created_at' => 'Дата добавления',
        ];
    }
}
