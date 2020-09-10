<?php

include_once("controllers/autoload.php");
require_once("config/config.inc.php");
require_once("config/db.inc.php");

class FilmDAO {

    public function add($film) {
        $con = new db();
        $query = $con->prepare("INSERT INTO film (title, year) values (:title, :year)");
        $query->bindValue(":title", $film->getTitle());
        $query->bindValue(":year", $film->getYear());
        $con->consult($query);
        $con = null;
    }

    public function populateFilms($orderBy = "DESC") {
        $filmsArray = array();
        $con = new db();
        $query = $con->prepare("SELECT title, YEAR(year) as year FROM film ORDER BY year ".$orderBy.";");
        $result = $con->consult($query);

        foreach ($result as $row) {
            $title = $row["title"];
            $year = $row["year"];
            $film = new Film($title, $year);


            array_push($filmsArray, $film);
        }
        $con = null;
        return $filmsArray;
    }
    
    public function getFilmsByTitle($title, $orderBy) 
    {
        if($title=="") return null;
        
        $filmsArray = array();
        $con = new db();
        $query = $con->prepare("SELECT title, YEAR(year) as year FROM film WHERE title LIKE '%".$title."%' ORDER BY year ".$orderBy.";");
        $result = $con->consult($query);
        
        if(count($result) === 0) return null;
        
        foreach ($result as $row) {
            $title = $row["title"];
            $year = $row["year"];
            $film = new Film($title, $year);


            array_push($filmsArray, $film);
        }
        $con = null;
        return $filmsArray;
    }
    
    

}

?>