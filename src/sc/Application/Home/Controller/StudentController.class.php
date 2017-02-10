<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-09
 * Time: 18:40
 */

namespace Home\Controller;


class StudentController extends BaseLoginController
{
    public function index()
    {
        $user = null;
        $currentUser = $_SESSION["user"];
        //islogin
        if (isset($currentUser)) {
            $user = D("student")->getRecords($currentUser);
        }
        if (count($user) > 0) {
            $this->assign("studentUser", json_encode($user[0]));
        }
        $this->assignUser();
        $this->display();
    }

    public function assignUser()
    {
        $this->assign("currentuser", json_encode($_SESSION["user"]));
    }

    public function studentCourse()
    {
        $this->assignUser();
        $this->display();
    }
}