<?php
#error_reporting(7);
// db class for mysql
// this class is used in all scripts
// do NOT fiddle unless you know what you are doing

class DB_MYSQL{
  var $database = "";

  var $link_id  = 0;
  var $query_id = 0;
  var $record   = array();

  var $errdesc    = "";
  var $errno   = 0;
  var $reporterror = "" ;
  #var $reporterror = DB_DEBUG;

  var $server   = "localhost";
  var $user     = "root";
  var $password = "";
  var $usepconnect = 0;  //使用 pconnect
  var $num_rows = 0;
  //var $fetch_array_type=MYSQL_BOTH;
  var $connect_when_query=true;
  var $ever_connect=false;
  var $log_sql=false;
//  var $log_sql=true;
  var $auto_ping=true;


  function get_dsn(){
    return $this->user.':'.$this->password.'@'.$this->server.'/'.$this->database;
  }
  
  //Ping a server connection or reconnect if there is no connection
  function ping(){
      if($this->check_connect()){
          if(!mysqli_ping($this->link_id)){
              $this->disconnect();
              $this->_connect();
          }
      }else
          $this->_connect();
  }
  
  function check_real_connect(){
      return ($this->link_id)?true:false;
  }
  
  function check_connect(){
      return $this->ever_connect;
  }
  function disconnect(){
      $this->ever_connect=false;
      if($this->link_id!=0)
          @mysqli_close($this->link_id);
      $this->link_id=0;
      
      $connection=$this->get_dsn();
      global $SqlServerConn;
      unset($SqlServerConn[$connection]);
  }
  
  function connect(){
      //$this->ever_connect=true;
      if(!$this->connect_when_query)
          $this->_connect();
      
  }
  
  //call this function before query
  //it will check if need ping()
  //and log query time
  function auto_pinging(){
      if(!$this->auto_ping)
          return;
      
      global $SqlServerQueryTime;
      $conn=$this->get_dsn();
      if(!empty($SqlServerQueryTime[$conn]) && (time()-$SqlServerQueryTime[$conn])>5){
          $this->ping();
      }
      $SqlServerQueryTime[$conn]=time();
  }
  
  function _connect() {
      // connect to db server

      $this->ever_connect=true;
      
      if($this->link_id!=0)
          return;

      //防止重覆連線 2008.03.16

      global $SqlServerConn;
      $connection=$this->get_dsn();
      if(!empty($SqlServerConn[$connection])){
          $this->link_id=&$SqlServerConn[$connection];
          return;
      }

      
      
      if ($this->password=="") {
          if ($this->usepconnect==1) {
              $this->link_id=mysqli_connect($this->server,$this->user);
          } else {
              $this->link_id=mysqli_connect($this->server,$this->user);
          }
      } else {
          if ($this->usepconnect==1) {

              $this->link_id=mysqli_connect($this->server,$this->user,$this->password, $this->database);

          } else {
              $this->link_id=mysqli_connect($this->server,$this->user,$this->password, $this->database);
	      $this->link_id->set_charset('utf8mb4');
          }
      }
      if (!$this->link_id) {
          $this->halt("Link-ID == false, connect failed");
          return false;
      }
      /*
      if ($this->database!="") {
        if(!mysql_select_db($this->database, $this->link_id)) {
          $this->halt("cannot use database ".$this->database);
        }
      }
       */	
      //記錄link_id，防止重覆連線  2008.03.16
      $this->link_id->set_charset('utf8mb4');
      $SqlServerConn[$connection]=&$this->link_id;
      $this->query('SET time_zone="+8:00"');
      $this->query('SET NAMES \'utf8mb4\'','UNBUFFERED');
      #$this->query('SET charset \'utf8mb4\'','UNBUFFERED');
            
  }

  function geterrdesc() {
    $this->error=mysqli_error($this->link_id);
    return $this->error;
  }

  function geterrno() {
    $this->errno=mysqli_errno($this->link_id);
    return $this->errno;
  }

  function select_db($database="") {
      if($this->link_id==0)
          $this->_connect();

    // select database
    if ($database!="") {
      $this->database=$database;
    }
    
    if(!mysqli_select_db($this->link_id, $this->database)) {
      $this->halt("cannot use database ".$this->database);
    }

  }

  function query($query_string, $type= ''){

/*
      if($this->ever_connect && $this->link_id==0){
          echo("Database Connection error.");
          return false;
      }
*/
      
      if(!$this->ever_connect)
//      if($this->link_id==0)
          $this->_connect();

      if($this->ever_connect && $this->link_id==0){
          //echo("Database Connection error.");
          return false;
      }

      

      $this->auto_pinging();
     	$this->link_id->set_charset('utf8mb4'); 
      if($type == 'UNBUFFERED')
          $this->query_id = mysqli_query($this->link_id, $query_string);
      else
          $this->query_id = mysqli_query($this->link_id, $query_string);
      if (!$this->query_id) 
          $this->halt("Invalid SQL: ".$query_string);
      
      if($this->log_sql){
          global $all_sql_query_log;
          $all_sql_query_log[]=$this->server.':'.str_replace(array("\r","\n"),array(' ',' '),$query_string);
      }
      
      return $this->query_id;
  }

  function fetch_array($query_id=-1,$query_string="") {
    // retrieve row
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    if ( isset($this->query_id) ) {
      $this->record = mysqli_fetch_array($this->query_id);
      #$this->record = mysqli_fetch_array($this->query_id,$this->fetch_array_type);
    } else {
      if ( !empty($query_string) ) {
        $this->halt("Invalid query id (".$this->query_id.") on this query: $query_string");
      } else {
        $this->halt("Invalid query id ".$this->query_id." specified");
      }
    }

    return $this->record;
  }

  function free_result($query_id=-1) {
    // retrieve row
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return @mysqli_free_result($this->query_id);
  }

  function query_first($query_string) {
    // does a query and returns first row
    $query_id = $this->query($query_string);
    if($query_id)
    {
      $returnarray=$this->fetch_array($query_id);
      $this->free_result($query_id);
    }
    return $returnarray;
  }

  function query_lock($query_string, $name, $timeout = 10)
  {
    $sql = "select get_lock('$name', $timeout)";
    $query_id = $this->query($sql);
    if (!$query_id)
      return $query_id;

    return $this->query_first($query_string);
  }

  function free_lock($name)
  {
    $sql = "select release_lock('$name')";
    $this->query($sql);
  }

  function get_results($query_string)
  {
    $query_id = $this->query($query_string);

    if(!$query_id)
      return NULL;

    $i = 0;
    while($row = $query_id->fetch_assoc())
    //while($row = $this->fetch_array($query_id))
    {
      $i++;
      $tmp[] = $row;
    }

    $this->num_rows = $i;
    $this->free_result($query_id);
    return $tmp;
  }

  function data_seek($pos,$query_id=-1) {
    // goes to row $pos
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysqli_data_seek($this->query_id, $pos);
  }

  function num_rows($query_id=-1) {
    // returns number of rows in query
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysqli_num_rows($this->query_id);
  }

  function num_fields($query_id=-1) {
    // returns number of fields in query
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysqli_num_fields($this->query_id);
  }

  function affected_rows(){
      return mysqli_affected_rows($this->link_id);
  }

  function insert_id() {
    // returns last auto_increment field number assigned

    return mysqli_insert_id($this->link_id);

  }

  function escape($string){
    return mysqli_real_escape_string($this->link_id, $string);
  }

  function send_error($url, $params){
      if($url == null){
          return "";
      }
      else
      {
          $ch = curl_init();
          $res= curl_setopt ($ch, CURLOPT_URL, $url);
          $boundary = uniqid(true);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
          curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded"));
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
          curl_setopt ($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
          curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
          $result = curl_exec ($ch);
          curl_close ($ch);
          return $result;
      }
      
  }
  function halt($msg) {
      $this->errdesc=mysqli_error($this->link_id);
      $this->errno=mysqli_errno($this->link_id);
      $message="Database error : $msg\n";
      $message.="mysql error: {$this->errdesc}\n";
      $message.="mysql error number: {$this->errno}\n";
      $message.="Date: ".date("l dS of F Y h:i:s A")."\n";
      $message.="Referer: ".getenv("HTTP_REFERER")."\n";
      $message.="DB: ".$this->server."\n";

   $message.="Url: ".'http'. (($_SERVER['HTTPS'] == 'on')?'s':'') .
 '://' . $_SERVER['SERVER_NAME']. (($_SERVER['SERVER_PORT'] != '80')?':' .
 $_SERVER['SERVER_PORT']:'') . $_SERVER['REQUEST_URI']."\n";
$message.="Connection: ".$this->get_dsn();
      
      $this->send_error('http://api.blog.yam.com/error_msg.php','&message='.urlencode($message));
      
      if ($this->reporterror==1) {
          echo "</td></tr></table>\n<p>There seems to have been a slight problem with the database.\n";
          echo "Please try again by pressing the refresh button in your browser.</p>";
          echo "<p>We apologise for any inconvenience.</p>";
      }
  }
}
