<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    echo "<pre>";
    print_r($_SERVER);
    print_r($_GET);
    echo "</pre>";
}
?>