<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan_kinerja_sales".
 *
 * @property int $id_transaksi
 * @property string $tanggal
 * @property int $jumlah_terjual
 * @property int $id_target
 * @property int $id_pengguna
 *
 * @property Pengguna $pengguna
 * @property TargetPenjualanBarang $target
 */
class LaporanKinerjaSales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_kinerja_sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jumlah_terjual', 'id_target', 'id_pengguna'], 'required'],
            [['tanggal'], 'safe'],
            [['jumlah_terjual', 'id_target', 'id_pengguna'], 'integer'],
            [['id_target'], 'exist', 'skipOnError' => true, 'targetClass' => TargetPenjualanBarang::class, 'targetAttribute' => ['id_target' => 'id_target']],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::class, 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'tanggal' => 'Tanggal',
            'jumlah_terjual' => 'Jumlah Terjual',
            'id_target' => 'Id Target',
            'id_pengguna' => 'Id Pengguna',
        ];
    }

    /**
     * Gets query for [[Pengguna]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengguna()
    {
        return $this->hasOne(Pengguna::class, ['id_pengguna' => 'id_pengguna']);
    }

    /**
     * Gets query for [[Target]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarget()
    {
        return $this->hasOne(TargetPenjualanBarang::class, ['id_target' => 'id_target']);
    }
}
