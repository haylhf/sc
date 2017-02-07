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

    public function assignUser()
    {
        $this->assign("currentuser", json_encode($_SESSION["user"]));
    }

    public function adminMain()
    {
        $user = null;

        if (isset($currentUser)) {
            $user["name"] = parent::$currentuser["name"];
            $user["id"] = parent::$currentuser["id"];
        }
        $this->assign("adminUser", json_encode($user));
        $this->assignUser();
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
        $this->assignUser();
        $this->display();
    }

    public function ajaxDelete()
    {
        $condition['id'] = $_POST['id'];
        if ($condition['id']) {
            $result = D("teacher")->deleteRecord($condition);
        }
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }

    public function ajaxAdd()
    {
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $result = D("teacher")->add($data);
        if ($result) {
            $this->success(true);
        } else {
            $this->error(false);
        }
    }
}