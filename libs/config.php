<?php
// Déclaration d'une constante de la capacité maxi en couverts (type STRING)
define('SEAT_CAPACITY', '20');
// Déclaration d'une constante des horaires d'ouverture (ARRAY)
define(
  'OPENING_HOURS',
  [
    'Lundi - Jeudi' => '10:00 - 23:00',
    'Vendredi - Dimanche' => '12:00 - 15:00'
  ],
);
// Constante pour définir le chemin vers le répertoire des images du Carousel
define('_GALLERY_IMG_PATH_', './upload/');
// Constante pour définir les infos affichées des Menus 
define(
  'MENUS_DATA',
  [
    'MENU DU MARCHÉ' => [
      'data-aos' => 'fade-up',
      'data-aos-delay' => '0',
      'img_path' => './assets/img/potchon.webp',
      'description' => 'Menu concocté avec les ingrédients de saison, achetés au marché Bio.',
      'noon-price' => '14',
      'evening-price' => '20'
    ],
    'MENU SAVOYARD' => [
      'data-aos' => 'fade-up',
      'data-aos-delay' => '200',
      'img_path' => './assets/img/fondue-trois-fromages.webp',
      'description' => 'Fondue ou raclette aux 3 fromages avec charcuterie AOP, vin de Pays.',
      'noon-price' => '23',
      'evening-price' => '29'
    ],
    'MENU GOURMET' =>
    [
      'data-aos' => 'fade-up',
      'data-aos-delay' => '400',
      'img_path' => './assets/img/tartiflette-au-reblochon-et-aux-lardons.webp',
      'description' => 'Truite du lac et poulet de Bresse (sauce aux champignons), vin de Pays.',
      'noon-price' => '33',
      'evening-price' => '39'
    ],
  ]
);
