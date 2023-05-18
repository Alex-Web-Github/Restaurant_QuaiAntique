// Import the Bootstrap bundle
//
// This includes Popper and all of Bootstrap's JS plugins.

import "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";

//
// Place any custom JS here
//

// Pour le 'tooltip' sur les icônes de la barre d'Admin.
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

//
// Code pour le filtrage des plats sur 'card.php'
//
window.onload = () => {
  // pour être sûr que tous les plats seront  chargés dans la page
  let filters = document.querySelectorAll("#filters li");
  //console.log(filters);
  for (let filter of filters) {
    filter.addEventListener("click", function () {
      let tag = this.id; //identifie l'Id du filtre cliqué

      let dishes = document.querySelectorAll("#gallery div.col");
      //console.log(dishes);
      for (let dishe of dishes) {
        dishe.classList.add("inactive"); // on cache tous les plats au Click

        if (tag in dishe.dataset || tag === "all") {
          // on fait apparaître les plats dont le 'dataset' correspond à celui de l'Id du filtre cliqué
          dishe.classList.remove("inactive");
        }
      }
    });
  }
};
