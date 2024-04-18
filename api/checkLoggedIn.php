<?php

function checkLoggedIn(){
    if(!isset($_SESSION['user_id'])){
        Flight::halt(401, 'Not logged in');
    }
}