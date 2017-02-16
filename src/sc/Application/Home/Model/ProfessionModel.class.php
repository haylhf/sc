<?php
/**
 * Created by PhpStorm.
 * User: PC-LHF
 * Date: 2017-02-08
 * Time: 17:17
 */
namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class ProfessionModel extends Model
{
    public function getProfessions()
    {
        $result = M("profession")->select();
        return $result;
    }

    public function getRecords($condition = null)
    {
        $data = " 1 ";
        if ($condition) {
            $id = $condition['id'];
            if ($id) {
                $data .= " AND p.id='$id' ";
            }
            $department_id = $condition['department_id'];
            if ($department_id) {
                $data .= " AND p.department_id='$department_id' ";
            }
        }
        $list = M('profession')
            //->fetchSql(true)// test sql
            ->alias("p")
            ->join('LEFT JOIN ' . C('DB_PREFIX') . 'department d ON p.department_id=d.id')
            ->where($data)
            ->field('p.*,d.`name` AS department_name')
            ->select();
        //echo $list;
        if (!isset($list)) {
            $list = array();
        }
        return $list;
    }

    public function deleteRecord($condition)
    {
        $data['id'] = $condition['id'];
        $result = M('profession')->where($data)->delete();
        return $result;
    }

    public function addInfo($info)
    {
        $data['id'] = $info['id'];
        $data['name'] = $info['name'];
        $data['department_id'] = $info['department_id'];

//        $sql = M('profession')->fetchSql(true)->data($data)->add();
//        echo $sql;
        $result = M('profession')->data($data)->add();
        return $result;
    }
}