<?php
    class Paginator{
		var $base_url = ''; //link phân trang của website :URL."index.php/"
		var $total_rows = 0; //tổng số record của danh sách
		var $per_page = 2; //số lượng record trên 1 trang
		var $cur_page = 1; //trang hiện hành (ví dụ: 1, 2, 3)


		public function __construct($params = array()){
			if(count($params)>0){
				$this->init($params);
			}	
		}

		public function init($params = array()){
			if(count($params)>0){
				foreach($params as $key => $val){
					if(isset($this->$key)){
						$this->$key = $val;
					}
				}
			}
			return $this->total_rows;
			
		}
		
		public function createLinks() {
			$end = ceil( $this->total_rows / $this->per_page );
			$start = 1;
			$html = "<nav aria-label=''>";
			$html .= "<ul class='pagination'>";
			$class = ( $this->cur_page == 1 ) ? "disabled" : "";
			$html .= "<li class='page-item'><a aria-label='Previous' class='page-link {$class}' href='".($this->cur_page == 1 ? '#' : $this->base_url . ($this->cur_page - 1))."'><span aria-hidden='true'>&laquo;</span></a></li>";
			for ( $i = $start ; $i <= $end; $i++ ) {
				$class = ( $this->cur_page == $i ) ? "active" : "";
				$html .= "<li><a class = '{$class}' href='{$this->base_url}{$i}'>{$i}</a></li>";
			}
			$class = ( $this->cur_page == $end ) ? "disabled" : "";
			$html .= "<li><a aria-label='Next' class='{$class}' href='".($this->cur_page == $end ? '#' : $this->base_url . ($this->cur_page + 1))."'><span aria-hidden='true'>&raquo;</span></a></li>";	
			$html .= "</ul>";
			$html .= "</nav>";
			return $html;
		}	
		
	}
