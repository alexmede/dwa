<?php

class score_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	public function index() {
		
		/* redirect to game root */
		$this->template->content = header('Location: /');
		
	}
	
	public function submit() {
		
		/* insert score into database */
		sleep(1);
		DB::instance(DB_NAME)->insert("scores", $_POST);
		
		/* debug to view score array */
		//print_r($_POST);
		
	}
	
	public function score() {
		
		$this->template->content = View::instance('v_score_score');
		$this->template->title   = "Scores";
		/*
		$q = "SELECT `player_name`, `dice_num`, `total`
			FROM `scores`
			WHERE `dice_num` = 1
			ORDER BY `scores`.`total` DESC
			LIMIT 0 , 10";
		
		$scores = DB::instance(DB_NAME)->select_rows($q);
		
		//$this->template->content->scores = $scores;
		echo json_encode($scores);
		$client_files = Array(
						"/css/dice.css"
						//"/js/score.js"
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);
		*/
		echo $this->template;
		
	}

	public function p_score() {
	
		$data = Array();

		# Find out how many posts there are
		$q = "SELECT `player_name`, `dice_num`, `total`
			FROM `scores`
			WHERE `dice_num` = 1
			ORDER BY `scores`.`total` DESC
			LIMIT 0 , 10";
		$data['total'] = DB::instance(DB_NAME)->select_array($q, 'total');

		# Send back json results to the JS, formatted in json
		echo json_encode($data);
		
	}
	
}
