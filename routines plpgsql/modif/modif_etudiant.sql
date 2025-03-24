CREATE OR REPLACE FUNCTION modif_etudiant(
    v_old_numetu etudiants.numetu%TYPE,
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
        UPDATE etudiants
        SET numetu = v_numetu,
            nometu = v_nometu,
            prenometu = v_prenometu,
            viletu = v_viletu,
            cpetu = v_cpetu,
            adretu = v_adretu,
            teletu = v_teletu,
            datentetu = v_datentetu,
            annetu = v_annetu,
            remetu = v_remetu,
            sexetu = v_sexetu,
            datnaietu = v_datnaietu
        WHERE numetu = v_old_numetu;
    END;
$$ LANGUAGE plpgsql;
