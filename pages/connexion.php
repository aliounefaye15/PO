<?php
	//Exemple de syntaxe de connexion à la base de données pour PHP et MySQL.
	
	//Se connecter à la base de données
	
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="ecole";
   $conecole=new mysqli($hostname,$username, $password,$dbname) ;
