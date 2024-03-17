

<?php $__env->startSection('titre'); ?>

profil

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenue'); ?>

<?php
   echo '<a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';

echo '<br><br><div id="btn-entete" style="position:fixed;"><button class="btn-produit"   style="background-color:#FFFFF0;">

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
?>
 <div align="center">
    <h1> votre profil</h1><br><br><form action="<?php echo e(url('/boutique/profil/modifierProfil')); ?>" method="post">

<?php echo e(@csrf_field()); ?>



<?php
use App\Models\Boutique;
use App\Models\vendeur;

   
 // echo '<img src="'.session('boutique')->photo_profil.'">';

	echo '<input type="file" name="photo_profil" value="enligne"  ><br>
    <input  style="display:none;" type="number" name="id_B" value="'.session('boutique')->id.'" >
<h3>Boutique</h3>
    <input type="text" name="nom_B" value="'.session('boutique')->nom_B.'" autofocus><br>
    <input type="text" name="adresse_B" value="'.session('boutique')->adresse_B.'">
    <h3> Vendeur</h3>
     <input type="text" name="nom_V" value="'.session('vendeur')->nom_V.'"><br>
      <input type="text" name="prenom_V" value="'.session('vendeur')->prenom_V.'"><br>
    <input type="text" name="adresse_V" value="'.session('vendeur')->adresse.'"><br>
     <input type="text" name="tel_V" value="'.session('vendeur')->tel.'"><br>
     
    <input style="display:none;" type="text" name="id_V" value="'.session('boutique')->id_V.'"><br>


    <input class="btn-modifier" style="width:120px;" type="submit" name="changer" value="Enreigistrer">
</form>

</div>
';

// echo <button style="   margin-left: 10px;
            
//             font-size: 17px;
        
//             border-radius: 5px;
//             background-color: #FF9888;
//             color: #FF9888;
//             width: 120px;"> <a href="/" style="text-decoration:none;"> deconnecter</a></button
// ;
?>
<form action="<?php echo e(url('/boutique/profil/deconnecter')); ?>" method="post">
   <?php echo e(@csrf_field()); ?>

   <?php
    echo '<input  style="display:none;" type="number" name="id_B" value="'.session("boutique")->id.'">';
    ?>
    <input  class="deconnecter"  type="submit" name="deconnecter" value="deconnecter">
 </form>
  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/profil.blade.php ENDPATH**/ ?>