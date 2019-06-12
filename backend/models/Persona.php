<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "persona".
 *
 * @property int $idPersona
 * @property string $nombrePersona
 * @property string $apellidoPPersona
 * @property string $apellidoMPersona
 * @property int $estadoPersona
 * @property int $userId
 * @property int $created_at
 * @property int $updated_at
 */
class Persona extends \yii\db\ActiveRecord
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
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            /*[['nombrePersona', 'apellidoPPersona', 'apellidoMPersona', 'userId', 'created_at', 'updated_at'], 'required'],
            [['userId', 'created_at', 'updated_at'], 'integer'],
            [['nombrePersona', 'apellidoPPersona', 'apellidoMPersona'], 'string', 'max' => 30],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nombrePersona' => Yii::t('backend','lbl_Names'),
            'apellidoPPersona' => Yii::t('backend','lbl_LastName'),
            'apellidoMPersona' => Yii::t('backend','lbl_Mother')
        ];
    }
}
