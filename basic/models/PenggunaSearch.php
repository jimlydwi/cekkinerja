<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengguna;

/**
 * PenggunaSearch represents the model behind the search form of `app\models\Pengguna`.
 */
class PenggunaSearch extends Pengguna
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna'], 'integer'],
            [['nama_pengguna', 'email', 'password', 'jabatan'], 'safe'],
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
        $query = Pengguna::find();

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
            'id_pengguna' => $this->id_pengguna,
        ]);

        $query->andFilterWhere(['like', 'nama_pengguna', $this->nama_pengguna])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan]);

        return $dataProvider;
    }
}
