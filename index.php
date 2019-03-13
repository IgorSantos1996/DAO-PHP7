<?php
    require_once("config.php"); 
    /*$sql = new SQL();
    $usuarios = $sql->select("SELECT * FROM tb_usuarios");
    echo json_encode ($usuarios);
    */
    $x = new Usuario();
    $x->loadById(5);
    echo $x;
?>