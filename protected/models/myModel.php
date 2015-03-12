<?php
class MyModel extends DActiveRecord {
public $id_image;

public function rules(){
return array(
array('id_image', 'DImageValidator'),
);
}

public function beforeSave()
{
foreach ($this->attributes as $key => $attribute)
if ($attribute instanceof CUploadedFile)
{
$strSource = uniqid();
if ($attribute->saveAs(Yii::getPathOfAlias('application.data.files') . '/' .  $strSource))
$this->$key = $strSource;
}
return parent::beforeSave();
}
}