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
       
        $result = mysqli_query($db_conn, $query) or die( mysql_error( $db_conn ) );
       
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
$sql = "SELECT `pk_id_critiqueDart` as id, `prenom`, `nom`, `anneeNaissance` as naissance, `anneeMort` as mort, ISNI FROM `critiquedart` WHERE 1 ORDER BY nom";
	//echo $sql;
	//$db_conn=mysql_connect("localhost", "root", "root");
	$db_conn=mysqli_connect("localhost", "labexcap","MEDI@98313", "critiquesdart");
	mysqli_set_charset($db_conn, 'utf8');
	mysqli_select_db($db_conn, "critiquesdart") or die('Problème de connexion à la base.');
    // output as an attachment
    query_to_csv($db_conn, $sql, "Notices_critiques.csv", true);
    // output to file system
	// query_to_csv($db_conn, $sql, "Notices_critiques_revues.csv", false);
?>