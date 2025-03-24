CREATE OR REPLACE FUNCTION ajout_etudiant(
    v_numetu etudiants.numetu%TYPE,
    v_nometu etudiants.nometu%TYPE,
    v_prenometu etudiants.prenometu%TYPE,
    v_adretu etudiants.adretu%TYPE,
    v_viletu etudiants.viletu%TYPE,
    v_cpetu etudiants.cpetu%TYPE,
    v_teletu etudiants.teletu%TYPE,
    v_datentetu etudiants.datentetu%TYPE,
    v_annetu etudiants.annetu%TYPE,
    v_remetu etudiants.remetu%TYPE,
    v_sexetu etudiants.sexetu%TYPE,
    v_datnaietu etudiants.datnaietu%TYPE 
) RETURNS VOID AS
$$
    BEGIN
        INSERT INTO etudiants (numetu, nometu, prenometu, adretu, viletu, cpetu, teletu, datentetu, annetu, remetu, sexetu, datnaietu)
        VALUES (v_numetu, v_nometu, v_prenometu, v_adretu, v_viletu, v_cpetu, v_teletu, v_datentetu, v_annetu, v_remetu, v_sexetu, v_datnaietu);
    END;
$$ LANGUAGE plpgsql;
