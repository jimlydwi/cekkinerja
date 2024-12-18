<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "target_penjualan_barang".
 *
 * @property int $id_target
 * @property int $jumlah_target
 * @property string $nm_barang
 * @property int $id_pengguna
 *
 * @property LaporanKinerjaSales[] $laporanKinerjaSales
 * @property Pengguna $pengguna
 */
class TargetPenjualanBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target_penjualan_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jumlah_target', 'nm_barang', 'id_pengguna'], 'required'],
            [['jumlah_target', 'id_pengguna'], 'integer'],
            [['nm_barang'], 'string', 'max' => 45],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::class, 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_target' => 'Id Target',
            'jumlah_target' => 'Jumlah Target',
            'nm_barang' => 'Nm Barang',
            'id_pengguna' => 'Id Pengguna',
        ];
    }

    /**
     * Gets query for [[LaporanKinerjaSales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporanKinerjaSales()
    {
        return $this->hasMany(LaporanKinerjaSales::class, ['id_target' => 'id_target']);
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
}
