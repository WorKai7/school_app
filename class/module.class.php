<?php
class Module {

    private $nummod;
    private $old_nummod;
    private $nommod;
    private $coefmod;
    private $pdo;

    public static function fetchAll($pdo) {
        $sql = "SELECT * FROM modules";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tab_mod = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $modules = array();
        foreach ($tab_mod as $mod) {
            $modules[] = new Module($pdo, $mod);
        }

        return $modules;
    }

    public static function find($pdo, $criteres) {
        $sql = "SELECT * FROM modules";
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
            $tab_mod = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $modules = array();
            foreach ($tab_mod as $mod) {
                $modules[] = new Module($pdo, $mod);
            }

            return $modules;
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

    public function fetch($nummod) {
        if ($nummod) {
            $sql = "SELECT * from modules WHERE nummod = :nummod";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":nummod", $nummod);
            $stmt->execute();
            $module = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $_SESSION["mesgs"]["errors"][] = "Erreur: Entrez un nummod valide";
        }

        $this->hydrate($module);
    }

    public function create() {
        try {

            $this->pdo->beginTransaction();

            $add_module_query = "SELECT ajout_module(:nummod, :nommod, :coefmod);";

            $stmt = $this->pdo->prepare($add_module_query);
            $stmt->bindValue(":nummod", $this->nummod);
            $stmt->bindValue(":nommod", $this->nommod);
            $stmt->bindValue(":coefmod", $this->coefmod);

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

            $update_mod = "SELECT modif_module(:old_nummod, :nummod, :nommod, :coefmod);";

            $stmt = $this->pdo->prepare($update_mod);
            $stmt->bindValue(":old_nummod", $this->old_nummod);
            $stmt->bindValue(":nummod", $this->nummod);
            $stmt->bindValue(":nommod", $this->nommod);
            $stmt->bindValue(":coefmod", $this->coefmod);

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

            $delete_course = "DELETE FROM faire_cours WHERE nummat = (SELECT nummat FROM matieres WHERE nummod = :nummod)";

            $stmt = $this->pdo->prepare($delete_course);
            $stmt->bindValue(":nummod", $this->nummod);

            $stmt->execute();

            $delete_matiere = "DELETE FROM matieres WHERE nummod = :nummod";

            $stmt = $this->pdo->prepare($delete_matiere);
            $stmt->bindValue(":nummod", $this->nummod);

            $stmt->execute();

            $delete_module = "DELETE FROM modules WHERE nummod = :nummod";

            $stmt = $this->pdo->prepare($delete_module);
            $stmt->bindValue(":nummod", $this->nummod);

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
                                           WHERE matepr IN (SELECT nummat
                                                            FROM matieres
                                                            WHERE nummod = :nummod))
                GROUP BY etudiants.numetu
                ORDER BY moyenne DESC;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nummod", $this->nummod);
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