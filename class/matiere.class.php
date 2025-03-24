<?php
class Matiere {

    private $nummat;
    private $old_nummat;
    private $nommat;
    private $nummod;
    private $coefmat;
    private $pdo;

    public static function getMod($pdo) {
        $sql = "SELECT nummod, nommod FROM modules";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchAll($pdo) {
        $sql = "SELECT * FROM matieres";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tab_mat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $matieres = array();
        foreach ($tab_mat as $mat) {
            $matieres[] = new Matiere($pdo, $mat);
        }

        return $matieres;
    }

    public static function find($pdo, $criteres) {
        $sql = "SELECT * FROM matieres";
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
            $tab_mat = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $matieres = array();
            foreach ($tab_mat as $mat) {
                $matieres[] = new Matiere($pdo, $mat);
            }

            return $matieres;
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

    public function fetch($nummat) {
        if ($nummat) {
            $sql = "SELECT * from matieres WHERE nummat = :nummat";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":nummat", $nummat);
            $stmt->execute();
            $matiere = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $_SESSION["mesgs"]["errors"][] = "Erreur: Entrez un nummat valide";
        }

        $this->hydrate($matiere);
    }

    public function getModName() {
        $sql = "SELECT nommod FROM modules WHERE nummod = :nummod";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nummod", $this->nummod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["nommod"];
    }

    public function create() {
        try {

            $this->pdo->beginTransaction();

            $add_mat_query = "SELECT ajout_matiere(:nummat, :nommat, :nummod, :coefmat);";

            $stmt = $this->pdo->prepare($add_mat_query);
            $stmt->bindValue(":nummat", $this->nummat);
            $stmt->bindValue(":nommat", $this->nommat);
            $stmt->bindValue(":nummod", $this->nummod);
            $stmt->bindValue(":coefmat", $this->coefmat);

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

            $update_mat = "SELECT modif_matiere(:old_nummat, :nummat, :nommat, :nummod, :coefmat);";

            $stmt = $this->pdo->prepare($update_mat);
            $stmt->bindValue(":old_nummat", $this->old_nummat);
            $stmt->bindValue(":nummat", $this->nummat);
            $stmt->bindValue(":nommat", $this->nommat);
            $stmt->bindValue(":nummod", $this->nummod);
            $stmt->bindValue(":coefmat", $this->coefmat);

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

            $delete_course = "DELETE FROM faire_cours WHERE nummat = :nummat";

            $stmt = $this->pdo->prepare($delete_course);
            $stmt->bindValue(":nummat", $this->nummat);

            $stmt->execute();

            $delete_mat = "DELETE FROM matieres WHERE nummat = :nummat";

            $stmt = $this->pdo->prepare($delete_mat);
            $stmt->bindValue(":nummat", $this->nummat);

            $stmt->execute();

            $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function getLeaderboard() {
        $sql = "SELECT etudiants.*, AVG(avoir_note.note) AS moyenne
                FROM etudiants
                INNER JOIN avoir_note ON avoir_note.numetu = etudiants.numetu
                WHERE avoir_note.numepr IN (SELECT numepr
                                           FROM epreuves
                                           WHERE matepr = :nummat)
                GROUP BY etudiants.numetu
                ORDER BY moyenne DESC;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nummat", $this->nummat);
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