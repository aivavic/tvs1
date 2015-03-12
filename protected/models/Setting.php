<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id
 * @property integer $defaultStatusUser
 */
class Setting extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'setting';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('defaultStatusUser, defaultStatusComment, GuestComment,  useCaptcha, allowSubcommenting,  orderComments', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, defaultStatusUser, defaultStatusComment, GuestComment,  useCaptcha, allowSubcommenting,  orderComments', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'defaultStatusUser' => 'Бан пользователей по умолчанию',
            'defaultStatusComment' => 'Модерировать комментарии',
            'GuestComment' => 'Гости могут оставлять комментарии',
            'registerOnly' => 'Register Only',
            'useCaptcha' => 'Использовать капчу при комментировании',
            'allowSubcommenting' => 'Разрешить субкомментарии',
            'orderComments' => 'Order Comments',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('defaultStatusUser',$this->defaultStatusUser);
        $criteria->compare('defaultStatusComment',$this->defaultStatusComment);
        $criteria->compare('GuestComment',$this->GuestComment);
        $criteria->compare('registerOnly',$this->registerOnly);
        $criteria->compare('useCaptcha',$this->useCaptcha);
        $criteria->compare('allowSubcommenting',$this->allowSubcommenting);

        $criteria->compare('orderComments',$this->orderComments);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Setting the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {


        $file = Yii::app()->basePath . '/extensions/Configuration/config.json';
        $registerOnly = ($_POST['Setting']['GuestComment'] == 0) ? true : false ;
        $useCaptcha = ($_POST['Setting']['useCaptcha'] == 1) ? true : false ;
        $allowSubcommenting = ($_POST['Setting']['allowSubcommenting'] == 1) ? true : false ;
        $defaultStatusComment = ($_POST['Setting']['defaultStatusComment'] == 1) ? true : false ;
        $test['options'] = array(
                'registerOnly' => $registerOnly,
                'useCaptcha' => $useCaptcha,
                'allowSubcommenting' => $allowSubcommenting,
                'premoderate' => $defaultStatusComment,
                'isSuperuser' => false,
                'orderComments' => 'DESC',
            );

        file_put_contents($file, json_encode($test));
    }
}
