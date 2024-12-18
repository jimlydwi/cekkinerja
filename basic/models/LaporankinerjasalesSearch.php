<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Laporankinerjasales;

/**
 * LaporankinerjasalesSearch represents the model behind the search form of `app\models\Laporankinerjasales`.
 */
class LaporankinerjasalesSearch extends Laporankinerjasales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'jumlah_terjual', 'id_target', 'id_pengguna'], 'integer'],
            [['tanggal'], 'safe'],
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
        $query = Laporankinerjasales::find();

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
            'id_transaksi' => $this->id_transaksi,
            'tanggal' => $this->tanggal,
            'jumlah_terjual' => $this->jumlah_terjual,
            'id_target' => $this->id_target,
            'id_pengguna' => $this->id_pengguna,
        ]);

        return $dataProvider;
    }
}
