<?php

	require_once "./lib/Connect.class.php";
	require_once "./model/entity/Word.class.php";

	class WordDAO extends Connect{
		
		public function __construct(){
			parent::connexion();
		}
		
		public function getAllWords($idcat){
			$sql = "SELECT * FROM word w WHERE w.category_id = :id ORDER BY name_word DESC";
			
			$results = parent::executeQuery(
							$sql, array("id" => $idcat)
						);
			$words = array();
			
			while($data = $results->fetch()){
				$words[] = new Word($data);
			}
			
			return $words;
		}
		
	}
	