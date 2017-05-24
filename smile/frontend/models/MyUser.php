<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "my_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $mobile
 * @property integer $sex
 * @property string $final_ip
 * @property string $final_time
 */
class MyUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'sex'], 'integer'],
            [['final_time'], 'safe'],
            [['username'], 'string', 'max' => 10],
            [['password', 'final_ip'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'sex' => 'Sex',
            'final_ip' => 'Final Ip',
            'final_time' => 'Final Time',
        ];
    }

    /**
     * 登录验证查询
     * @param $where
     * @param $user
     * @param $pwd
     * @return array|null|\yii\db\ActiveRecord
     */
    public function login($where, $user, $pwd)
    {
        return $this->find()->where(" $where = :user",[':user'=>$user])->andWhere("password = :pwd",[':pwd'=>$pwd])->asArray()->one();
    }

    /**
     * 登陆成功修改信息
     * @param $data
     * @param $id
     * @return int
     */
    public function loginDO($data, $id)
    {
        return $this->updateAll($data,['id'=> $id]);
    }

    /**
     * @param $data
     * @return bool
     */
    public function register($data)
    {
        $this->setAttributes($data) ;
        return $this->insert();
    }

    /**
     * @param $where
     * @param $data
     * @return array|null|\yii\db\ActiveRecord
     */
    public function only($where,$data)
    {
        return $this->find()->select('id')->where(" $where = :user",[':user'=>$data])->asArray()->one();
    }
}
