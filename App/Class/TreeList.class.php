<?php
//namespace ThinkPHP\DIYCLASS;
/**
 * 递归处理函数
 */
class TreeList {
    //组合一维数组   
    static public function unlimitedForLevel($treelist, $html = '--', $pid = 0, $level = 0) {
        $arr = array();
        foreach ($treelist as $val) {
            if ($val['t_pid'] == $pid) {
                $val['level'] = $level +1;
                $val['html'] = str_repeat($html,$level);
                $arr[] = $val;
                $arr = array_merge($arr,self::unlimitedForLevel($treelist,$html,$val['id'],$level+1));
            }
        }
        return $arr;
    }
    
    //组合多位数组
    static public function unlimitedForLayer($treelist,$name="child",$pid = 0)
    {
        $arr = array();
        foreach ($treelist as  $val) {
            if ($val['t_pid'] == $pid) {
                $val[$name] = self::unlimitedForLayer($treelist,$name,$val['id']);
                $arr[] = $val; 
            }
        }
        return $arr;
    }
    
    //传递一个子类id，获得该子类的父级
    public function getParents($treelist,$id)
    {
        $arr = array();
        foreach ($treelist as $val) {
            if ($val['id'] == $id) {
                $arr[] = $val;
                $arr = array_merge(self::getParents($treelist,$val['pid']),$arr);
            }
        }
        
        return $arr;
    }
    
}

?>