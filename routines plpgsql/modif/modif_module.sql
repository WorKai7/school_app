CREATE OR REPLACE FUNCTION modif_module(
    v_old_nummod modules.nummod%TYPE,
    v_nummod modules.nummod%TYPE,
    v_nommod modules.nommod%TYPE,
    v_coefmod modules.coefmod%TYPE
) RETURNS VOID AS
$$
    BEGIN
        UPDATE modules
        SET nummod = v_nummod,
            nommod = v_nommod,
            coefmod = v_coefmod
        WHERE nummod = v_old_nummod;
    END;
$$ LANGUAGE plpgsql;
