<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\User;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $img
 * @property string $link
 * @property integer $position
 * @property integer $user_to
 * @property string $datetime_reg
 * @property string $datetime_end
 * @property integer $views
 * @property integer $click
 * @property double $rate
 * @property integer $status
 */
class Banner extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    public function getStatus($data)
    {
        return ($data == 0) ? "Не активно":"Активно";
    }

    public function getPosition($data)
    {
        $arr = [
            'Шапка(Левый)','Шапка(Центральный)','Шапка(Правый)',
            'Слева от картинки дня(Верхний)','Слева от картинки дня(Центральный)','Слева от картинки дня(Нижний)',
            'Центр главный(Левый верхний)','Центр главный(Правый верхний)','Центр главный(Левый нижний)',
            'Центр главный(Левый нижний)','Подвал(Левый)','Подвал(Правый)','Правая колонка(Верхний)',
            'Правая колонка(Центральный)','Правая колонка(Нижний)',
            'Не главная(Левый)','Не главная(Правый)'
            ];
        return $arr[$data];
    }

    public function getUser_to($data)
    {
        $arr = ArrayHelper::map(User::find()->All(), 'id' ,'username');
        return $arr[$data];
    }

    public function UnixTime($time)
    {
        return Yii::$app->formatter->asDate($time, 'php:U');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'link', 'position', 'user_to', 'views', 'click', 'rate', 'status'], 'required'],
            [['img', 'link'], 'string'],
            [['position', 'user_to', 'views', 'click', 'status'], 'integer'],
            [['datetime_reg', 'datetime_end'], 'safe'],
            [['rate'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Изображение',
            'link' => 'Ссылка баннера',
            'position' => 'Позиция',
            'user_to' => 'Рекламодатель',
            'datetime_reg' => 'Дата начала',
            'datetime_end' => 'Дата завершения',
            'views' => 'Просмотры',
            'click' => 'Клики',
            'rate' => 'Коэфициент',
            'status' => 'Статус',
        ];
    }
}
