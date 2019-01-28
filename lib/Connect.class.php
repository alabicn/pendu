<?php

	abstract class Connect{
		
		protected static $bdd;
		private static $dsn = "sqlite:C:/wamp/www/jeu_pendu_bdd/db/hangmen.db";
		private static $user = "root";
		private static $pass = "";

		protected static function connexion() {
			try {
				self::$bdd = new PDO(self::$dsn, self::$user, self::$pass);
				self::$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				self::$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				
			}
			catch (PDOException $err) { 
				
				$now = new DateTime("", new DateTimeZone('Europe/Paris'));
				$now = $now->format("d-M-Y H:i:s");
				$msg = $now." - ERREUR BDD : ".$err->getMessage().PHP_EOL;
				file_put_contents('log.txt', $msg, FILE_APPEND);
				die();
			}
		}

		protected static function executeQuery($sql, $params = null) {
			if ($params == null) {
				$stmt = self::$bdd->query($sql);
			} else {
				$stmt = self::$bdd->prepare($sql);
				$stmt->execute($params);
			}
			return $stmt;
		}

	}
	
