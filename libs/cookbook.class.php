<?php
class CookBook
{
  private $db;
  private $db_r;
  function __construct(&$db,&$db_r)
  {
    $this->db=$db;
    $this->db_r=$db_r;
  }
  
  
  public function addCookbook($params)
  {
    if(empty($params) || !is_array($params))
      return false;

    $attrArr_a=array();
    $attrArr_b=array();

    foreach($params as $key=>$value)
    {
      $attrArr_a[]=sprintf('`%s`="%s"',$key,$value);
      if($key!='CID')//privity key
        $attrArr_b[]=sprintf('`%s`="%s"',$key,$value);
    }

    $attrStr_a=implode(',',$attrArr_a);
    $attrStr_b=implode(',',$attrArr_b);

    $sql=sprintf('INSERT INTO `2011OHIYO_COOKBOOK` SET %s ON DUPLICATE KEY UPDATE %s',$attrStr_a,$attrStr_b);

    $this->db->query($sql);
    $insert_id=$this->db->insert_id();

    return $insert_id;

  }
  public function getCookBookList($page,$prepage)
  {

    $from=($page-1)*$prepage;    
    $limitStr="limit {$from},{$prepage}";
    
    $sql=sprintf('SELECT SQL_CALC_FOUND_ROWS * FROM 2011OHIYO_COOKBOOK WHERE STATUS="SHOW" ORDER BY CID DESC %s ',$limitStr);
    
    $cookbookList=$this->db->get_results($sql);

    $record=$this->db->query_first("SELECT FOUND_ROWS() as record");
    $record=$record['record'];

    return array("cookbookList"=>$cookbookList,"record"=>$record);

  }
  public function getCookBookAllList($page,$prepage)
  {

    $from=($page-1)*$prepage;    
    $limitStr="limit {$from},{$prepage}";
    
    $sql=sprintf('SELECT SQL_CALC_FOUND_ROWS * FROM 2011OHIYO_COOKBOOK ORDER BY CID DESC %s ',$limitStr);    
    $cookbookList=$this->db->get_results($sql);

    $record=$this->db->query_first("SELECT FOUND_ROWS() as record");
    $record=$record['record'];

    return array("cookbookList"=>$cookbookList,"record"=>$record);

  }
  
  public function updateCookbookStatus($cid,$status)
  {
    if($status!='SHOW')
      $status='HIDDEN';
    
    $sql=sprintf('UPDATE 2011OHIYO_COOKBOOK SET STATUS="%s" WHERE CID="%u"',$status,$cid);
    return $this->db->query($sql);
  }
}