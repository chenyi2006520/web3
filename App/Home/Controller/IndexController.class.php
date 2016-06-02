<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $gameModel = M("bsw_game") ;
        $this -> newGames = $gameModel ->order(" id desc ") ->limit(3) ->select();
        $this ->gameList = $gameModel  ->order(" id desc ") ->limit(3,10) ->select();
        $this ->gameRanList = $gameModel ->order(" Rand() ") ->limit(0,10) ->select();;
        $this->display('index');
    }
}

?>