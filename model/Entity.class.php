<?php

	abstract class Entity{
		
		protected function hydrate($data){
			
			foreach($data as $attribut => $valeur) {
				
				$tab_attribut = explode("_", $attribut);
				
				$methode = "set".ucwords($tab_attribut[0]);
				
				if(method_exists($this, $methode)){
					$this->$methode($valeur);
				}
			}
		}
	}