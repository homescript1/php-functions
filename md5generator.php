<?php  

/**
 * md5generator allow to generate md5 from a word give and return the md5 hash
 *
 * @return void
 * @author 
 */


function md5generator($word){
	$output=md5($word);
	return 'This word : '.$word.' his md5 is : ' .$output ;
}