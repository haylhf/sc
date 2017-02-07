<?php

namespace Home\Controller;

use Think\Controller;


class BaseLoginController extends Controller
{

    public function ajaxLogin()
    {
        $result = null;
        $data['name'] = $_POST['userName'];
        $data['password'] = $_POST['userPwd'];
        $data['id'] = $_POST['userId'];
        switch ($_POST['role']) {
            case 0://admin
                $result = D("admin")->login($data);
                break;
            case 1://teacher
                $result = D("teacher")->login($data);
                break;
            case 2://student
                $result = D("student")->login($data);
                break;

        }

        if ($result) {
            $user["id"] = $result['id'];
            $user["name"] = $result['name'];
            $user["role"] = $_POST['role'];
            $_SESSION["user"] = $user;
            $this->success(true);
        } else {
            $this->error($data);
        }
    }


    public function ajaxLogout()
    {
        if ($_SESSION["user"] != null) {
            unset($_SESSION["user"]);
        }
        $this->success(true);
    }

}