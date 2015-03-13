<?php

/**
 * This is the model class for table "tvseries".
 *
 * The followings are the available columns in table 'tvseries':
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Tvseries extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public $name;

    public function tableName()
    {
        return 'tvseries';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, imdbRating, imdbVotes', 'required'),
            array('name', 'length', 'max' => 255),
            array('id_tvseries, id_user, active, subscribes', 'numerical', 'integerOnly' => true),
            array('description', 'length', 'max' => 10000),
            array('Country', 'length', 'max' => 100),
            array('Date', 'length', 'max' => 255),
            array('image', 'file', 'types' => 'jpg, gif, png'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('name, description, Country, id_tvseries, active, id_user', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'genre' => array(self::MANY_MANY, 'Genre', 'tvseries_genre(id_tvseries, id_genre)'),
            'series' => array(self::HAS_MANY, 'Series', 'id_tvseries'),
            'actor' => array(self::MANY_MANY, 'Actor', 'actor_tvseries(id_series, id_actor)')

        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'Country' => 'Страна',
            'Genre' => "Жанр",
            'Date' => 'Год выпуска',
            'image' => 'Image',
            'imdbRating' => 'Рейтинг',
            'imdbVotes' => 'Проголосовало',
            'id_tvseries' => 'Id Tvseries',
            'id_genre' => 'Id Genre',
        );
    }

    protected function afterSave()
    {
        parent::afterSave();
        if ($this->isNewRecord) {
            $arr_id_genres = $_POST['Tvseries']['id'];
            foreach ($arr_id_genres as $arr_id_genre) {
                $tvs_genre = new TvseriesGenre();
                $tvs_genre->id_tvseries = $this->id;
                $tvs_genre->id_genre = $arr_id_genre;
                $tvs_genre->save();
            }

        } else {
            // иначе неободимо обновить данные в таблице жанров
            TvseriesGenre::model()->updateAll(array(
                'id_tvseries' => $this->id,
                'id_genre' => $_POST['Tvseries']['id'],

            ), 'id_tvseries=:id_tvseries', array(':id_tvseries' => $this->id));
        }
    }

    protected function beforeSave()
    {

    }


////добавление окончено

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
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image', $this->image, true);
        $criteria->with = array('genre');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAttributs()
    {

        return array(
            'name' => $this->id,
        );
    }

    public function scopes()
    {
        return array(
            'recently' => array(
                'limit' => 6,
                'order' => "RAND()",
            ),

        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tvseries the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function lastseries($limit=6)
    {
        $this->getDbCriteria()->mergeWith(array(
            'order'=>'Date DESC',
            'limit'=>$limit,
        ));
        return $this;
    }
}
