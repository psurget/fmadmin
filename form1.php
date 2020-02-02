<html>
	<head>
	</head>
	<body>
    <?php
            include("conn.php")  ;
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
                        echo "Vos données ont été enregistrées, vous étes bien inscrit <br>";
                        echo "votre matricule est: ".$idcom->insert_id;
                    }
               
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('vous devez remplir toutes les données')";
                echo "</script>";
            }
           }
          
           
?>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
			<p>
				Nom <input type="text" name="txtNom"/>
				Prenom <input type="text" name="txtPrenom"/>
			</p>
			<p>
				Sexe <input type="radio" name="radioSexe" value="femme"/>Femme
				<input type="radio" name="radioSexe" value="homme"/>Homme
			</p>
			<p>
				État civil 
				<select name="cboEtatCivil">
					<option value="Celibataire">Celibataire</option>
					<option value="Marié(e)">Marié(e)</option>
					<option value="Conjoint(e) de fait">Conjoint(e) de fait</option>
					<option value="Divorcé(e)">Divorcé(e)</option>
					<option value="Séparé(e)">Séparé(e)</option>
					<option value="Veuf(ve)">Veuf(ve)</option>					
				</select>
			</p>
			<p>
				Salaire <input type="text" name="txtSalaire"/>				
			</p>
			<p>
				<input type="submit" name= "submit" value="Enregistrer"/>
				<input type="reset" value="Annuler"/>
			</p>
		</form>
	</body>
</html>