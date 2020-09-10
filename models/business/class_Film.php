<?php

class Film {

    private $title;
    private $year;

    function __construct($title, $year) {

        $this->setTitle($title);
        $this->setYear($year);
    }

    function getTitle() {
        return $this->title;
    }

    function getYear() {
        return $this->year;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setYear($year) {
        $this->year = $year;
    }

    function addFilm($film) {
        $filmDAO = new FilmDAO();
        $filmDAO->add($film); 
    }

    function showFilms() {
        $filmDAO = new FilmDAO();
        return $filmDAO->populateFilms();
    }
    
    function showFilmsByTitle($title) {
        $filmDAO = new FilmDAO();
        return $filmDAO->getFilmsByTitle($title);
    }

}
