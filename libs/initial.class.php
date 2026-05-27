<?php
class Initial{
  public function __construct(){
    $arg_list = func_get_args();
    foreach($arg_list as $key=>$arg){
      if(is_array($arg)){
        $func=$arg[0];
        array_shift($arg);
        $pram=$arg;
      }else{
        $func=$arg;
        $pram='';
      }
      if(!method_exists($this,$func))continue;
      $this->$func($pram);
    }
  }
  function smarty(){
    global $smarty;
    require_once LIBS_DIR.'/smarty/Smarty.class.php';
    $smarty = new Smarty();
    $smarty->template_dir = EVENT_DIR. "/templates/";
    $smarty->compile_dir = EVENT_DIR. "/templates_c/";
    $smarty->cache_dir=EVENT_DIR."/cache/";
    $smarty->left_delimiter="<{";
    $smarty->right_delimiter="}>";
    $smarty->allow_php_tag = true;

    $smarty->caching=false;
  }


 

  function db(){
    require_once LIBS_DIR.'/db_mysql.php';
    global $db;
    $db=new DB_MYSQL();
    $db->reporterror=1;
    $db->database = DB_EVENT_DATABASE;
    $db->server = DB_EVENT;
    $db->user = DB_EVENT_USER;
    $db->password = DB_EVENT_PASS;
    $db->connect();
    #$db->fetch_array_type=MYSQL_ASSOC;
    $db->query("SET NAMES 'utf8'");

    //db_r
/*
    global $db_r;
    $db_r=new DB_MYSQL();
    $db_r->reporterror=1;
    $db_r->database = DB_R_EVENT_DATABASE;
    $db_r->server = DB_R_EVENT;
    $db_r->user = DB_R_EVENT_USER;
    $db_r->password = DB_R_EVENT_PASS;
    $db_r->connect();
    $db_r->fetch_array_type=MYSQL_ASSOC;    
    $db_r->query("SET NAMES 'utf8'");
*/
  }
  
  
  
  function inputxss(){
    require_once LIBS_DIR.'/removexss.func.php';
    foreach(Array('get','post','request','cookie') as $var_name){
      if($var_name=='get') $var=&$_GET;
      else if($var_name=='post') $var=&$_POST;
      else if($var_name=='request') $var=&$_REQUEST;
      else $var=&$_COOKIE;

      if(!is_array($var) || count($var)==0)
        continue;
      foreach($var as $key=>$value){
        if( is_array($var[$key]) && count($var[$key])>0){
          foreach($var[$key] as $key2=>$value2){
            $var[$key][$key2]=removexss($value2);
          }
        }else
          $var[$key]=removexss($value);
      }
    }    
  }

  function func()
  {
    require_once LIBS_DIR."/function.php";  
  }

}
