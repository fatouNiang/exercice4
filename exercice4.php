
<?php
require('fonction.php');
$message='';
$phrase='';
$ph=[];
if(isset($_POST['valider'])){
    if(empty($_POST['phrase'])){
        $message='la saisi est obligatoire';        
    }
    else{
        $phrase=$_POST['phrase'];
        $phrases=decoupe_phrase($phrase);
        for ($i=0; $i < long_chaine($phrases); $i++) { 
            if(long_chaine($phrases[$i])>200){
                $message='le nombre de caractere ne pas depasser 200';
            }else{
                $ph[]=sentence_correction($phrases[$i]);
            }
        }
 
    }
}
?>
<html>
    <head>
        <title>exercice 4</title>
    </head>
    <body>
    <style>
        h1{
            text-align:center;
        }
        p{
            color:red;
        }
        form{
        margin:auto;
        text-align:center;
        }
        label{
            font-weight: bold;
        }
    </style>
        <h1>EXERCICE 4</h1>
        <form action="" method="POST">
        <label>Saisir des phrases</label><br>
        <? if(isset($phrase)){?>
            <textarea name="phrase" cols="50" rows="10" value="phrase"><?= $phrase ?></textarea><br>
            <input type="submit" value="valider" name="valider"><?}?>
            <p><?=$message ?></p>
            <?php if(isset($_POST['valider']) && !empty($phrase)){?>
            <label>Les phrases corrigées sont :</label><br>
            <textarea cols="50" rows="10"><?php 
            foreach ($ph as $valeur){
                echo $valeur; 
            } ?></textarea>
            <?php } ?>
        </form>
    </body>
</html>
  