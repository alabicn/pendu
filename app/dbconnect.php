   
    <?php

	abstract class Connect{
		
		private static $dsn    = "sqlite:C:/wamp/www/jeu_pendu_bdd/db/hangmen.db";
		private static $dbuser = "root";
		private static $dbpass = "";
		
		private static $bdd;
		
		protected function connexion(){
			
			try {
				
				self::$bdd = new PDO(self::$dsn, self::$dbuser, self::$dbpass);  
				self::$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				self::$bdd->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
				self::$bdd->exec("SET CHARACTER SET utf8");
			}
			catch (PDOException $err) { 
				
				$now = new DateTime("", new DateTimeZone('Europe/Paris'));
				$now = $now->format("d-M-Y H:i:s");
				$msg = $now." - ERREUR BDD : ".$err->getMessage().PHP_EOL;
				file_put_contents('log.txt', $msg, FILE_APPEND);
				die();
			}
		}
		
		protected function executeQuery($requete, $params = null){
			
			if($params == null){
				$stmt = self::$bdd->query($requete);
			}
			else{
				$stmt = self::$bdd->prepare($requete);
				$stmt->execute($params);
				
			}
			return $stmt;
		}
	}    
