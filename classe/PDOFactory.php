<?php
  define('MYSQL_SERVER', 'mysql:host=sql305.infinityfree.com;dbname=if0_35639963_sbc;charset=utf8');
  define('SQL_USER', 'if0_35639963');
  define('SQL_PASS', 'kN5itXwofObY');

  class PDOFactory {
    // Dans le cas où la base de données serait en MySQL (est utilisé ici).
    public static function getMySQLConnection() {
      $db = new PDO(MYSQL_SERVER, SQL_USER, SQL_PASS);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $db;
    }
  };
?>