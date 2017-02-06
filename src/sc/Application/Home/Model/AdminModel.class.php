<?php
//Author: Li Haifeng
//2017/02/05

namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class AdminModel extends Model
{
    public function login($loginData)
    {
        $util = new Util();
        $data['password'] = $util->getEncryptCode($loginData['password']);
        $data['name'] = $loginData['name'];
        $list = M('admin')->where($data)->find();
        return $list;
    }


    public function modifyPassword($loginData)
    {
        $util = new Util();
        $data['password'] = $util->getEncryptCode($loginData['password']);
        $data['id'] = $loginData['id'];
        $result = M('admin')->data($data)->save();
        if ($result) {
            return true;
        }
        return false;
    }

}