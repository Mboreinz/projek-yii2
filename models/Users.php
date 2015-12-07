<?php
    namespace app\models;

    use yii\db\ActiveRecord;

    class Users extends ActiveRecord{

        public static function tableName(){
            return 'users';
        }

        public function rules(){
            return [
                [['username', 'password', 'id_pegawai'], 'required'],
                [['username'], 'string'],
                [['password'], 'string'],
                [['id_pegawai'], 'integer']
            ];
        }

        public function attributeLabels(){
            return [
                'id_pegawai' => 'User Id',
                'username' => 'User',
                'password' => 'Password',
            ];
        }

    }
?>