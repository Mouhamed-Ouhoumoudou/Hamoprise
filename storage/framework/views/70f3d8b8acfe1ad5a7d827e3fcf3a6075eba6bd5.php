<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>bouitique</title>
</head>
<body>
<?php
 function formulaire(...$formulaire){
        echo '<form action='.$formulaire[0].'method="post">';
        foreach($formulaire as $champ){
         if ($champ !=$formulaire[0]) {
                
            
            
            if(in_array($champ,['envoyer','valider' , 'soumettre' , 'ajouter' , 'enreigistrer' , 'creer' ,'connecter' , 'inscrir' , 'publier'])){
             echo '<input type="submit" name="'.$champ.'" id="'.$champ.'" value="'.$champ.'"><br>';
            }
            else if(in_array($champ,['image','photo','video'])){
                echo '<label for="'.$champ.'">'.$champ.":</label>";
                echo '<input type="file" name="'.$champ.'" id="'.$champ.'" requered><br>';
                }
            
            elseif(strpos($champ, 'date')){
                echo '<label for="'.$champ.'">'.$champ.":</label>";
                echo '<input type="date" name="'.$champ.'" id="'.$champ.'" requered><br>';

            }
            elseif($champ=='email'){
                echo '<label for="'.$champ.'">'.$champ.":</label>";
                echo '<input type="email" name="'.$champ.'" id="'.$champ.'" requered><br>';

            }
            else if($champ=='number'){
                echo '<label for="'.$champ.'">'.$champ.":</label>";
                echo '<input type="number" name="'.$champ.'" id="'.$champ.'" requered><br>';

            }
            else if (strpos($champ,'pass')) {
                echo '<label for="'.$champ.'">'.$champ.":</label>";
                echo '<input type="password" name="'.$champ.'" id="'.$champ.'" requered><br>';
            }
            else{
                echo '<label for="'.$champ.'">'.$champ.":</label>";
                echo '<input type="text" name="'.$champ.'" id="'.$champ.'" requered><br>';
            }   
            
        }
      }
        echo "</form>";
        
    }
    @yield('formulaire');

?>
</body>
</html><?php /**PATH C:\Users\mouha\Documents\Laravel\kassouwa\resources\views/formulaire.blade.php ENDPATH**/ ?>