<?php
App::uses('Sha256PasswordHasher', 'Controller/Component/Auth');
class User extends AppModel{
    var $name = "User";
    var $useTable = "users";
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new Sha256PasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
            unset($passwordHasher);
        }
        return true;
    }
    public $validate = array(
        'email' => array(
            "required"=>array(
                'rule' => array('notEmpty'),
                'message' => ENTER_EMAIL
            ),
            'email' => array(
                'rule' => 'email',
                'message' => ENTER_VALID_EMAIL
            )
        ),
        "password"=>array(
           "required"=>array(
                'rule' => array('notEmpty'),
                'message' => ENTER_PASSWORD
            ) 
        )
    );
}
?>

