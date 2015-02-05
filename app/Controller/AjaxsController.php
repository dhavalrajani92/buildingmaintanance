<?php
class AjaxsController extends AppController{
    var $name = "ajaxs";
    var $uses = array("User");
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("validate_login");
    }
    function validate_login(){
        $this->layout = false;
        $response = array();
        if(!empty($this->request->data)){
            foreach($this->request->data["User"] as $key=>$value){
                $this->request->data["User"][$key] = trim(strip_tags($value));
            }   
            $this->User->set($this->request->data);
            if($this->User->validates()){
                if ($this->Auth->login()) {
                    if($this->Auth->user("status") != 1){
                        $response["msg"] = "error";
                        $response["error_info"] = "Your account is inactive. Please contact administrator for further information";
                    }else{
                        $data["User"]["id"] = $this->Auth->user("id");
                        $data["User"]["last_login"] = date("Y-m-d H:i:s");
                        $this->User->save($data["User"]);
                        $response["msg"] = "success";
                        $response["error_info"] = "";
                    }
                    
                }else{
                    $response["msg"] = "error";
                    $response["error_info"] = INVALID_LOGIN;
                }
            }else{
                $response["msg"] = "model_error";
                $response["error_info"] = $this->User->validationErrors; 
           }
        }
        echo json_encode($response);
        exit;
    }
}
?>