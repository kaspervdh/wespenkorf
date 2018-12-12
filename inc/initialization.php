<?php
/**
 * Created by PhpStorm.
 * User: Kaspervdh
 * Date: 10/23/2018
 * Time: 1:55 PM
 * Description: includes all dependencies on every page needed.
 */

session_start();  /* starts session */
require("links.html");  /* includes all necessary links */
require("functions.php");  /* includes all necessary functions */
$connect = connectToDatabase();  /* Starts connection to database */
$website_name = "Wespenkorf.nl";
$favicon = "media/onsite/favicon.png";
$logo = $favicon;
