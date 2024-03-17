

<?php $__env->startSection('titre'); ?>
commandes

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenue'); ?>
<?php
use App\Models\Commande;
use App\Models\Produit;

$commandes=DB::table('commandes')->get();
$nbr=0;
if(isset($_GET['id_B'])){
	 echo '<a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';

echo '<br><br><div id="btn-entete" style="position:fixed;"><button class="btn-produit"  style="background-color:#FFFFF0;">

    <a 
    href="/boutique"><img class="icon" src="/images/icon-produit.jpg"> produits</a>
   
  </button>
  ';
   echo '<button class="commande" >
        <a href="/boutique/commande?id_B='.session('boutique')->id.'"><img class="icon" src="/images/icon-commande.jpg">

    commandes
  </a>
  </button>';

  echo '<button class="profil">
        <a href="/boutique/profil?id_B='.session('boutique')->id.'"><img class="icon" src="/images/icon-boutique.jpg">
   profil
  </a>
  </button>
  </div><br>';
  echo "<br><h4> les commandes envoyées:</h4>";
foreach ($commandes as $commande) {

	if ($commande->id_B==$_GET['id_B']) {
		$nbr=$nbr+1;
		$produit=Produit::find($commande->id_P);
		
		$nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
		 echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id_P.'">';
		 echo '<h1 class="contact-client">Contacts Client: "'.$commande->contacts.'"</h1>';
           echo '<img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'">';
             echo '<h2>'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
             echo "</a>";

             echo '<button class="btn-repondre" ><a style="text-decoration:none;color:white;"" href="/boutique/message?id='.$commande->contacts.'">Repondre via Kasouwa</a></button>';
	}
	
}

if($nbr==0){
	echo '<h1 align="center">aucune commandes pour le moment.</h1>';

}
else{
	$nbr=$nbr;
}

}


else{
	foreach ($commandes as $commande) {

	if ($commande->contacts==$_GET['id']) {
		$nbr=$nbr+1;
		$produit=Produit::find($commande->id_P);
		
		$nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
		 echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id_P.'">';
		 echo '<h1 class="contact-client">votre contacts "'.$commande->contacts.'"</h1>';
           echo '<img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'">';
             echo '<h2>'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
             echo "</a>";

             echo '<button class="btn-repondre" ><a style="text-decoration:none;color:white;" href="/boutique/message?id='.$commande->id_B.'">message à la boutique</a></button>';
	}
	
}

if($nbr==0){
	echo '<h1 align="center"> vous n`avez fais aucune commandes pour le moment.</h1>';

}

}

?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/commande.blade.php ENDPATH**/ ?>