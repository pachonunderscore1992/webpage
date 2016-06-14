<?php

   $id_grupo = $_POST['id_grupo'];
   $id_usuario = $_POST['id_usuario'];

   $servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
   $kpop = mysql_connect($servername, $username, $password);
   mysql_select_db($database_kpop, $kpop);

   $voto_query = "SELECT * FROM voto_grupo WHERE id_usuario = '".$id_usuario."' AND id_grupo = '".$id_grupo."';";
   $votos = mysql_query($voto_query, $kpop) or die(mysql_error());
   $cantidad_votos = mysql_num_rows($votos);

   if($cantidad_votos > 0) {
      $delete_query = "DELETE FROM voto_grupo WHERE id_usuario = '".$id_usuario."' AND id_grupo = '".$id_grupo."';";
      mysql_query($delete_query);
   } else {
      $delete_query = "INSERT INTO voto_grupo VALUES('".$id_grupo."','".$id_usuario."');";
      mysql_query($delete_query);
   }

?>