<?php 

/**
 * linedeleterinfile allow to delete a line with a specific word
 *
 * @return void
 * @author Emmanuel ADEKPLOVI
 */

function linedeleterinfile($path,$words){
    $arr = file($path,FILE_USE_INCLUDE_PATH);
    foreach ($arr as $key=> $line) {
        //removing the line
        if(stristr($line,$mots)!== false){
          //forcing a line return
          echo '<br/>' ;
          //deleting the words
          unset($arr[$key]);
          break;
        }
    }
    //reindexing array
    $arr = array_values($arr);
    //writing to file
    file_put_contents($fichier, implode($arr));
}


