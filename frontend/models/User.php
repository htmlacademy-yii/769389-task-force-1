<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $birthday
 * @property string|null $phone
 * @property string|null $skype
 * @property string|null $telegram
 * @property string $about
 * @property string $password
 * @property int $city_id
 * @property int $role_id
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'birthday', 'about', 'password', 'city_id', 'role_id'], 'required'],
            [['birthday'], 'safe'],
            [['about'], 'string'],
            [['city_id', 'role_id'], 'integer'],
            [['name', 'email', 'phone', 'skype', 'telegram'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'birthday' => 'Birthday',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'telegram' => 'Telegram',
            'about' => 'About',
            'password' => 'Password',
            'city_id' => 'City ID',
            'role_id' => 'Role ID',
        ];
    }
}
