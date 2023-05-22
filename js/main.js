// Import the Bootstrap bundle
// This includes Popper and all of Bootstrap's JS plugins.
//import "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";

//
// Place any custom JS here
//

//
// Code pour le filtrage des plats sur 'card.php'
//

// pour être sûr que tous les plats seront chargés dans la page
window.onload = () => {
  let filters = document.querySelectorAll("#filters li a");

  for (let filter of filters) {
    filter.addEventListener("click", function () {
      for (let filter of filters) {
        filter.classList.remove("active");
      }
      filter.classList.add("active");
      let tag = this.id; // on identifie l'Id du filtre cliqué

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

/*
const triggerEl = document.querySelector('#myTab button[data-bs-target="#profile"]')
bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

  triggerEl.addEventListener('click', event => {
    event.preventDefault()
    tabTrigger.show()
  })
})
*/
