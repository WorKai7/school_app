CREATE OR REPLACE FUNCTION modif_matiere(
    v_old_nummat matieres.nummat%TYPE,
    v_nummat matieres.nummat%TYPE,
    v_nommat matieres.nommat%TYPE,
    v_nummod matieres.nummod%TYPE,
    v_coefmat matieres.coefmat%TYPE
) RETURNS VOID AS
$$
    BEGIN
        UPDATE matieres
        SET nummat = v_nummat,
            nommat = v_nommat,
            nummod = v_nummod,
            coefmat = v_coefmat
        WHERE nummat = v_old_nummat;
    END;
$$ LANGUAGE plpgsql;
