<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Item;

/**
 * ItemSearch represents the model behind the search form of `backend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemCode', 'ItemName', 'ForeignName', 'SalesUnit'], 'safe'],
            [['ItemsGroupCode', 'QuantityOnStock', 'created_at', 'updated_at', 'id'], 'integer'],
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
        $query = Item::find();

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
            'ItemsGroupCode' => $this->ItemsGroupCode,
            'QuantityOnStock' => $this->QuantityOnStock,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'ItemCode', $this->ItemCode])
            ->andFilterWhere(['like', 'ItemName', $this->ItemName])
            ->andFilterWhere(['like', 'ForeignName', $this->ForeignName])
            ->andFilterWhere(['like', 'SalesUnit', $this->SalesUnit]);

        return $dataProvider;
    }
}
