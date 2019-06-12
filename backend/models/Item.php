<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "items".
 *
 * @property string $ItemCode
 * @property string $ItemName
 * @property string $ForeignName
 * @property int $ItemsGroupCode
 * @property int $QuantityOnStock
 * @property string $SalesUnit
 * @property int $created_at
 * @property int $updated_at
 */
class Item extends \yii\db\ActiveRecord
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
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemCode', 'created_at', 'updated_at'], 'required'],
            [['ItemsGroupCode', 'QuantityOnStock', 'created_at', 'updated_at'], 'integer'],
            [['ItemCode'], 'string', 'max' => 20],
            [['ItemName', 'SalesUnit'], 'string', 'max' => 100],
            [['ForeignName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ItemCode' => Yii::t('backend','lbl_ItemCode'),
            'ItemName' => Yii::t('backend','lbl_ItemName'),
            'ForeignName' => Yii::t('backend','lbl_ForeignName'),
            'ItemsGroupCode' => Yii::t('backend','lbl_ItemGroup'),
            'QuantityOnStock' => Yii::t('backend','lbl_Stock'),
            'SalesUnit' => 'Sales Unit',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
