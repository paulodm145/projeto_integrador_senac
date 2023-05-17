<?php

$query = "SELECT DISTINCT eu.empresa, e.fantasia
          FROM emp_user as eu  
          LEFT JOIN empresas as e 
          ON eu.empresa = e.id_emp
          WHERE eu.usuario = ".$_SESSION['id'];

$listarEmpresas = $conexao->runq($query);