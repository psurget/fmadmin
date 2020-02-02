<?php
include("param.php");
include("conn.php");

$idcom=connexobjet("gestionpersonnel","myparam")  ; 
           if(isset($_POST['submit'])){
            if(!empty($_POST['txtNom'])&&!empty($_POST['txtPrenom'])&&!empty($_POST['radioSexe'])
                    &&!empty($_POST['cboEtatCivil'])&&!empty($_POST['txtSalaire'])){
                $matricule="\N";
                $nom=$_POST["txtNom"];
                $prenom=$_POST["txtPrenom"];
                $sexe=$_POST["radioSexe"];
                $etatCivil=$_POST["cboEtatCivil"];
                $salary=$_POST["txtSalaire"];
                             
                   $requete =  "insert into employe  values ('$matricule','$nom','$prenom','$sexe','$etatCivil','$salary')";
                   
                $result= $idcom->query($requete);
                    if(!$result){
                        echo $idcom->error;
                    }else{
                        echo "Vos données ont été enregistrées, vous êtes bien inscrit <br>";
                        echo "votre matricule est: ".$idcom->insert_id;
                    }
               
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('vous devez remplir toutes les données')";
                echo "</script>";
            }
           }
?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    	<div class="col-lg-12">
    		<h1>Bootstrap Brackets Starter</h1>
    	</div>
    </div>
</body>
</html>
