<?php

$query = "SELECT DISTINCT eu.empresa, e.fantasia
          FROM emp_user as eu  
          LEFT JOIN empresas as e 
          ON eu.empresa = e.id
          WHERE eu.usuario =".$_SESSION['id'];

$listarEmpresas = $conexao->runQuery($query);