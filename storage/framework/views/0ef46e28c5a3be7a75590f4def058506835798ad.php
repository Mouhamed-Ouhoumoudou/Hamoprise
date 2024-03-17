


<?php $__env->startSection('titre'); ?>
    <?php use App\Models\Boutique;
  if(isset($_GET['id'])){
  echo Boutique::find($_GET['id'])->nom_B;}
  else{
      echo Boutique::find($boutique->id)->nom_B;

  }
  ?>
  <?php $__env->stopSection(); ?>
  
 <div>
  <div>

    <a href=""><img src=""></a>
    produits
  </div>
  <div>
        <a href=""><img src=""></a>

    commande
  </div>
  <div>
        <a href="/boutique/profil?id=21"><img src="" alt="logo de profil"></a>

    profil
  </div>
</div>
<?php $__env->startSection('contenue'); ?>

  
  <script type="text/javascript">
    function ajouter(id_B,id_V){
            document.getElementById('btn-ajout').style.display="none";
      document.getElementById('produit').style.display="block";
      document.getElementById('id_B').value=id_B;
      document.getElementById('id_V').value=id_V;
    }
    function terminer(){
      document.getElementById('produit').style.display="none";
            document.getElementById('btn-ajout').style.display="block";

    }
    function suprimer() {
     oui=confirm(" ce produit produit sera suprime !");
      
    }
  </script>
  <div id="produit" style="display: none;">

    <form action="<?php echo e(url('/boutique/ajouterP')); ?>" method="post" enctype="multipart/form-data">
      <?php echo e(@csrf_field()); ?>

      <input style="display:none;" type="number" name="id_B" id="id_B">
      <input style="display: none;" type="number" name="id_V" id="id_V">
      <label for="url_photo">photo:</label>
      <input type="file" name="url_photo" id="url_photo"><br>
      <label for="prix">prix:</label>
      <input type="number" name="prix" id="prix"><br><br>
      <label for="description">description:</label>
      <textarea type="text" name="description" id="description"></textarea><br>
      <input type="submit" name="Terminer" value="Terminer"  onclick="terminer()">
    </form>
  </div>
<h1> hello boutique</h1>

  <?php 

  use Illuminate\Support\Facades\DB;

  $produits=DB::table('produits')->get();
  if(isset($_GET['id'])){

      foreach($produits as $produit){

    
        if($produit->id_B==$_GET['id']){
                echo '<a href="/boutique?id='.$produit->id.'.">'.$produit->url_photo."<br>".$produit->libelle.$produit->libelle."<br></a><br>";// a revoir
                

                $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
          
           echo '<img style="width:100px;height:100px;" alt="une image d un produit" src="/storage/images/'.$nom.'">';

                }
          }
    }
   if (isset($vendeur)) {
      $id_B=$boutique->id;
       //  le bouton d'ajout ne peut etre vu que par le vendeur 
        echo '<button id="btn-ajout" style="background-color: #00FF00;" onclick="ajouter('.$id_B.','.$vendeur->id.')">+</button>';
        /* affichage de produit */
        foreach ($produits as $produit) {

          
           $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
          
           echo '<img style="width:100px;height:100px;" src="/storage/images/'.$nom.'">';

            echo '<button>modifier</button><form action="/boutique/suprimer" methode="post"><input  style="display:none;" type="number" name="id" value="'.$produit->id.'"><input type="submit" nom="suprimer" value="suprimer" onclick="suprimer()"></form>';
         }
    

    }
   


  echo '<a href="/boutique103/produit">pantalon</a>'; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\Documents\Laravel\kassouwa\resources\views//boutique.blade.php ENDPATH**/ ?>