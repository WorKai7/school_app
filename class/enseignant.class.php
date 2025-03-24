<?php
class Enseignant {

    private $numens;
    private $old_numens;
    private $preens;
    private $nomens;
    private $foncens;
    private $datnaiens;
    private $adrens;
    private $cpens;
    private $vilens;
    private $telens;
    private $datembens;
    private $pdo;

    public static function fetchAll($pdo) {
        $sql = "SELECT * FROM enseignants";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tab_ens = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $enseignants = array();
        foreach ($tab_ens as $ens) {
            $enseignants[] = new Enseignant($pdo, $ens);
        }

        return $enseignants;
    }

    public static function find($pdo, $criteres) {
        $sql = "SELECT * FROM enseignants";
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
            $tab_ens = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $enseignants = array();
            foreach ($tab_ens as $ens) {
                $enseignants[] = new Enseignant($pdo, $ens);
            }

            return $enseignants;
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

    public function fetch($numens) {
        if ($numens) {
            $sql = "SELECT * from enseignants WHERE numens = :numens";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":numens", $numens);
            $stmt->execute();
            $ens = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $_SESSION["mesgs"]["errors"][] = "Erreur: Entrez un numens";
        }

        $this->hydrate($ens);
    }

    public function create() {
        try {
        
            $this->pdo->beginTransaction();

            $add_teacher_query = "SELECT ajout_enseignant(:numens, :preens, :nomens, :datnaiens, :adrens, :cpens, :vilens, :telens, :foncens, :datembens);";

            $stmt = $this->pdo->prepare($add_teacher_query);
            $stmt->bindValue(":numens", $this->numens);
            $stmt->bindValue(":preens", $this->preens);
            $stmt->bindValue(":nomens", $this->nomens);
            $stmt->bindValue(":datnaiens", $this->datnaiens);
            $stmt->bindValue(":adrens", $this->adrens);
            $stmt->bindValue(":cpens", $this->cpens);
            $stmt->bindValue(":vilens", $this->vilens);
            $stmt->bindValue(":telens", $this->telens);
            $stmt->bindValue(":foncens", $this->foncens);
            $stmt->bindValue(":datembens", $this->datembens);

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

            $update_ens = "SELECT modif_enseignant(:old_numens, :numens, :preens, :nomens, :datnaiens, :adrens, :cpens, :vilens, :telens, :foncens, :datembens);";

        $stmt = $this->pdo->prepare($update_ens);
        $stmt->bindValue(":old_numens", $this->old_numens);
        $stmt->bindValue(":numens", $this->numens);
        $stmt->bindValue(":preens", $this->preens);
        $stmt->bindValue(":nomens", $this->nomens);
        $stmt->bindValue(":datnaiens", $this->datnaiens);
        $stmt->bindValue(":adrens", $this->adrens);
        $stmt->bindValue(":cpens", $this->cpens);
        $stmt->bindValue(":vilens", $this->vilens);
        $stmt->bindValue(":foncens", $this->foncens);
        $stmt->bindValue(":telens", $this->telens);
        $stmt->bindValue(":datembens", $this->datembens);

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

            $delete_course = "DELETE FROM faire_cours WHERE numens = :numens";

            $stmt = $this->pdo->prepare($delete_course);
            $stmt->bindValue(":numens", $this->numens);

            $stmt->execute();

            $delete_ens = "DELETE FROM enseignants WHERE numens = :numens";

            $stmt = $this->pdo->prepare($delete_ens);
            $stmt->bindValue(":numens", $this->numens);

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