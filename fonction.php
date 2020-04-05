<?php
// une fonction pour compter 

function long_chaine($chaine){
    $cpt =0;
    for ($i=0; isset($chaine[$cpt]) ; $i++) { 
         $cpt++;
    }
     return $cpt;
}


function is_phrases_correct($phrase){
  if(preg_match("#[.!?]{2,}#", $phrase)){
    return false;
  }
    if(preg_match('#^[A-Z]{1}.+[.?!]#', $phrase)){
      return true;
    }
  return false;
}

function sentence_correction($phrase){
    $phrase = trim($phrase);
    $phrase = gere_espace_inutile($phrase);
    if (is_phrases_correct($phrase)) {
      return $phrase;
    }else {
      $phrase = ucfirst($phrase);
      return $phrase;
  }
}
// var_dump(sentence_correction('ma vie est belle  ; maman.'));
function separateur($car){
    $sep='.?!';
   for ($i=0; $i < long_chaine($sep) ; $i++) { 
       if($car==$sep[$i]){
           return $car;
       }
   }
   return false;
}

function sentence($chaine){
    $chaine2="";
    for ($i=0; $i < long_chaine($chaine) ; $i++) { 
        if(!separateur($chaine[$i])){
            $chaine2.=$chaine[$i];
          }else{
            $phrases[]= $chaine2.=$chaine[$i];
            $chaine2="";            
          } 
        }
  return $phrases;
}

function decoupe_phrase($phrase){
    $phraseDecoupe= preg_split('/([^.!?]+[.!?]+)/', $phrase, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
 return $phraseDecoupe;
}
function gere_espace_inutile($chaine){

  $chaine= preg_replace('%\s+%', ' ', $chaine);
  $chaine= preg_replace('% ,%', ', ', $chaine);
  $chaine= preg_replace('% \' %', "'", $chaine);
  $chaine= preg_replace('% :%', ': ', $chaine);
  $chaine= preg_replace('% ;%', '; ', $chaine);
  $chaine= preg_replace('% \.%', '. ', $chaine);
  $chaine= preg_replace('% \/ %', '/', $chaine);
  $chaine= preg_replace('% \!%', '! ', $chaine);
  $chaine= preg_replace('% \?%', '? ', $chaine);
  return $chaine;
}
