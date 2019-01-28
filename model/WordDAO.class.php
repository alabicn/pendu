<?php

	require_once "./lib/Connect.class.php";
	require_once "./model/entity/Word.class.php";

	class WordDAO extends Connect{
		
		public function __construct(){
			parent::connexion();
		}
		
		public function getAllWords(){
			//$sql = "SELECT * FROM word w, category c WHERE w.id_word = c.id_category ORDER BY name_word DESC";
			$sql = "SELECT * FROM word";
			$results = parent::executeQuery(
							$sql
						);
			$words = array();
			
			while($data = $results->fetch()){
				$words[] = new Word($data);
			}
			
			return $words;
		}
		
	}
	