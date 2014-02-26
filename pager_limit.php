<?php

class Pager_Limit {

	var $result;
	var $start_number;
	var $per_page;
	var $current_page;
	
	function Pager_Limit($params) {
	
		$this->result = '';
		$this->current_page = intval($params['page'] == 0) ? 1 : intval($params['page']);
		$per_page = intval($params['per_page']);
		$this->start_number = (($this->current_page-1)*$per_page);
		$this->per_page = $per_page;
		$this->result = ' LIMIT '. $this->start_number .', '. $per_page;
	
	}
	
	function getResult() {
	
		return $this->result;
	
	}
	
	function getStartNumber() {
	
		return $this->start_number + 1;
	
	}
	
	function getEndNumber() {
	
		return $this->start_number + $this->per_page;
	
	}

    function getCurrentPage() {

        return $this->current_page;

    }
	
}

/*** Sample Source

	require 'pager_limit.php';
	$per_page = 30;

	$pl = new Pager_Limit(array(
	
		'page' => $_GET['p'],
		'per_page' => $per_page,
	
	));
	echo $pl->getResult();
	
	$current_page = $pl->getCurrentPage();

***/
