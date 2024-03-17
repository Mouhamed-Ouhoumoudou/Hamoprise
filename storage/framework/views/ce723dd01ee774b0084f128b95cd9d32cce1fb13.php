


<?php $__env->startSection('titre'); ?>
    <?php use App\Models\Boutique;
    /* cette page peut etre referencié pqr deux internaute , soit un client en passage ou un vendeur lui-meme qui va d'abord se connecter*/
  if(isset($_GET['id'])){ /* si c'est client */

  echo Boutique::find($_GET['id'])->nom_B;

}
  else{ /* sinon c'est que c'est vendeur */
     
    echo session('boutique')->nom_B;

  }
  ?>
  <?php $__env->stopSection(); ?>
  <?php
  if(isset($_GET['id'])){
    /*affichage de logo de la boutique au niveau client*/
     session()->put('id_B',$_GET['id']);
     echo '<header ><a href="/boutique?id='.$_GET['id'].'"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.Boutique::find($_GET['id'])->photo_profil.'" alt="logo de profil"></figure></a></header><br><br><br><br><hr>';

  }
  else{
    /*affichage de logo de la boutique  au niveau vendeur*/
 echo '<a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';

}
 
 
 
  ?>
<?php $__env->startSection('contenue'); ?>

  <!-- la partie javascript ecrit pour certains boutons de la page -->
  <script type="text/javascript">
    function ajouter(id_B,id_V){
            document.getElementById('btn-ajout').style.display="none";
      document.getElementById('produit').style.display="block";
      document.getElementById('id_B').value=id_B;
      document.getElementById('id_V').value=id_V;
      document.getElementById("btn-entete").style.display="none";
    }
    function terminer(){
      document.getElementById('produit').style.display="none";
            document.getElementById('btn-ajout').style.display="block";

    }
   
    function annuler(){
      document.getElementById('produit').style.display="none";
      location.reload();
    }
  </script>
  <br><br><br><div id="produit" style="display: none;">

   <!-- formulaire d'ajout d'un produit -->

    <form action="<?php echo e(url('/boutique/ajouterP')); ?>" method="post" enctype="multipart/form-data">
      <?php echo e(@csrf_field()); ?>

      <input style="display:none;" type="number" name="id_B" id="id_B">
      <input style="display: none;" type="number" name="id_V" id="id_V">
      <label for="url_photo">photo:</label>
      <input type="file" name="url_photo" id="url_photo" required=""><br>
      <label for="prix">prix:</label>
      <input type="number" name="prix" id="prix" required=""> <br><br>
      <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" id="libelle" required=""><br><br>
      <label for="description">description:</label>
      <textarea type="text" name="description" id="description"></textarea><br>
      <input class="btn"  style="background-color: #00FF00;" type="submit" name="Terminer" value="Terminer"  onclick="terminer()">
      <button class="btn" onclick="annuler()">Annuler</button>
    </form>
  </div>


  <?php 

  use Illuminate\Support\Facades\DB;

  $produits=DB::table('produits')->get();
  /* affichage des produit etant client */
  if(isset($_GET['id'])){


    session()->put('client',1);

      foreach($produits as $produit){

    
        if($produit->id_B==$_GET['id']){
                
                

                $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
           echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id.'">'; 
           echo '<img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'">';
           echo '<p>'.$produit->libelle.'</p>';
           echo '<h2 style="color:black;">'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';

           echo "</a>";

                }
          }
    }
    else{
      /* affichage des produits et d'autres boutons suplementaire etant vendeur*/
     

echo '<div id="btn-entete" style="position:fixed;"><button class="btn-produit" style="background-color:#FFFFF0;">

    <a 
    href="/boutique" style="text-decoration:none;"><img class="icon" src="images/icon-produit.jpg"> produits
   </a>
  </button>

  ';



      echo '<button class="commande">
        <a href="/boutique/commande?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-commande.jpg">

    commandes
  </a>
  </button>';
  echo '<button class="profil">
        <a href="/boutique/profil?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-boutique.jpg">

   profil
  </a>
  </button>
  </div>';
   $id_B=session('boutique')->id;
       //  le bouton d'ajout ne peut etre vu que par le vendeur 
        echo '<br><br><button id="btn-ajout" class="btn-ajout"  onclick="ajouter('.$id_B.','.session('vendeur')->id.')">+</button><br>';
  session()->put('client',0);
      
        /* affichage de produit b*/
        echo "<br>";
        foreach ($produits as $produit) {
          if($produit->id_B==session('boutique')->id){
          
           $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
          echo '<a style="text-decoration:none;display:inline-block; margin-left:5;" href="/boutique/produit?id='.$produit->id.'">';
           echo '<img class="produit" style="width:170px;height:160px; border-radius:10px; display:inline-block;" src="/storage/images/'.$nom.'">';
           echo '<h3>'.$produit->libelle.'</h3>';
           
            echo '<h2 style="color:black;">'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
             echo "</a>";

          
         }

       }
    

    }
   

 ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\Documents\Laravel\kassouwa\resources\views/boutique.blade.php ENDPATH**/ ?>