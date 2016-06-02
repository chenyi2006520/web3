<?php 
namespace Admin\Controller;
use Think\Controller;

class IndexController extends CommonController {
    public function index() {
        // set_time_limit(0);
        // $arr = file_get_contents("./Data/location2.php");
        // // $arr = file_get_contents("./Data/address2.js");
        // $arrayValue = json_decode($arr);
        // //$tem = $this->ajaxReturn($arrayValue);
        // pp($arrayValue[9]->{'children'}[0]->{'children'}[1]->{'name'});
        // $temparray1 = array();
        
        // foreach ($arrayValue as $key) {
        //     $shengid = $key ->{'id'};            
        //     $shengname = $key ->{'name'}; 
        //     $temparray1[] = array(
        //         "id" => $shengid,
        //         "name" => $shengname,
        //         "parentid" => 0,
        //         "level" => 1
        //     );
                     
        //     foreach ($key->{'children'} as $key1) {
        //         $shiid = $key1 ->{'id'};            
        //         $shiname = $key1 ->{'name'};
        //         $temparray1[] = array(
        //             "id" => $shiid,
        //             "name" => $shiname,
        //             "parentid" => $shengid,
        //             "level" => 2
        //         );
        //         foreach ($key1 ->{'children'} as $key2) {
        //             $xianid = $key2 ->{'id'};
        //             $xianname = $key2 ->{'name'};
        //             $temparray1[] = array(
        //                 "id" => $xianid,
        //                 "name" => $xianname,
        //                 "parentid" => $shiid,
        //                 "level" => 3
        //             );
                    
        //             foreach ($key2->{'children'} as $key3) {
        //                 if (!empty($key3)) {
        //                     $jiedaoid = $key3 ->{'id'};
        //                     $jiedaoname = $key3 ->{'name'};
        //                     $temparray1[] = array(
        //                         "id" => $jiedaoid,
        //                         "name" => $jiedaoname,
        //                         "parentid" => $xianid,
        //                         "level" => 4
        //                     );                           
        //                 }
        //             }
                    
        //         }
        //      }
        //      //break;
        // }
        //pp($temparray1);
        
           
        // pp($arrayValue[0]->{'children'});        
        // pp($arrayValue[0]->{'name'});        
        //die;
        $this->display();
    }

    public function logout() {
        session_unset();
        session_destroy();
        $this->redirect('/Admin/Login/Index/');
    }
}