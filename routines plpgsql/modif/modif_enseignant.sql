CREATE OR REPLACE FUNCTION modif_enseignant(
    v_old_numens enseignants.numens%TYPE,
    v_numens enseignants.numens%TYPE,
    v_preens enseignants.preens%TYPE,
    v_nomens enseignants.nomens%TYPE,
    v_datnaiens enseignants.datnaiens%TYPE,
    v_adrens enseignants.adrens%TYPE,
    v_cpens enseignants.cpens%TYPE,
    v_vilens enseignants.vilens%TYPE,
    v_telens enseignants.telens%TYPE,
    v_foncens enseignants.foncens%TYPE,
    v_datembens enseignants.datembens%TYPE
) RETURNS VOID AS
$$
    BEGIN
        UPDATE enseignants
        SET numens = v_numens,
            preens = v_preens,
            nomens = v_nomens,
            datnaiens = v_datnaiens,
            adrens = v_adrens,
            cpens = v_cpens,
            vilens = v_vilens,
            telens = v_telens,
            foncens = v_foncens,
            datembens = v_datembens
        WHERE numens = v_old_numens;
    END;
$$ LANGUAGE plpgsql;
