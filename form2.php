<html>
	<head>
	</head>
	<body>
	<?php
            include("conn.php")  ;
			$idcom=connexobjet("gestionpersonnel","myparam")  ; 
			$matricule="";
			$nom="";
			$prenom="";
			$sexe="";
			$etatCivil="";
			$salary="";
			
           if(isset($_POST['garderdonnees'])){
            if(!empty($_POST['txtMatricule'])&&!empty($_POST['txtNom'])&&!empty($_POST['txtPrenom'])&&!empty($_POST['txtSexe'])
                    &&!empty($_POST['txtEtatCivil'])&&!empty($_POST['txtSalaire'])){
                $matricule=$_POST['txtMatricule'];
                $nom=$_POST["txtNom"];
                $prenom=$_POST["txtPrenom"];
                $sexe=$_POST["txtSexe"];
                $etatCivil=$_POST["txtEtatCivil"];
                $salary=$_POST["txtSalaire"];
                             
				   $requete =  "update employe  set nom='$nom', prenom='$prenom',sexe = '$sexe',etatCivil = '$etatCivil',salaire= $salary
				   				where matricule=$matricule";
                   
                $result= $idcom->query($requete);
                    if(!$result){
                        echo $idcom->error;
                    }else{
                        echo "<h3>Vos données ont été enregistrées </h3>";
                       
                    }
               
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('vous devez remplir toutes les données')";
                echo "</script>";
            }
		   }

		   if(isset($_POST['getdonnees'])){
			if(!empty($_POST['txtMatricule'])){
				$matricule=$_POST['txtMatricule'];
				$requete= "select * from employe where matricule=$matricule";
				$result= $idcom->query($requete);
				if(!$result){
					echo $idcom->error;
				}else{
					$employe=$result->fetch_row();
					$matricule=$employe[0];
					$nom=$employe[1];
					$prenom=$employe[2];
					$sexe=$employe[3];
					$etatCivil=$employe[4];
					$salary=$employe[5];
				}
			}else{
				echo "<script type='text/javascript'>";
                echo "alert('vous devez entrer la matricule')";
                echo "</script>";	
			}
			  
		   }
		   
          
           
	?>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
			<fieldset>
				<legend>Recherche d'employé</legend>
				<p>
					Matricule <input type="text" name=txtMatricule value="<?php echo $matricule ?>"/>
					<input type="submit" name="getdonnees" value="Rechercher" />
				</p>
			</fieldset>
			<br/><br/>
			<fieldset>
				<legend>Employé trouvé - Employé à modifier</legend>
				<p>
					Nom <input type="text" name="txtNom" value="<?php echo $nom ?>"/>
					Prenom <input type="text" name="txtPrenom" value="<?php echo $prenom ?>"/>
				</p>
				<p>
					Sexe <input type="text" name="txtSexe" value="<?php echo $sexe ?>"/>
				</p>
				<p>
					État civil <input type="text" name="txtEtatCivil" value="<?php echo $etatCivil ?>" />					
				</p>
				<p>
					Salaire <input type="text" name="txtSalaire" value="<?php echo $salary ?>"/>				
				</p>
				<p>
					<input type="submit" name="garderdonnees" value="Modifier"/>
				</p>
			</fieldset>
		</form>
	</body>
</html>