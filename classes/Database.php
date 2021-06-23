<?php

namespace classes;

/**
 * Trait Database.
 *
 * @author Dmitri Seron <dmitri.seron@gmail.com>
 */

require '../config/config.php';

trait Database {

  public \PDO $connection;

  /**
   * Database constructor.
   */
  public function __construct() {
    $this->connection = new \PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
  }

}