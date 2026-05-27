<?php

class status{

  function status(){
  }

  function set_status($msg){
    setcookie('sysmsg',$msg,time()+60,'/');
  }

  function get_status_desc(){
    $msg = stripslashes($_COOKIE['sysmsg']);
    setcookie('sysmsg','',0,'/');
		unset($_COOKIE['sysmsg']);
    return $msg;
  }

}

?>
