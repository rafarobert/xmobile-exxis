<?php

namespace backend\models;

use Yii;

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
            [['nombrePersona', 'apellidoPPersona', 'apellidoMPersona', 'userId', 'created_at', 'updated_at'], 'required'],
            [['estadoPersona', 'userId', 'created_at', 'updated_at'], 'integer'],
            [['nombrePersona', 'apellidoPPersona', 'apellidoMPersona'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'nombrePersona' => 'Nombre Persona',
            'apellidoPPersona' => 'Apellido P Persona',
            'apellidoMPersona' => 'Apellido M Persona',
            'estadoPersona' => 'Estado Persona',
            'userId' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
