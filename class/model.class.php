<?php
class Model
{
  private $db;
  private $db_r;
  static public function getInstance()
  {
    if(Model::$mainInstance==null)
      new Model();
    return Model::$mainInstance;
  }

  private $_mainTable;
  private $_lockFields;
  private $_primaryFeild;

  public function __construct($mainTable,$lockFields=null,$primaryField=null)
  {
    global $db,$db_r;
    $this->db=&$db;
//    $this->db_r=&$db_r;

    $this->_mainTable=$mainTable;
    $this->_lockFields=$lockFields;
    $this->_primaryField=$primaryField?$primaryField:$lockField[0];
  }

  public function addEdit($params)
  {    
    if(!$params)
      return false;

    $attrArr_a=array();
    $attrArr_b=array();

    foreach($params as $key=>$value)
    {
      if(in_array($key,$this->_lockFields))
      {
        $attrArr_a[]=sprintf('`%s`="%s"',$key,$value);
      }
      else
      {
        $attrArr_a[]=sprintf('`%s`="%s"',$key,$value);
        $attrArr_b[]=sprintf('`%s`="%s"',$key,$value);
      }
    }

    $attrStr_a=implode(',',$attrArr_a);
    $attrStr_b=implode(',',$attrArr_b);

    $sql=sprintf('INSERT INTO `%s` SET %s
                  ON DUPLICATE KEY UPDATE %s',$this->_mainTable,$attrStr_a,$attrStr_b);
    echo "$sql\n";
    $rs=$this->db->query($sql);
    $insert_id=$this->db->insert_id();
    return $insert_id;
  }

  public function getList($condition=null,$sort=null,$limit=null)
  {
    //condition
    $c='';
    if($condition)
    {
      $operator=array('eq'=>'=',
                      'ge'=>'>',
                      'le'=>'<=',
                      'in'=>'IN',
                      'gq'=>'>=',
                      'lq'=>'<=',
                      'nin'=>'NOT IN',
                      'like'=>'LIKE');
      foreach($condition as $opKey=>$opVal){
        foreach($opVal as $tKey=>$tVal){
          if($opKey=='in' || $opKey=='nin')
            $c.=$c?sprintf(' AND `%s` %s ("%s") ',$tKey,$operator[$opKey],implode('","',$tVal)):sprintf(' `%s` %s ("%s") ',$tKey,$operator[$opKey],implode('","',$tVal));
          else if($opKey =='like')
            $c.=$c?sprintf(' AND `%s` %s "%%%s%%" ',$tKey,$operator[$opKey],$tVal):sprintf(' `%s` %s "%%%s%%" ',$tKey,$operator[$opKey],$tVal);
          else
            $c.=$c?sprintf(' AND `%s`%s"%s" ',$tKey,$operator[$opKey],$tVal):sprintf(' `%s` %s "%s" ',$tKey,$operator[$opKey],$tVal);
        }
      }
      if($c)
        $c='WHERE '.$c;
    }
    //sort
    if($sort)
    {
      $sortStr=implode(',',$sort);
      $sortStr=sprintf('order by %s',$sortStr);
    }

    //limit
    if($limit)
    {
      if(is_int($limit['from']))
        $limitStr=sprintf('limit %u',$limit['from']);
      if(is_int($limit['perpage']))
        $limitStr.=($limitStr?',':'').sprintf('%u',$limit['perpage']);
    }

    //SQL
    $sql=sprintf('SELECT %s * FROM `%s` %s %s %s',$limit?'SQL_CALC_FOUND_ROWS':'',$this->_mainTable,$c,$sortStr,$limitStr);
    //echo $sql;exit;
    $list=$this->db->get_results($sql);
    
    if($limit)
    {
      $total=$this->db->query_first('SELECT FOUND_ROWS() as num');
      $total=$total['num'];
    }else
      $total=count($list);

    return array('list'=>$list,'total'=>$total);
  }
  public function getOne($condition,$sort=null)
  {
    //condition
    $c='';
    if($condition)
    {
      $operator=array('eq'=>'=',
                      'ge'=>'>',
                      'le'=>'<=',
                      'in'=>'IN',
                      'gq'=>'>=',
                      'lq'=>'<=',
                      'nin'=>'NOT IN',
                      'like'=>'LIKE');

      foreach($condition as $opKey=>$opVal){
        foreach($opVal as $tKey=>$tVal){
          if($opKey=='in')
            $c.=$c?sprintf(' AND `%s` %s ("%s") ',$tKey,$operator[$opKey],implode('","',$tVal)):sprintf(' `%s` %s ("%s") ',$tKey,$operator[$opKey],implode('","',$tVal));
          else if ($opKey=='like')
            $c.=$c?sprintf(' AND `%s`%s"%s" ',$tKey,$operator[$opKey],$tVal):sprintf(' `%s` %s "%%%s%%" ',$tKey,$operator[$opKey],$tVal);
          else
            $c.=$c?sprintf(' AND `%s`%s"%s" ',$tKey,$operator[$opKey],$tVal):sprintf(' `%s`%s"%s" ',$tKey,$operator[$opKey],$tVal);
        }
      }
    }
    if($c)
      $cStr='WHERE '.$c;
    

    //sort
    if($sort)
    {
      $sortStr=implode(',',$sort);
      $sortStr=sprintf('order by %s',$sortStr);
    }

    //SQL
    $sql=sprintf('SELECT * FROM `%s` %s %s LIMIT 1',$this->_mainTable,$cStr,$sortStr);
    $result=$this->db->query_first($sql);
    return $result;
  }
  public function countList($fields,$condition=null,$sort=null,$limit=null,$group=null)
  {
   //condition
    $c='';
    if($condition)
    { 
      $operator=array('eq'=>'=',
                      'ge'=>'>',
                      'le'=>'<=',
                      'in'=>'IN',
                      'gq'=>'>=',
                      'lq'=>'<=',
                      'nin'=>'NOT IN',
                      'like'=>'LIKE');
      foreach($condition as $opKey=>$opVal){
        foreach($opVal as $tKey=>$tVal){
          if($opKey=='in' || $opKey=='nin')
            $c.=$c?sprintf(' AND `%s` %s ("%s") ',$tKey,$operator[$opKey],implode('","',$tVal)):sprintf(' `%s` %s ("%s") ',$tKey,$operator[$opKey],implode('","',$tVal));
          else if($opKey =='like')
            $c.=$c?sprintf(' AND `%s` %s "%%%s%%" ',$tKey,$operator[$opKey],$tVal):sprintf(' `%s` %s "%%%s%%" ',$tKey,$operator[$opKey],$tVal);
          else
            $c.=$c?sprintf(' AND `%s`%s"%s" ',$tKey,$operator[$opKey],$tVal):sprintf(' `%s` %s "%s" ',$tKey,$operator[$opKey],$tVal);
        }
      }
      if($c)
        $c='WHERE '.$c;
    }
    //sort  
    if($sort)
    { 
      $sortStr=implode(',',$sort);
      $sortStr=sprintf('order by %s',$sortStr);
    }

    //limit
    if($limit)
    { 
      if(is_int($limit['from']))
        $limitStr=sprintf('limit %u',$limit['from']);
      if(is_int($limit['perpage']))
        $limitStr.=($limitStr?',':'').sprintf('%u',$limit['perpage']);
    }
    
    //select * field
    $fieldStr='';
    if(is_array($fields))
    {
      foreach($fields as $field)
      {
        $fieldStr=($fieldStr?',':'').sprintf(' `%s`,COUNT(%s)',$field,$field);
      }
    }else
    {
      $field=$fields;
      $fieldStr=($fieldStr?',':'').sprintf(' `%s`,COUNT(%s)',$field,$field);
    }

    //SQL
    $sql=sprintf('SELECT %s %s FROM `%s` %s %s %s',$limit?'SQL_CALC_FOUND_ROWS':'',$fieldStr,$this->_mainTable,$c,$sortStr,$limitStr);
    $list=$this->db->get_results($sql);
      
    if($limit)
    { 
      $total=$this->db->query_first('SELECT FOUND_ROWS() as num');
      $total=$total['num'];
    }else
      $total=count($list);

    return array('list'=>$list,'total'=>$total);
  }
}

