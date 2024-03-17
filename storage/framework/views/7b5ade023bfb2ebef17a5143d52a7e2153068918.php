
<?php $__env->startSection('titre'); ?>
<?php echo $produit->libelle ;?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenue'); ?>
<script type="text/javascript">
	function numero(){
		document.getElementById('formulaire').style.display="block";
    document.getElementById('btn-commander').style.display="none";
	}
	 function suprimer() {
     oui=confirm(" ce produit sera suprime !");
      
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
<?php  use App\Models\Boutique;

 if(session('client')==1){

     echo '<header ><a href=""><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.Boutique::find(session("id_B"))->photo_profil.'" alt="logo de profil"></figure></a></header><br><br><br><br><hr>';

  }
  else{
 echo '<a href="/boutique/profil"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';


 echo '<br><br><div id="btn-entete" style="position:fixed;"><button class="btn-produit" style="background-color:#FFFFF0;">

    <a 
    href="/boutique" style="text-decoration:none;"><img class="icon" src="/images/icon-produit.jpg"> produits
   </a>
  </button>

  ';



      echo '<button class="commande">
        <a href="/boutique/commande?id_B='.session('boutique')->id.'"><img class="icon" src="/images/icon-commande.jpg">

    commandes
  </a>
  </button>';
  echo '<button class="profil">
        <a href="/boutique/profil?id_B='.session('boutique')->id.'"><img class="icon" src="/images/icon-boutique.jpg">

   profil
  </a>
  </button>
  </div>';

}



$nom=substr($produit->url_photo, 14);
echo '<br><br><div id="boite">';
echo '<div style="margin-right:400px;"><img class="produit-grand"  alt="une image d un produit" src="/storage/images/'.$nom.'"></div>';
echo '<div class="desc-produit"><p>'.$produit->libelle.'</p><p class="desc-produit-texte">'.$produit->description.'</p><h2>'.$produit->prix.' Fcfa<span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2></div>';
echo "</div>";




?>

<div  class="formulaire" id="formulaire"><form action="<?php echo e(url('/boutique/produit/commande')); ?>" method="post" >
	<?php echo e(@csrf_field()); ?>

<img style="width:70px;height:90px;" src="/images/photo-telephone.jpg"><input style="height:30px;font-size:20px;type="number" name="contacts" required placeholder="numero de telephone">

<?php echo '<input style="display:none;" type="number" name="id_P" value="'.$produit->id.'">
<input style="display:none;" type="number" name="id_B" value="'.$produit->id_B.'">'; ?>

<input class="btn-modifier" type="submit" name="envoyer" value="envoyer" ><button class="btn-suprimer" onclick="annuler()">annuler</button>
</form></div>
<?php 



if(session('client')==0){/* un vendeur ne doit pas voir le bouton commander du coup ce bouton est remplacé par deux boutons: modifier et suprimer*/

	
 echo '<div class="desc-produit" ><button id="btn-modifier" class="btn-modifier"  onclick="modifier()">modifier</button><div style="float:right;"><form action="/boutique/suprimer" methode="post">
<input  style="display:none;" type="number" name="id" value="'.$produit->id.'">
<input  class="btn-suprimer"  id="btn-suprimer" type="submit" nom="suprimer" value="suprimer" onclick="suprimer()"></form></div>';

	

	

}
else{ /* c'est client donc il peut avoir le bouton commander*/
	echo '<div id="btn-commander" class="desc-produit"><button class="btn-commander" onclick="numero()">commander</button></div>';
	
}
?>
<!-- formulaire de modification d'un produit -->
<div id="boite-modifier" style="display: none;align-content:center;float: left;">
<form action="<?php echo e(url('/boutique/produit/modifier')); ?>" method="post">
	<?php echo e(@csrf_field()); ?>


	<?php
	echo '<div ><img class="produit-grand" style=" width:100px; height:100px; border-radius:10px;display:inline-block;" alt="une image d un produit" src="/storage/images/'.$nom.'"></div>';
	echo '<input style="display:none;" type="number" name="id" value="'.$produit->id.'">';
	  echo '<label for="url_photo">photo:</label>
      <input type="file" name="url_photo" id="url_photo"><br>

      <label for="prix">prix:</label>
      <input type="number" name="prix" id="prix" value="'.$produit->prix.'"><br><br>
      <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" id="libelle" value="'.$produit->libelle.'"><br><br>
      <label for="description">description:</label>
      <textarea type="text" name="description" id="description" placeholder="'.$produit->description.'" value="'.$produit->description.'"></textarea><br>';


	?>
	<input class="btn-modifier" type="submit" name="modifier" value="Enreigistrer">
	<br>
	<input class="btn-suprimer" id="btn-annuler" type="reset" value="annuler" style="display:none;" onclick="annuler()">
</form>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\Documents\Laravel\kassouwa\resources\views/produit.blade.php ENDPATH**/ ?>