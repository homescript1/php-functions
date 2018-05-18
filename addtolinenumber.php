<?php  
/**
 * addtoLineNumber allow to write to word/string at one line with specific numbers
 *
 * @return void
 * @author Emmanuel ADEKPLOVI
 */

function addtoLinumber($pathtofile,$lineNumber,$wordtoadd){
    $content = file($pathtofile,FILE_USE_INCLUDE_PATH); 
    foreach($content as $lineNumber => &$lineContent) {
        if($lineNumber == $liNumber) {
            $lineContent .= $wordtoadd;   
        }
    }
    $allContent = implode('', $content);
    file_put_contents($file, $allContent);
}
