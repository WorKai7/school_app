CREATE OR REPLACE FUNCTION ajout_module(
    v_nummod modules.nummod%TYPE,
    v_nommod modules.nommod%TYPE,
    v_coefmod modules.coefmod%TYPE
) RETURNS VOID AS
$$
    BEGIN
        INSERT INTO modules (nummod, nommod, coefmod)
        VALUES (v_nummod, v_nommod, v_coefmod);
    END;
$$ LANGUAGE plpgsql;
