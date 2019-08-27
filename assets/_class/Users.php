<?php
class GestionUtilisateur {
    private $_db; // Instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function add($utilisateur) {
        $q = $this->_db->prepare('INSERT INTO accounts(pseudo, password, email, code, state, created) VALUES(:pseudo, :password, :email, :code, :state, :created)');

        $q->bindParam(':pseudo', $utilisateur->pseudo);
        $q->bindParam(':password', $utilisateur->pass);
        $q->bindParam(':email', $utilisateur->email);
        $q->bindParam(':code', $utilisateur->code);
        $q->bindParam(':state', '0');
        $q->bindParam(':created', $utilisateur->created);

        $q->execute();
    }
    public function activateAccount($utilisateur) {
        $q = $this->_db->prepare('UPDATE accounts SET state=:state WHERE email= :email');

        $q->bindParam(':state', $utilisateur->state);
        $q->bindParam(':email', $utilisateur->email);

        $q->execute();
    }

    public function get($id) {
        $id = (int) $id;

        $q = $this->_db->query('SELECT * FROM accounts WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return (object)($donnees);
    }

    public function getbymail($email) {
        $q = $this->_db->prepare('SELECT * FROM accounts WHERE email = ?');
        $q->execute(array(
            htmlentities($email),
        ));
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return (object)($donnees);
    }

    public function getbypseudo($peudo) {
        $q = $this->_db->prepare('SELECT * FROM accounts WHERE pseudo = ?');
        $q->execute(array(
            htmlentities($peudo),
        ));
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return (object)($donnees);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}