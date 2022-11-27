<?php
    $this->layout = 'ajax';
    function query_to_csv($db_conn, $query, $filename, $attachment = false, $headers = true) {
       
        if($attachment) {
            // send response headers to the browser
			header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment;filename='.$filename);
            $fp = fopen('php://output', 'w');
        } else {
            $fp = fopen($filename, 'w');
        }
       
        $result = mysqli_query($db_conn, $query) or die( mysqli_error( $db_conn ) );
       
        if($headers) {
            // output header row (if at least one row exists)
            $row = mysqli_fetch_assoc($result);
            if($row) {
                fputcsv($fp, array_keys($row));
                // reset pointer back to beginning
                mysqli_data_seek($result, 0);
            }
        }
       
        while($row = mysqli_fetch_assoc($result)) {
            fputcsv($fp, $row);
        }
       
        fclose($fp);
    }
    // Using the function
$sql = "SELECT idCritique, nom, prenom, typeSignature, titreCritique, critiqueComplementTitre, revue, annee, datePrecise, volume, numero, pagination FROM `articles` WHERE `idCritique` IS NOT NULL";
	if(isset($_GET['Titre_SousTitre']) && $_GET['Titre_SousTitre']!=''){
		 $sql .= " AND (critiqueComplementTitre LIKE '%".addslashes($_GET['Titre_SousTitre'])."%' OR titreCritique LIKE '%".addslashes($_GET['Titre_SousTitre'])."%')";
	}
	if(isset($_GET['typeSignature']) && $_GET['typeSignature']!='')$sql .= " AND typeSignature='".$_GET['typeSignature']."'";
	//if(isset($_GET['idCritiqueDart']) && $_GET['idCritiqueDart']!='')$sql .= " AND idCritiqueDart=".$_GET['idCritiqueDart'];
	//auteur=34
	if(isset($_GET['auteur']) && $_GET['auteur']!='')$sql .= " AND idCritiqueDart=".$_GET['auteur'];
	if(isset($_GET['revue']) && $_GET['revue'] !='')$sql .= " AND revue LIKE '%".addslashes($_GET['revue'])."%'";
	if(isset($_GET['anneeEditionMin']) && $_GET['anneeEditionMin'] !='')$sql .= " AND annee >=".$_GET['anneeEditionMin'];
	if(isset($_GET['anneeEditionMax']) && $_GET['anneeEditionMax'] !='')$sql .= " AND annee <=".$_GET['anneeEditionMax'];
	//echo $sql;
	//$db_conn=mysql_connect("localhost", "root", "root");
	$db_conn=mysqli_connect("localhost", "labexcap","MEDI@98313", "critiquesdart");
	mysqli_set_charset($db_conn, 'utf8');
	mysqli_select_db($db_conn, "critiquesdart") or die('Problème de connexion à la base.');
    // output as an attachment
    query_to_csv($db_conn, $sql, "Notices_critiques_revues.csv", true);
    // output to file system
	// query_to_csv($db_conn, $sql, "Notices_critiques_revues.csv", false);
?>