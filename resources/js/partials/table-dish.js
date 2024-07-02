const table = document.getElementById("table");
const cards = document.getElementById("cards");
const tableIcon = document.querySelector(".fa-table-list");
const cardsIcon = document.querySelector(".fa-grip");

tableIcon.addEventListener("click", function () {
    table.classList.remove("d-none");
    cards.classList.add("d-none");
});

cardsIcon.addEventListener("click", function () {
    table.classList.add("d-none");
    cards.classList.remove("d-none");
});