<?php
class Cours {

    private $numens;
    private $old_numens;
    private $nummat;
    private $old_nummat;
    private $annee;
    private $old_annee;
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
        $sql = "SELECT * FROM faire_cours";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tab_cours = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cours = array();
        foreach ($tab_cours as $c) {
            $cours[] = new Cours($pdo, $c);
        }

        return $cours;
    }

    public static function find($pdo, $criteres) {
        $sql = "SELECT * FROM faire_cours";
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
            $tab_cours = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $cours = array();
            foreach ($tab_cours as $c) {
                $cours[] = new Cours($pdo, $c);
            }

            return $cours;
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

    public function fetch($numens, $nummat, $annee) {
        if ($numens && $nummat && $annee) {
            $sql = "SELECT * from faire_cours WHERE nummat = :nummat AND numens = :numens AND annee = :annee";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":nummat", $nummat);
            $stmt->bindValue(":numens", $numens);
            $stmt->bindValue(":annee", $annee);
            $stmt->execute();
            $cours = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $_SESSION["mesgs"]["errors"][] = "Erreur: Entrez un numens un nummat et une annee";
        }

        $this->hydrate($cours);
    }

    public function getMatName() {
        $sql = "SELECT nommat FROM matieres WHERE nummat = :nummat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nummat", $this->nummat);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["nommat"];
    }

    public function getEnsName() {
        $sql = "SELECT preens, nomens FROM enseignants WHERE numens = :numens";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":numens", $this->numens);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res["preens"] . ' ' .  $res["nomens"];
    }

    public function create() {
        try {

            $this->pdo->beginTransaction();

            $add_course_query = "INSERT INTO faire_cours (numens, nummat, annee)
                    VALUES (:numens, :nummat, :annee);";

            $stmt = $this->pdo->prepare($add_course_query);
            $stmt->bindValue(":numens", $this->numens);
            $stmt->bindValue(":nummat", $this->nummat);
            $stmt->bindValue(":annee", $this->annee);

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

            $update_cours = "UPDATE faire_cours
                             SET numens = :numens,
                                 nummat = :nummat,
                                 annee = :annee
                             WHERE numens = :old_numens
                             AND nummat = :old_nummat
                             AND annee = :old_annee;";

            $stmt = $this->pdo->prepare($update_cours);
            $stmt->bindValue(":numens", $this->numens);
            $stmt->bindValue(":nummat", $this->nummat);
            $stmt->bindValue(":annee", $this->annee);
            $stmt->bindValue(":old_numens", $this->old_numens);
            $stmt->bindValue(":old_nummat", $this->old_nummat);
            $stmt->bindValue(":old_annee", $this->old_annee);

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

            $delete_cours = "DELETE FROM faire_cours WHERE numens = :numens AND nummat = :nummat AND annee = :annee";

            $stmt = $this->pdo->prepare($delete_cours);
            $stmt->bindValue(":numens", $this->numens);
            $stmt->bindValue(":nummat", $this->nummat);
            $stmt->bindValue(":annee", $this->annee);

            $stmt->execute();

            $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function hydrate($data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}