<?php
	require_once "model/Entity.class.php";
	
	class Word extends Entity{
		
		private $id;
		private $name;
		private $category;
		
		public function __construct($donnees){
			
			parent::hydrate($donnees);
		}

		
		public function getId(){
			return $this->id;
		}
		
		public function getName(){
			return $this->name;
		}

		public function getCategory(){
			return $this->category;
		}
		
		protected function setId($value){
			$this->id = $value;
		}
		
		protected function setName($value){
			$this->name = $value;
		}

		protected function setCategory($value){
			$this->category = $value;
		}
		
	}
	