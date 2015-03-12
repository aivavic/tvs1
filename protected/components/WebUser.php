<?php
class WebUser extends CWebUser {
    private $_model = null;

    function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->role;
        }
    }

    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
    public function login($identity, $duration=0) {

        if(parent::login($identity, $duration)){

            $time = time();

            if(User::model()->updateByPk($this->id, array("visited" => $time))) {

            }
            return true;
        }
        return false;
    }
}