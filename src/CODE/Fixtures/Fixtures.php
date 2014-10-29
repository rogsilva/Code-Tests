<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 21/10/14
 * Time: 20:32
 */

namespace CODE\Fixtures;


use CODE\DB\Connection;

class Fixtures {

    public function init(\PDO $pdo)
    {
        $pdo->exec("DROP TABLE IF EXISTS categorias");
        $pdo->exec("CREATE TABLE IF NOT EXISTS categorias ( id INTEGER PRIMARY KEY, nome VARCHAR(50) )");

        $categorias = ["Rock","Jass","Pop","New Age","Samba"];

        $sql = "INSERT INTO categorias (nome) VALUES (:cat)";
        $stmt = $pdo->prepare($sql);

        foreach($categorias as $categoria) {
            $stmt->bindParam('cat', $categoria);
            $stmt->execute();
        }
    }

} 