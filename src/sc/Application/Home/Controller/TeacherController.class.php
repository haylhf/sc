<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-09
 * Time: 18:40
 */

namespace Home\Controller;


class TeacherController extends BaseLoginController
{
    public function index()
    {
        $user = null;
        $currentUser = $_SESSION["user"];
        //islogin
        if (isset($currentUser)) {
            $user = D("teacher")->getRecords($currentUser);
        }
        if (count($user) > 0) {
            $this->assign("teacherUser", json_encode($user[0]));
        }
        $this->assignUser();
        $this->display();
    }

    public function assignUser()
    {
        $this->assign("currentuser", json_encode($_SESSION["user"]));
    }

    public function teacherCourse()
    {
        $this->assignUser();
        $this->display();
    }

    public function ajaxModifyPwd()
    {
        $result = null;
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['oldPwd'];
        $data['id'] = $_POST['id'];

        $record = D("teacher")->login($data);
        if ($record) {
            $data['password'] = $_POST['newPwd'];
            $result = D("teacher")->modifyInfo($data);
        }

        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }


    public function ajaxModifyInfo()
    {
        $result = null;
        $result = D("teacher")->modifyInfo($_POST);
        if ($result) {
            $this->success(true);
        } else {
            $this->error('error');
        }
    }

}