CREATE OR REPLACE FUNCTION ajout_matiere(
    v_nummat matieres.nummat%TYPE,
    v_nommat matieres.nommat%TYPE,
    v_nummod matieres.nummod%TYPE,
    v_coefmat matieres.coefmat%TYPE
) RETURNS VOID AS
$$
    BEGIN
        INSERT INTO matieres (nummat, nommat, nummod, coefmat)
        VALUES (v_nummat, v_nommat, v_nummod, v_coefmat);
    END;
$$ LANGUAGE plpgsql;
