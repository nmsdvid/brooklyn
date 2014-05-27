<?php
/**
 * logout
 */

if(isset($_COOKIE['brooklyn'])) {
    unset($_COOKIE['brooklyn']);
    setcookie('brooklyn', null, -1, '/');
}

header("Location: /login/");
?>