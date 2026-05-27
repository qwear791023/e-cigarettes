<?php
class page{
 var $perpage;   //分頁筆數
 var $page;      //目前頁數
 var $records;   //總筆數
 var $pages;     //總頁數
 var $url;       //連結網址
 var $pageBar;   //導覽列
 var $noLink='javascript:void(0)';

 var $max_link=10;//1 3 5 7 9 11....
 
 public function __construct($perpage,$page,$records,$url,$type){
  $this->perpage=$perpage;
  $this->page=$page;
  $this->records=$records;
  $this->pages=ceil($records/$perpage);
  $this->url=(strpos($url,'?'))?$url.'&':$url.'?';
  $this->type=$type;
 }  
 function showPageBar(){

  $this->pageBar='';
 //上一頁
  $this->pageBar.=sprintf('<button type="button" onClick="location.href=\'%s\'" >上一頁</button>',$this->page>1?'javascript:gopage('.($this->page-1).','.$this->type.');':'javascript:;');
  if($this->page<$this->max_link){
    $perv_link=$this->page-1;
    $next_link=$this->max_link-$this->page;
  }else if($this->page > ($this->pages-$this->max_link)){
    $next_link=$this->pages-$this->page;
    $perv_link=$this->max_link-$next_link;
  }else{
    $perv_link=$this->max_link-intval($this->max_link*0.5);
    $next_link=$this->max_link-$perv_link;
  }

  $start=($this->page>$perv_link)?$this->page-$perv_link:1;
  $end=(($this->page+$next_link)>$this->pages)?$this->pages:$this->page+$next_link;
  for($i=$start;$i<=$end;$i++){
    if($i!=$this->page){
      //非目前頁面      
      $this->pageBar.=sprintf('<a href="%s">%s</a>','javascript:gopage('.$i.','.$this->type.');',$i);
    }else{
      //目前頁面
      $this->pageBar.=sprintf('<span class="currenPage">%s</span>',$i);
    }
  }
    //下一頁
  $this->pageBar.=sprintf('<button type="button" onClick="location.href=\'%s\'" >下一頁</button>',($this->page<$this->pages)? 'javascript:gopage('.($this->page+1).','.$this->type.');':'javascript:;');
  $this->pageBar.=$this->page."/".$this->pages."頁";
 
    
  return $this->pageBar;
 }
}
?>
