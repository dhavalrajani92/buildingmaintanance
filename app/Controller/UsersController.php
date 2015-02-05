<?php
class UsersController extends AppController{
    var $name = "users";
    var $uses = array("User");
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("login");
    }
    function login(){
        $this->layout = "default";
        $this->set("class_login","login_body");
        if($this->Auth->loggedIn()){
            $this->redirect(DASHBOARD_URL);
            exit;
        }

    }
    function dashboard(){
        
    }
    function logout(){
        $this->Auth->logout();
        $this->redirect("/");
        exit;
    }
}
?>