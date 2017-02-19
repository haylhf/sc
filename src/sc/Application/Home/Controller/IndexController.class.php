<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends BaseLoginController {

    public function index(){

        if ($_SESSION["user"] != null) {
            unset($_SESSION["user"]);
        }
        $this->display();
    }

}