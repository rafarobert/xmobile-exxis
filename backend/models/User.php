<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property string $plataformaUsuario
 * @property int $estadoUsuario
 * @property string $plataformaPlataforma
 * @property string $plataformaEmei
 * @property int $personaId
 */
class User extends \yii\db\ActiveRecord
{
     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

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
            /*[['username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'estadoUsuario'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'plataformaPlataforma', 'plataformaEmei'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['plataformaUsuario'], 'string', 'max' => 2],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend','tbl_UserId'),
            'username' => Yii::t('backend','lbl_User'),
            'password_hash' => Yii::t('backend','lbl_UserPass'),
            'plataformaUsuario' => Yii::t('backend','lbl_UserPlatform'),
            'plataformaPlataforma' => Yii::t('backend','lbl_Platform'),
            'plataformaEmei' => Yii::t('backend','lbl_UserEmei'),
        ];
    }
}
