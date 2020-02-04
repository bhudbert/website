<?php

/*
 *
 * For 1st version , it will only manage connexion ,request and deconnexion
 *
 */
class database
{

    private $login;

    private $pass;

    private $connec;

    public function __construct($db, $login = 'root', $pass = '')
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->db = $db;
        $this->connexion();
    }

    private function connexion()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=' . $this->db, $this->login, $this->pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->connec = $bdd;
        } catch (PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }
    }

    public function query($sql, Array $cond = null)
    {
        $stmt = $this->connec->prepare($sql);

        if ($cond) {
            foreach ($cond as $v) {
                $stmt->bindParam($v[0], $v[1], $v[2]);
            }
        }

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->closeCursor();
        $stmt = NULL;
    }
}