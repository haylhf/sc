<?php
namespace Home\Controller;

use Think\Controller;


//Author: Li Haifeng
//2017/02/05

class AdminController extends BaseLoginController
{

    public function index()
    {
        $this->display();
    }

    public function adminMain()
    {
        $user = null;
        $currentUser = $_SESSION["user"];

        if (isset($currentUser)) {
            $user["name"] = $currentUser["name"];
            $user["id"] = $currentUser["id"];
        }
        $this->assign("adminUser", json_encode($user));
        $this->display();
    }

    public function ajaxModify()
    {
        $result = null;
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['oldPwd'];
        $data['id'] = $_POST['id'];

        $record = D("admin")->login($data);
        if ($record) {
            $data['password'] = $_POST['newPwd'];
            $result = D("admin")->modifyPassword($data);
        }

        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

    public function teacherManage()
    {
        $result = D("teacher")->getRecords();
        $this->assign("records", json_encode($result));
        $this->display();
    }
}