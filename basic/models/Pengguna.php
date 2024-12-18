<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Pengguna extends ActiveRecord implements IdentityInterface
{
    /**
     * Tentukan email tabel database yang akan digunakan
     */
    public static function tableName()
    {
        return 'pengguna'; // Sesuaikan dengan email tabel di database Anda
    }

    /**
     * Menemukan user berdasarkan id_pengguna
     *
     * {@inheritdoc}
     */
    public static function findIdentity($id_pengguna)
    {
        return static::findOne(['id_pengguna' => $id_pengguna]);
    }

    /**
     * Menemukan user berdasarkan token akses (tidak digunakan di sini)
     *
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Implementasikan jika menggunakan token akses
    }

    /**
     * Menemukan user berdasarkan email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * Mendapatkan id_pengguna pengguna
     *
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_pengguna;
    }

    /**
     * Mendapatkan authKey (tidak digunakan di sini)
     *
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null; // Implementasikan jika menggunakan authKey
    }

    /**
     * Validasi authKey (tidak digunakan di sini)
     *
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false; // Implementasikan jika menggunakan authKey
    }

    /**
     * Memvalidasi password
     *
     * @param string $password
     * @return bool apakah password valid
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
