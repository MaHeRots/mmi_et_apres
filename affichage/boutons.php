<?php
include("../divers/connexion.php"); // On se connecte à la base

?>

    <html lang="fr">

    <head>
        <meta charset="utf-8" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
        <title>Articles</title>

    </head>



    <body>


        <form action="#" method="get" class="form-choix">
            <select name='domaine'>

                <?php
    
    
$sql = "SELECT DISTINCT * FROM formation JOIN tagdomaine ON idTagDomaine=tagdomaine.id JOIN type ON idTagType=type.id JOIN tagregion ON idTagRegion=tagregion.id"; // 
	$query = $pdo->prepare($sql); 
	
                
	$query->execute(); 
	
	
	while($line = $query->fetch()) {
		$domaine = $line['domaine'];
        echo "<option>$domaine</option>";
        
	}       

    
    ?>

            </select>







            <select name='region'>
                <option>region</option>
            </select>

            <select name='type'>
                <option>type</option>
            </select>

            <input type='submit' class="btn" />
        </form>


        <?php
         if(isset($_GET['domaine'])) {
	$sql = "SELECT *, formation.id AS idformation FROM formation JOIN tagdomaine ON idTagDomaine=tagdomaine.id JOIN tagregion ON idTagRegion=tagregion.id JOIN type ON idTagType=type.id WHERE domaine=?";  // 

	$query = $pdo->prepare($sql); // Etpae 1 : On prépare la requête
	
	$query->execute(array($_GET['domaine'])); // Etape 2 :On l'exécute. 
                       // Pas de paramètre dans la requête
	
	
	while($line = $query->fetch()) { // Etape 3 : on parcours le résultat
		echo
           ' <div class=" col-md-4">
           <h3>'.$line['NomEcole'].'</h3>
                <a href="'.$line['Lien'].'">aller vers le site de l\'école</a>
                <p>'.$line['Ville'].'</p>
                <p>'.$line['region'].'</p>
                    
                    </div>';    
    }

                }
        ?>



    </body>

    </html>
