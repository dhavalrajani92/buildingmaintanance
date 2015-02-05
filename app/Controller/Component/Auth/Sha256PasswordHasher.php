<?php
App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');
App::uses('Security', 'Utility');

class Sha256PasswordHasher extends AbstractPasswordHasher {

    protected $_config = array('hashType' => 'sha256');

    public function hash($password) {
        return Security::hash($password, $this->_config['hashType'], true);
    }

    public function check($password, $hashedPassword) {
        return $hashedPassword === $this->hash($password);
    }

}
?>
