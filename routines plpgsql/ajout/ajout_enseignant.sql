CREATE OR REPLACE FUNCTION ajout_enseignant(
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
        INSERT INTO enseignants (numens, preens, nomens, datnaiens, adrens, cpens, vilens, telens, foncens, datembens)
        VALUES (v_numens, v_preens, v_nomens, v_datnaiens, v_adrens, v_cpens, v_vilens, v_telens, v_foncens, v_datembens);
    END;
$$ LANGUAGE plpgsql;
