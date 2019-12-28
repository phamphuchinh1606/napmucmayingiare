<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mybreadcrumb {
	private $breadcrumbs = array();
	private $tags = "";
	
	function __construct()
	{
//		$this->tags['open'] = "<div class='block-breadcrumb'><div class='container'><ul class='breadcrumb'>";
//		$this->tags['close'] = "</ul></div></div>";
//		$this->tags['itemOpen'] = "<li>";
//		$this->tags['itemClose'] = "</li>";
	}
	function add($title, $href){		
		if (!$title OR !$href) return;
		$this->breadcrumbs[] = array('title' => $title, 'href' => $href);
	}
	
	function openTag($tags=""){
		if(empty($tags)){
			return $this->tags['open'];
		}else{
			$this->tags['open'] = $tags;
		}
	}
	
	function closeTag($tags=""){
		if(empty($tags)){
			return $this->tags['close'];
		}else{
			$this->tags['close'] = $tags;
		}
	}
	
	function itemOpenTag($tags=""){
		if(empty($tags)){
			return $this->tags['itemOpen'];
		}else{
			$this->tags['itemOpen'] = $tags;
		}
	}
	
	function itemCloseTage($tags=""){
		if(empty($tags)){
			return $this->tags['itemClose'];
		}else{
			$this->tags['itemClose'] = $tags;
		}
	}
	
	function render(){
		if(!empty($this->tags['open'])){
			$output = $this->tags['open'];
		}else{
			$output = "<div class='block block-breadcrumb'><div class='container'><ul class='breadcrumb'>";
		}
		
		$count = count($this->breadcrumbs)-1;
		foreach($this->breadcrumbs as $index => $breadcrumb){
		
			if($index == $count){
				$output .= '<li class="active">';
				$output .= $breadcrumb['title'];
				$output .= '</li>';
			}else{
				$output .= '<li>';
				$output .= '<a href="'.$breadcrumb['href'].'">';
				$output .= $breadcrumb['title'];
				$output .= '</a>';
				$output .= '</li>';
			}
			
		}
		if(!empty($this->tags['open'])){
			$output .= $this->tags['close'];
		}else{
			$output .= "</ul></div></div>";
		}		
		return $output;
	}
}