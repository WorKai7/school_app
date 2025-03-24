<?php
class Epreuve {

    private $numepr;
    private $old_numepr;
    private $libepr;
    private $ensepr;
    private $matepr;
    private $datepr;
    private $coefepr;
    private $annepr;
    private $pdo;

    public static function getEns($pdo) {
        $sql = "SELECT numens, preens, nomens FROM enseignants";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMat($pdo) {
        $sql = "SELECT nummat, nommat FROM matieres";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchAll($pdo) {
        $sql = "SELECT * FROM epreuves";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tab_epr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $epreuves = array();
        foreach ($tab_epr as $epr) {
            $epreuves[] = new Epreuve($pdo, $epr);
        }

        return $epreuves;
    }

    public static function find($pdo, $criteres) {
        $sql = "SELECT * FROM epreuves";
        if (!empty($criteres)) {
            $sql .= " WHERE ";
            foreach ($criteres as $critere => $valeur) {
                $sql .= "$critere = '$valeur' AND ";
            }
            $sql = substr($sql, 0, -5);
        }

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $tab_epr = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $epreuves = array();
            foreach ($tab_epr as $epr) {
                $epreuves[] = new Epreuve($pdo, $epr);
            }

            return $epreuves;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function __construct($pdo, $data = array()) {
        $this->pdo = $pdo;
        $this->hydrate($data);
    }


    public function __get($property) {
        return property_exists($this, $property) ? $this->$property : null;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function getMatName() {
        $sql = "SELECT nommat FROM matieres WHERE nummat = :matepr";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":matepr", $this->matepr);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["nommat"];
    }

    public function getEnsName() {
        $sql = "SELECT preens, nomens FROM enseignants WHERE numens = :ensepr";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":ensepr", $this->ensepr);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res["preens"] . ' ' .  $res["nomens"];
    }

    public function fetch($numepr) {
        if ($numepr) {
            $sql = "SELECT * from epreuves WHERE numepr = :numepr";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":numepr", $numepr);
            $stmt->execute();
            $epreuve = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $_SESSION["mesgs"]["errors"][] = "Erreur: Entrez un numepr valide";
        }

        $this->hydrate($epreuve);
    }

    public function create() {
        try {

            $this->pdo->beginTransaction();

            $sql = "INSERT INTO epreuves (numepr, libepr, ensepr, matepr, datepr, coefepr, annepr)
                    VALUES (:numepr, :libepr, :ensepr, :matepr, :datepr, :coefepr, :annepr);";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":numepr", $this->numepr);
            $stmt->bindValue(":libepr", $this->libepr);
            $stmt->bindValue(":ensepr", $this->ensepr);
            $stmt->bindValue(":matepr", $this->matepr);
            $stmt->bindValue(":datepr", $this->datepr);
            $stmt->bindValue(":coefepr", $this->coefepr);
            $stmt->bindValue(":annepr", $this->annepr);

            $stmt->execute();

            $this->pdo->commit();

        } catch(PDOException $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function update() {
        try {
            $this->pdo->beginTransaction();

            $sql = "UPDATE epreuves
                           SET numepr = :numepr,
                               libepr = :libepr,
                               ensepr = :ensepr,
                               matepr = :matepr,
                               datepr = :datepr,
                               coefepr = :coefepr,
                               annepr = :annepr
                           WHERE numepr = :old_numepr";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":numepr", $this->numepr);
            $stmt->bindValue(":libepr", $this->libepr);
            $stmt->bindValue(":ensepr", $this->ensepr);
            $stmt->bindValue(":matepr", $this->matepr);
            $stmt->bindValue(":datepr", $this->datepr);
            $stmt->bindValue(":coefepr", $this->coefepr);
            $stmt->bindValue(":annepr", $this->annepr);
            $stmt->bindValue(":old_numepr", $this->old_numepr);

            $stmt->execute();

            $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function delete() {
        try {
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM epreuves WHERE numepr = :numepr";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":numepr", $this->numepr);

            $stmt->execute();

            $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function getLeaderboard() {
        $sql = "SELECT *
                FROM etudiants
                INNER JOIN avoir_note ON avoir_note.numetu = etudiants.numetu
                WHERE avoir_note.numepr = :numepr
                ORDER BY avoir_note.note DESC;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":numepr", $this->numepr);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hydrate($data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}