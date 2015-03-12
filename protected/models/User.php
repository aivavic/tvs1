<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $user_role_id
 *
 * The followings are the available model relations:
 * @property UserRole $userRole
 */
class User extends CActiveRecord
{
    const ROLE_ADMIN = '2';
    const ROLE_USER = '1';
    const ROLE_BANNED = 'banned';
    public $verifyCode;

    public function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return array(
            array('username, password, email', 'required'),
            array('username, email', 'unique', ),
            array('role, ban, created, visited, gender,', 'numerical', 'integerOnly' => true),
            array('email', 'email'),
            array('username', 'match', 'pattern' => '/^([A-Za-z0-9 ]+)$/u', 'message' => 'Допустимые символы A-Za-z0-9 .'),
            array('username, email,', 'length', 'max' => 128),

            array('password', 'length', 'max' => 64),
            array('avatar', 'file', 'types' => 'jpg, gif, png'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'registration'),
            array('id, username, password, email,  ban, created, visited, gender, avatar, dob', 'safe', 'on' => 'search'),

        );
    }

    public function relations()
    {
        return array(
            'gender_' => array(self::BELONGS_TO, 'Gender', 'gender'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => "Логин",
            'password' => "Пароль",
            'email' => "Email",
            'role' => "Права",
            'avatar' => 'Изображение',
            'ban' => 'Бан',
            'created' => 'Дата регистрации',
            'visited' => 'Дата последнего визита',
            'gender' => 'Пол',
            'dob' => 'Дата рождения',
            'verifyCode' => 'Код с картинки'
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('created', $this->created);
        $criteria->compare('ban', $this->ban);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('avatar', $this->avatar, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }


    protected function beforeSave()
    {


        $uploadedFile = CUploadedFile::getInstance($this, 'avatar');
        $rnd = rand(0, 9999);
        $fileName = "{$rnd}-{$uploadedFile}";
        $this->avatar = $fileName;

        if ($this->avatar !== null) {
            $path = Yii::getPathOfAlias('webroot') . '/upload/userPhoto/' . $this->avatar;

            $uploadedFile->saveAs($path);


        }

$this->dob = $_POST['User']['dob'];


        if ($this->isNewRecord) {
            $this->role = 1;
            $this->created = time();
        }
        $this->password = md5('SecretWord' . $this->password);
        return parent::beforeSave();
    }

    protected function afterSave()
    {


    }
}
