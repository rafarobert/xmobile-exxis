<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Persona;

/**
 * PersonaSearch represents the model behind the search form of `backend\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona', 'estadoPersona', 'userId', 'created_at', 'updated_at'], 'integer'],
            [['nombrePersona', 'apellidoPPersona', 'apellidoMPersona'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Persona::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idPersona' => $this->idPersona,
            'estadoPersona' => $this->estadoPersona,
            'userId' => $this->userId,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombrePersona', $this->nombrePersona])
            ->andFilterWhere(['like', 'apellidoPPersona', $this->apellidoPPersona])
            ->andFilterWhere(['like', 'apellidoMPersona', $this->apellidoMPersona]);

        return $dataProvider;
    }
}
