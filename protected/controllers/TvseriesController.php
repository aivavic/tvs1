<?php

class TvseriesController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public $id_tvseries;
    public $id_genre;
    public $description = 'Tvseries';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'detail', 'newtvseries',),
                'roles' => array('guest'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
                'roles' => array('2'),
            ),

            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $subscribes = Subscribes::model();
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'subscribes' => $subscribes,
        ));
    }

    public function actionNewtvseries()
    {
        $this->render('newtvseries', array());
    }

    public function actionDetail()
    {
        //$model = new Tvseries;
        $name = $_GET['name'];

        $model = Tvseries::model()->find('name=:name', array(':name' => $name));

        $series = Tvseries::model()->with('series')->findByPk($model->id);
        $season = array();
        for ($i = 0; $i < count($series['series']); $i++) {
            $season[$i] = $series['series'][$i]['id_season'];
        }


        for ($j = 1; $j <= max($season); $j++) {
            $criteria = new CDbCriteria;
            $criteria->condition = 'id_tvseries=:id_tvseries AND id_season=:id_season';
            $criteria->params = array(':id_tvseries' => $model->id, ':id_season' => $j);
            $data = Series::model()->findAll($criteria);

            $tabs['Сезон' . $j] = array(
                'id' => 'tab' . $j,
                'content' => $this->renderPartial('_series',
                    array(
                        'id_season' => $j,
                        'model' => $model,
                        'data' => $data
                    ), TRUE
                )
            );
        }



        $actors = Tvseries::model()->with('actor')->findByPk($model->id);

        $actor = ($actors['actor']);


        $this->render('detail', [
            'model' => $model,
            'tabs' => $tabs,
            'actor' => $actor,

        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.

     */


    public function actionCreate()
    {




       $model = new Tvseries;

echo '<pre>';
var_dump($_POST);
echo '</pre>';
//        // Uncomment the following line if AJAX validation is needed
     $this->performAjaxValidation($model);
//
//        if (isset($_POST['Tvseries'])) {
//            $rnd = rand(0, 9999);
//            $model->attributes = $_POST['Tvseries'];
//            //$model->image=CUploadedFile::getInstance($model,'image');
//            $uploadedFile = CUploadedFile::getInstance($model, 'image');
//            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//            $model->image = $fileName;
//
//            if ($model->save()) {
//                if ($model->image !== null) {
//                    $path = Yii::getPathOfAlias('webroot') . '/upload/' . $model->image;
//                    //$model->image->saveAs($path);
//                    $uploadedFile->saveAs($path);
//                }
//                $this->redirect(array('view', 'id' => $model->id));
//            }
//        }
        $this->render('create', array(
            'model' => $model, 'data' => $data
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        var_dump($model->image);
        if (isset($_POST['Tvseries'])) {
            $rnd = rand(0, 9999);
            $model->attributes = $_POST['Tvseries'];
            //$model->image=CUploadedFile::getInstance($model,'image');
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
            if ($model->save()) {
                if ($model->image !== null) {
                    $path = Yii::getPathOfAlias('webroot') . '/upload/' . $model->image;
                    $uploadedFile->saveAs($path);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {

        if (($_POST['id_subscribes'] != '') && (Yii::app()->user->id != "")) {
            $post_id = $_POST['id_subscribes'];
            $user_id = Yii::app()->user->id;

            $phone = 0;
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
            }
            $email = 0;
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            $criteria = new CDbCriteria;
            $criteria->condition = 'id_tvseries=:id_tvseries AND id_user=:id_user';
            $criteria->params = array(':id_tvseries' => $post_id, ':id_user' => $user_id);

            if (!Subscribes::model()->exists($criteria)) {
                $connection = Yii::app()->db;
                $connection->createCommand("insert into subscribes (id_tvseries,id_user, phone, email) values (:a, :b, :c, :d)")->execute(array(':a' => $post_id, ':b' => $user_id, ':c' => $phone, ':d' => $email));
                Yii::app()->user->setFlash('subscribes', 'Подписка создана.');
            } else {
                Yii::app()->user->setFlash('subscribes', 'Вы уже подписаны на этот сериал.');
            }
        }

        if (($_POST['id_favorites'] != '') && (Yii::app()->user->id != "")) {
            $post_id = $_POST['id_favorites'];
            $user_id = Yii::app()->user->id;
            $criteria = new CDbCriteria;
            $criteria->condition = 'id_tvseries=:id_tvseries AND id_user=:id_user';
            $criteria->params = array(':id_tvseries' => $post_id, ':id_user' => $user_id);
            if (!Favorites::model()->exists($criteria)) {
                $connection = Yii::app()->db;
                $connection->createCommand("insert into favorites (id_tvseries,id_user) values (:a, :b)")->execute(array(':a' => $post_id, ':b' => $user_id));
                Yii::app()->user->setFlash('favorites', 'Сериал добавлен в избранное.');
            } else {
                Yii::app()->user->setFlash('favorites', 'Сериал уже добавлен в избранное.');
            }
        }

        $dataProvider = new CActiveDataProvider('Tvseries', array(
            'pagination' => array(
                'pageSize' => 6,
            ),
            'sort' => array(
                //атрибуты по которым происходит сортировка
                'attributes' => array(
                    'name' => array(
                        'asc' => 'name ASC',
                        'desc' => 'name DESC',
                        //по умолчанию, сортируем поле rating по убыванию (desc)
                        'default' => 'desc',
                    ),
                    'imdbRating' => array(
                        'asc' => 'imdbRating ASC',
                        'desc' => 'imdbRating DESC',
                        'default' => 'desc',
                    ),
                    'Date' => array(
                        'asc' => 'Date ASC',
                        'desc' => 'Date DESC',
                        'default' => 'desc',
                    )
                ),
                /** После того, как будет загружена страница с виджетом,
                 * сортировка будет происходить по этому параметру.
                 * Если указан defaultOrder, то задается стиль для атрибута, по которому происходит сортировка.
                 * В данном случае у created_at будет class="desc".
                 */
                'defaultOrder' => array(
                    'created_at' => CSort::SORT_DESC,
                )
            ),
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Tvseries('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Tvseries']))
            $model->attributes = $_GET['Tvseries'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Tvseries the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Tvseries::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


    /**
     * Performs the AJAX validation.
     * @param Tvseries $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tvseries-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
