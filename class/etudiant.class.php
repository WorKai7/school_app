<?php
class Etudiants {

    private $numetu;
    private $old_numetu;
    private $nometu;
    private $prenometu;
    private $adretu;
    private $viletu;
    private $cpetu;
    private $teletu;
    private $datentetu;
    private $annetu;
    private $remetu;
    private $sexetu;
    private $datnaietu;
    private $pdo;

    public static function getGeneralLeaderboard($pdo, $annee = null, $nummod = 1) {
        $sql = $annee == null ? "SELECT etudiants.*, AVG(avoir_note.note) AS moyenne
                                 FROM etudiants
                                 INNER JOIN avoir_note ON avoir_note.numetu = etudiants.numetu
                                 WHERE avoir_note.numepr IN (SELECT numepr
                                                             FROM epreuves
                                                             WHERE matepr IN (SELECT nummat
                                                                              FROM matieres
                                                                              WHERE nummod = :nummod))
                                 GROUP BY etudiants.numetu
                                 ORDER BY moyenne DESC;"

                            : "SELECT etudiants.*, AVG(avoir_note.note) AS moyenne
                               FROM etudiants
                               INNER JOIN avoir_note ON avoir_note.numetu = etudiants.numetu
                               WHERE avoir_note.numepr IN (SELECT numepr
                                                           FROM epreuves
                                                           WHERE matepr IN (SELECT nummat
                                                                            FROM matieres
                                                                            WHERE nummod = :nummod))
                               AND etudiants.annetu = :annee
                               GROUP BY etudiants.numetu
                               ORDER BY moyenne DESC;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":nummod", $nummod);
        if ($annee != null) {
            $stmt->bindValue(":annee", $annee);
        }
        $stmt->execute();
        $classement = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $etudiants = array();
        $notes = array();

        foreach ($classement as $ligne) {
            $etudiants[] = new Etudiants($pdo, $ligne);
            $notes[] = $ligne["moyenne"];
        }

        return [$etudiants, $notes];
    }

    public static function getMod($pdo) {
        $sql = "SELECT nummod, nommod FROM modules";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchAll($pdo) {
        $sql = "SELECT * FROM etudiants";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tab_etu = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $etudiants = array();
        foreach ($tab_etu as $etu) {
            $etudiants[] = new Etudiants($pdo, $etu);
        }

        return $etudiants;
    }

    public static function find($pdo, $criteres) {
        $sql = "SELECT * FROM etudiants";
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
            $tab_etu = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $etudiants = array();
            foreach ($tab_etu as $etu) {
                $etudiants[] = new Etudiants($pdo, $etu);
            }

            return $etudiants;
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

    public function fetch($numetu) {
        if ($numetu) {
            $sql = "SELECT * from etudiants WHERE numetu = :numetu";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":numetu", $numetu);
            $stmt->execute();
            $etu = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $_SESSION["mesgs"]["errors"][] = "Erreur: Entrez un numetu";
        }

        $this->hydrate($etu);
    }

    public function create() {
        try {

            $this->pdo->beginTransaction();

            $add_student_query = "SELECT ajout_etudiant(:numetu, :nometu, :prenometu, :adretu, :viletu, :cpetu, :teletu, :datentetu, :annetu, :remetu, :sexetu, :datnaietu);";

            $stmt = $this->pdo->prepare($add_student_query);
            $stmt->bindValue(":numetu", $this->numetu);
            $stmt->bindValue(":nometu", $this->nometu);
            $stmt->bindValue(":prenometu", $this->prenometu);
            $stmt->bindValue(":adretu", $this->adretu);
            $stmt->bindValue(":viletu", $this->viletu);
            $stmt->bindValue(":cpetu", $this->cpetu);
            $stmt->bindValue(":teletu", $this->teletu);
            $stmt->bindValue(":datentetu", $this->datentetu);
            $stmt->bindValue(":annetu", $this->annetu);
            $stmt->bindValue(":remetu", $this->remetu);
            $stmt->bindValue(":sexetu", $this->sexetu);
            $stmt->bindValue(":datnaietu", $this->datnaietu);

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

            $update_etu = "SELECT modif_etudiant(:old_numetu, :numetu, :nometu, :prenometu, :adretu, :viletu, :cpetu, :teletu, :datentetu, :annetu, :remetu, :sexetu, :datnaietu);";

        $stmt = $this->pdo->prepare($update_etu);
        $stmt->bindValue(":old_numetu", $this->old_numetu);
        $stmt->bindValue(":numetu", $this->numetu);
        $stmt->bindValue(":nometu", $this->nometu);
        $stmt->bindValue(":prenometu", $this->prenometu);
        $stmt->bindValue(":viletu", $this->viletu);
        $stmt->bindValue(":cpetu", $this->cpetu);
        $stmt->bindValue(":adretu", $this->adretu);
        $stmt->bindValue(":teletu", $this->teletu);
        $stmt->bindValue(":datentetu", $this->datentetu);
        $stmt->bindValue(":annetu", $this->annetu);
        $stmt->bindValue(":remetu", $this->remetu);
        $stmt->bindValue(":sexetu", $this->sexetu);
        $stmt->bindValue(":datnaietu", $this->datnaietu);

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

            $delete_etu = "DELETE FROM etudiants WHERE numetu = :numetu";

            $stmt = $this->pdo->prepare($delete_etu);
            $stmt->bindValue(":numetu", $this->numetu);

            $stmt->execute();

            $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function getLeaderboard() {
        $sql = "SELECT nommod, moyenne, classement
                FROM (SELECT etudiants.numetu, etudiants.nometu, etudiants.prenometu, modules.nommod, AVG(note) AS moyenne, RANK() OVER (PARTITION BY modules.nommod ORDER BY AVG(note) DESC) AS classement
                      FROM etudiants
                      INNER JOIN avoir_note ON avoir_note.numetu = etudiants.numetu
                      INNER JOIN epreuves ON epreuves.numepr = avoir_note.numepr
                      INNER JOIN matieres ON matieres.nummat = epreuves.matepr
                      INNER JOIN modules ON modules.nummod = matieres.nummod
                      GROUP BY etudiants.numetu, modules.nommod)
                AS classements
                WHERE numetu = :numetu;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":numetu", $this->numetu);
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