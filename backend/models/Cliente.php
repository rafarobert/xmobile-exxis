<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $CardCode
 * @property string $CardName
 * @property string $CardType
 * @property string $Address
 * @property int $created_at
 * @property int $updated_at
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

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
    public function rules()
    {
        return [
            [['Address'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['CardCode'], 'string', 'max' => 15],
            [['CardName'], 'string', 'max' => 250],
            [['CardType'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CardCode' => 'Card Code',
            'CardName' => 'Card Name',
            'CardType' => 'Card Type',
            'Address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
