

<?php $__env->startSection('title'); ?>
kassouwa

<?php $__env->stopSection(); ?>
<?php $__env->startSection('compte'); ?>

            <div class="compte"> 
             <button class="inscription"><a href="/inscription">creer une boutique</a></button>
                <button class="inscription"><a href="/connexion" target="_blank">se connecter</a></button>
            </div>
 <?php $__env->stopSection(); ?>           
<?php $__env->startSection('contenue'); ?>

    <section>
        <nav><div style="background-color: white;">
        <!-- <h1> Categorie</h1>
        <h2><a href="">vetements</a></h2>
                <h2><a href="">maquiage</a></h2>
        <h2><a href="">chaussure</a></h2>
        </div>
 -->
    </nav><br><br>

            <?php
           /* deux methodes dans le controller referencient cette page, afficherBoutique et recherche*/
          if(isset($boutiques)){/* si c'est afficherBoutique  et-bah elle retournes des boutiques en une variable $boutiques*/


            // $now = new DateTime();
       
       /* affichage des boutiques */
               foreach($boutiques as $boutique){
                session()->put('client',1);

                echo '<a style="display:inline-block;margin:10px;" target="_blank" href="/boutique?id='.$boutique->id.'."><img  class="triangle"  src="/images/triangle.png"><div><img class="boutique-photo" src="'.$boutique->photo_profil.'" alt="logo de profil">
                <h2 class="nom-boutique" >'.$boutique->nom_B.'</h2>
                </div></a>';
             
                }

            }
            else{ /* sinon c'est que c'est lq methode recherche*/
                if(count($produits)>0){    /* teste si la recherche est pertinante(trouver au moins un resultat) on l'affiche */
                    echo "recherche associée:<br><br>";
                     foreach ($produits as $produit) {
                        $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                        echo '<a style="display:inline-block;text-decoration:none;margin-left:5px;" href="/boutique/produit?id='.$produit->id.'">';
                        echo '<img class="produit"  alt="une image d un produit" src="/storage/images/'.$nom.'">';
                        echo '<h2 style="color:black;">'.$produit->prix.' Fcfa <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
                        echo "</a>";
                    }
                } 
                else{ /* sinon le message*/
                    echo '<h3 align="center">recherche non detecte</h3>';
                }
                
                }

            ?>
     </article>
    </section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/kassouwa.blade.php ENDPATH**/ ?>