<?php

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
