<?php

// Suggestion :
// 1- Créer un objet bibliothèque
// 2- Balayer ce tableau de livres et pour chaque occurrence
//     - créer un objet Livre
//     - s'il n'a aucune erreur l'ajouter à la bibliothèque
//     - sinon le détruire
// 3- Exécuter le getter de la propriété livres de l'objet bibliothèque
// 4- Exécuter les méthodes de recherche sur l'objet bibliothèque
// 5- Supprimer des livres de la bibliothèque
// 6- Exécuter le getter de la propriété livres de l'objet bibliothèque   

$listeLivres = array(
    array(
        "annee" => 2009,
        "auteur" => "Marie NDiaye",
        "titre" =>  "Trois femmes puissantes"), 
    array(
        "annee" => 2010,
        "auteur" => "Michel Houellebecq",
        "titre" =>  "La Carte et le Territoire"),
    // doublon du précédent 
    array(                                         
        "annee" => 2010,
        "auteur" => "Michel Houellebecq",
        "titre" =>  "La Carte et le Territoire"),
    // année incorrecte
    array(
        "annee" => 'aaaa',
        "auteur" => "Michel Houellebecq",
        "titre" =>  "La Carte et le Territoire"),
    array(
        "annee" => 2011,
        "auteur" => "Alexis Jenni",
        "titre" =>  "L'Art français de la guerre"),
    array(
        "annee" => 2012,
        "auteur" => "Jérôme Ferrari",
        "titre" =>  "Le Sermon sur la chute de Rome"),
    array(
        "annee" => 2013,
        "auteur" => "Pierre Lemaitre",
        "titre" =>  "Au revoir là-haut"),
    array(
        "annee" => 2014,
        "auteur" => "Lydie Salvayre",
        "titre" =>  "Pas pleurer"),
    array(
        "annee" => 2015,
        "auteur" => "Mathias Énard",
        "titre" =>  "Boussole"),
    array(
        "annee" => 2016,
        "auteur" => "Leïla Slimani",
        "titre" =>  "Chanson douce"),
    array(
        "annee" => 2016,
        "auteur" => "Gaël Faye",
        "titre" =>  "Petit pays"),
    array(
        "annee" => 2017,
        "auteur" => "Éric Vuillard",
        "titre" =>  "L'Ordre du jour"),
    array(
        "annee" => 2018,
        "auteur" => "Nicolas Mathieu",
        "titre" =>  "Leurs enfants après eux"),
    array(
        "annee" => 2019,
        "auteur" => "Jean-Paul Dubois",
        "titre" =>  "Tous les hommes n'habitent pas le monde de la même façon")
);