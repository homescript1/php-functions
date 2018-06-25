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
	 * @author  Manu
	 */
	function mysqlToSqliteFormat($file){
		set_time_limit(0);
		//verifier si le fichier chargé est bien un fichier sql
		if (file_exists($file) && preg_match("/\.sql$/",$file) ==true ){
	    //lecture du fichier sql
			$readfile=file($file);
			$current="";
			foreach ($readfile as $lineContent){
		  //si les commentaires sont trouvés on les sautent

			if (findByRegex("/(^\-\-)|(^\/\*)/",$lineContent)==true){
			continue;
		    }
	      //sinon debuter le formattage et l'ecriture dans le fichier source
			//	}else{
	      	//split de : collate ,auto_increment , key sauf primary key , lock , unlock , unsigned , engine
					$first_replace=replaceByRegex("/(^LOCK.*)|(^UNLOCK.*)|(AUTO_INCREMENT|auto_increment)|(unsigned)|((COLLATE|collate)\W\w*+)\)|(\sKEY\s\`.*)/","",$lineContent);
	      	//remplacement des entiers bigint , tinyint par int
					$int_replace=replaceByRegex("/(\sbigint\W\w.\W\s)|(\sint\W\w.\W\s)|(\smediumint\W\w.\W\s)|(\ssmallint\W\w.\W\s)|(\stinyint\W\w.\W\s)/"," INT ",$first_replace);
	      	//remplacement des chaines de caractères
					$string_replace=replaceByRegex("/(\svarchar\W....)|(\slongtext\s)|(\stext\s)|(\schar\W\w.\W\s)|(\smediumtext\s)/"," TEXT ",$int_replace);
	      	//suppression des engines
					$engine_replace=replaceByRegex("/(\sENGINE\W*.*(?=\;))/","",$string_replace);
	      	//remplacement de datetime par DATE
					$date_replace=replaceByRegex("/(\sdatetime\s)/"," DATE ",$string_replace);
	      	//suppression des espaces inutiles dans les requetes sql
					$space_delete=replaceByRegex("/\n/","",$date_replace);
	        //debut de l'ecriture du sql formatter dans le fichier source
					$current .= $space_delete;
					file_put_contents($file, $current);
				
			}
	 	//sinon arreter l'opération
		}else{
			//exit();
			echo "pas trouver";
		}
	}

	mysqlToSqliteFormat(getcwd()."/suicide3.sql");


