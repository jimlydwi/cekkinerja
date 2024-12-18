<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TargetPenjualanBarang;

/**
 * TargetPenjualanBarangSearch represents the model behind the search form of `app\models\TargetPenjualanBarang`.
 */
class TargetPenjualanBarangSearch extends TargetPenjualanBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_target', 'jumlah_target', 'id_pengguna'], 'integer'],
            [['nm_barang'], 'safe'],
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
        $query = TargetPenjualanBarang::find();

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
            'id_target' => $this->id_target,
            'jumlah_target' => $this->jumlah_target,
            'id_pengguna' => $this->id_pengguna,
        ]);

        $query->andFilterWhere(['like', 'nm_barang', $this->nm_barang]);

        return $dataProvider;
    }
}
