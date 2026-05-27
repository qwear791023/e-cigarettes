<?php
class Pagebar{
	var $perpage;   //分頁筆數
	var $page;      //目前頁數
	var $records;   //總筆數
	var $pages;     //總頁數
	var $url;       //連結網址
	var $pageBar;   //導覽列
	var $noLink='javascript:void(0)';
	var $pagename;
	var $arch;
	var $max_link=5;//1 3 5 7 9 11....
	var $type=0;
	function Pagebar($perpage,$page,$records,$url,$arch=""){
		$this->pagename="page";
		$this->perpage=$perpage;
		$this->page=$page;
		$this->records=$records;
		$this->pages=ceil($records/$perpage);
		$this->url=(strpos($url,'?'))?$url.'&':$url.'?';
		if($arch)
			$this->arch=$arch;

	}
	function setType($type){
		$this->type=$type;
	}
	function show()
	{
		if($this->pages>1)
			return $this->showPageBar();
		else
			return false;
	}
	function showPageBar(){
		$this->pageBar='';

		$this->pageBar='';
		if($this->page==1)
		{
			$firstURL='javascript:void(0);';
			$prevURL='javascript:void(0);';
			$this->pageBar.=sprintf('<li class="prev"><a href="javascript:void(0);">上一頁</a></li>',$firstURL);  

		}else
		{
			$firstURL=$this->url.$this->pagename.'=1'.$this->arch;
			$prevURL=$this->url.$this->pagename.'='.($this->page-1).$this->arch;
			$this->pageBar.=sprintf('<li class="prev"><a href="%s">上一頁</a></li>',$prevURL);  
		}

		//內頁
		//計算要放幾個連結
		if($this->page<$this->max_link)
		{
			$perv_link=$this->page-1;
			$next_link=$this->max_link-$this->page;
		}else if($this->page > ($this->pages-$this->max_link))
		{
			$next_link=$this->pages-$this->page;
			$perv_link=$this->max_link-$next_link;
		}else
		{
			$perv_link=$this->max_link-intval($this->max_link*0.5);
			$next_link=$this->max_link-$perv_link;
		}


		$start=($this->page>$perv_link)?$this->page-$perv_link:1;
		$end=(($this->page+$next_link)>$this->pages)?$this->pages:$this->page+$next_link;

		for($i=$start;$i<=$end;$i++){
			if($i!=$this->page){
				$this->pageBar.=sprintf('<li class="num"><a href="%s">%d</a></li>',$this->url.$this->pagename.'='.$i.$this->arch,$i);
			}else{
				$this->pageBar.=sprintf('<li class="num active"><a href="javascript:void(0);">%d</a></li>',$i);
			}
		}
		if($this->page<$this->pages)
		{
			$nextURL=$this->url.$this->pagename.'='.($this->page+1).$this->arch;
			$lastURL=$this->url.$this->pagename.'='.$this->pages.$this->arch;
			$this->pageBar.=sprintf('<li class="next"><a href="%s">下一頁</a></li>',$nextURL);
		}else
		{
			$nextURL="javascript:void(0)";
			$this->pageBar.=sprintf('<li class="next"><a href="javascript:void(0)">下一頁</a></li>',$nextURL);
		}
		//$this->pageBar.=$this->page."/".$this->pages."頁";
		return $this->pageBar;
	}

	public static function getCurrentPageUrl($pageField='page')
	{
		parse_str($_SERVER['QUERY_STRING'],$urlArr);
		unset($urlArr[$pageField]);
		$http_query=http_build_query($urlArr);
		$url="{$_SERVER['PHP_SELF']}?{$http_query}";

		$page=(int)$_GET['page'];
		$page=$page>0?$page:1;
		$perpage=PERPAGE;

		return $url;
	}
}   
