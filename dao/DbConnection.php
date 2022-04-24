<?php

namespace dao;

use \PDO;
use \PDOException;

class DbConnection
{


	private static   $connection;

	public static  function getConnection()
	{

		if (self::$connection == null) {

			try {

				self::$connection = new PDO("mysql:host=localhost;dbname=transfert", 'root', '');

				//echo "Connected successfully";

			} catch (PDOException $e) {

				echo "Connection failed: " . $e->getMessage();
			}
		}

		return self::$connection;
	}
}
