let date = new Date();

document.getElementById('year').innerHTML = date.getFullYear() == "2021" ? "2021" : "2021-" + date.getFullYear();