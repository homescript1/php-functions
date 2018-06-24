<?php  

//Function pour trouver des expressions ou chaines de caractères à partir des expressions régulières
function findByRegex($pattern,$string){
	$finder=preg_match($pattern,$string);
	return $finder;
}


//Function pour remplacer des expressions ou chaines de caractères à partir des expressions régulières
function replaceByRegex($pattern,$replacement,$string){
	$replacement=preg_replace($pattern, $replacement, $string);
	return $replacement;
}


//Function pour remplacer une chaine de caractère par une autre
function replaceThisBy($oldvalues,$newvalues,$string){
    $replacement=str_replace($oldvalues, $newvalues, $string);
    return $replacement;
}

/**
 * Function pour formatter un fichier dump mysql au format de sqlite
 * @return void
 * @author  Emmanuel
 */
function mysqlToSqliteFormat($file){
	//verifier si le fichier chargé est bien un fichier sql
	if (preg_match("/\.sql$/",$file) ==true {
    //lecture du fichier sql
	$readfile=file($file);
	








		//sinon arreter l'opération
	}else{

		exit();
	}


};