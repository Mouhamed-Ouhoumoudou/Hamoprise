
<?php $__env->startSection('titre'); ?>
<?php echo $produit->libelle ;?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenue'); ?>
<script type="text/javascript">
	function numero(){
		document.getElementById('formulaire').style.display="block";
	}
	 function suprimer() {
     oui=confirm(" ce produit produit sera suprime !");
      
    }
    function modifier(){
    	document.getElementById('boite-modifier').style.display="block";
    	document.getElementById('boite').style.display="none";
    	document.getElementById('btn-modifier').style.display="none";
    	document.getElementById('btn-suprimer').style.display="none";
    	document.getElementById('btn-annuler').style.display="block";
    }
    function annuler(){
    	location.reload();
    }
</script>
<?php  

$nom=substr($produit->url_photo, 14);
echo '<div id="boite">';
echo '<div style="margin-right:400px;"><img class="produit-grand" style=" max-width:600px; border-radius:10px;display:inline-block;" alt="une image d un produit" src="/storage/images/'.$nom.'"></div>';
echo '<div><p style="display:inline-block;margin-top:100px;">'.$produit->description.'</p><h2>'.$produit->prix.' Fcfa<span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2></div>';
echo "</div>";




?>
<div style="display:none;" id="formulaire"><form action="<?php echo e(url('/boutique/produit/commande')); ?>" method="post" >
	<?php echo e(@csrf_field()); ?>

<img style="width:70px;height:90px;" src="/images/photo-telephone.jpg"><input style="height:30px;font-size:20px;type="number" name="contacts" required placeholder="numero de telephone">

<?php echo '<input style="display:none;" type="number" name="id_P" value="'.$produit->id.'">
<input style="display:none;" type="number" name="id_B" value="'.$produit->id_B.'">'; ?>

<input type="submit" name="envoyer" value="envoyer" >
</form></div>

<div id="boite-modifier" style="display: none;">
<form action="<?php echo e(url('/boutique/produit/modifier')); ?>" method="post">
	<?php echo e(@csrf_field()); ?>


	<?php
	echo '<div style="margin-right:400px;"><img class="produit-grand" style=" width:100px; height:100px; border-radius:10px;display:inline-block;" alt="une image d un produit" src="/storage/images/'.$nom.'"></div>';
	echo '<input style="display:none;" type="number" name="id" value="'.$produit->id.'">';
	  echo '<label for="url_photo">photo:</label>
      <input type="file" name="url_photo" id="url_photo" value="'.$produit->url_photo.'"><br>
      <label for="prix">prix:</label>
      <input type="number" name="prix" id="prix" value="'.$produit->prix.'"><br><br>
      <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" id="libelle" value="'.$produit->libelle.'"><br><br>
      <label for="description">description:</label>
      <textarea type="text" name="description" id="description" placeholder="'.$produit->description.'" value="'.$produit->description.'"></textarea><br>';


	?>
	<input type="submit" name="modifier" value="modifier">
	<br>
	<input id="btn-annuler" type="reset" value="annuler" style="display:none;" onclick="annuler()">
</form>
</div>
<?php 



if(session('client')==0){/* un vendeur doit pas voir le bouton commander du coup on a mis l'id_B dans la requete si c'est pas le cas*/

	
 echo '<button id="btn-modifier" style="display:inline-block;" onclick="modifier()">modifier</button><form action="/boutique/suprimer" methode="post"><input  style="display:none;" type="number" name="id" value="'.$produit->id.'"><input id="btn-suprimer" type="submit" nom="suprimer" value="suprimer" onclick="suprimer()"></form>';

	

	

}
else{
	echo '<button style="font-size:20px;width:280px;background-color:#FF9888;border-radius:5px;"   onclick="numero()">commander</button>';
	
}
?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\Documents\Laravel\kassouwa\resources\views//produit.blade.php ENDPATH**/ ?>