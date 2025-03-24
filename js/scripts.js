
function updateYear(diplom_year, default_year=null) {
    let year = document.getElementById("year");
    year.innerHTML = "";

    for (let i = 1; i <= diplom_year[document.getElementById("diploma").selectedIndex-1]; i++) {
        if (default_year == i) {
            year.innerHTML += "<option value='" + i + "' selected>" + i + "</option>";
        } else {
            year.innerHTML += "<option value='" + i + "'>" + i + "</option>";
        }
    }

    year.focus();
}
