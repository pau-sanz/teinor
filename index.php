<?php
require_once("controllers/autoload.php");

$ctl = "index";

if (isset($_REQUEST['ctl'])) {
    $ctl = $_REQUEST['ctl'];
    $act = null;
    if (isset($_REQUEST['act'])) {
        $act = $_REQUEST['act'];
    }
}


switch ($ctl) {
    case"add":
        switch ($act) {
            case "film":
                include "controllers/addFilm_ctl.php";
                break;
        }
        break;
    case"show":
        switch ($act) {
            case "films":
                include "controllers/showFilms_ctl.php";
                break;
        }
        break;
    default:
        include "controllers/" . $ctl . "_ctl.php";
        break;
}
?>