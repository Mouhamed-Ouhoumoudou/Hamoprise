<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
        <?php use App\Models\Produit;
    /* cette page peut etre referencié pqr deux internaute , soit un client en passage ou un vendeur lui-meme qui va d'abord se connecter*/
  if(isset($_GET['id'])){ /* si c'est client */

  echo Produit::find($_GET['id'])->libelle;

}
  else{ /* sinon c'est que c'est vendeur */
     
    echo Produit::find($_GET['id'])->libelle;

  }
  ?>
    </title>
    <link rel="stylesheet" href="template1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template1/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="template1/css/templatemo-style.css">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!--<a class="navbar-brand" href="index.html">-->
            <!--    <i class="fas fa-film mr-2"></i>-->
            <!--    Catalog-Z-->
            <!--</a>-->
                            <?php 
                   echo '<a class="navbar-brand" href="/store?id='.Produit::find($_GET['id'])->id_B.'">';
                   ?>
                <!--<i class="fas fa-film mr-2"></i>-->
                <?php
                use App\Models\Boutique;
                         $nom1=substr(Boutique::find(Produit::find($_GET['id'])->id_B)->photo_profil, 11);  
                echo '<i>
                <img src="storage/MarkImages/'.$nom1.'" alt="Image"  style="width:40px;height:40px;">
                </i>';
                echo '<input type="number" id="idP" style="display:none" value="'.$_GET['id'].'">';
                ?>
            
                <?php
                
                // use App\Models\Pagecontent;
                     if(isset($_GET['id'])){ /* si c'est client */
                        echo Boutique::find(Produit::find($_GET['id'])->id_B)->nom_B;
                         
                     }
                ?>
            </a>
            <!--visite produit-->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
            <script>
                var id=document.getElementById('idP').value;
                 $.ajax({
                    url: "/produit-visite?id="+id
                })
                .done(function( data ) {
                    data.answer;
                });
            </script>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
               <li class="nav-item">
                    <!--<a class="nav-link nav-link-1 active" aria-current="page" href="/store">Produits</a>-->
                      <?php 
                   echo '<a class="nav-link nav-link-1 " href="/store?id='. Produit::find($_GET['id'])->id_B.'">Produits</a>';
                   ?>
                </li>
                <li class="nav-item">
                    <!--<a class="nav-link nav-link-2" href="videos.html">Videos</a>-->
                                       <?php 
                   echo '<a class="nav-link nav-link-3 active" href="/about-template1?id='.Produit::find($_GET['id'])->id_B.'">A propos</a>';
                   ?>
                </li>
                <li class="nav-item">
                   <?php 
                   echo '<a class="nav-link nav-link-3" href="/contact-template1?id='. Produit::find($_GET['id'])->id_B.'">contact</a>';
                   ?>
                </li>
                <li class="nav-item">
                    <!--<a class="nav-link nav-link-4" href="/contact-template1">Contact</a>-->
                      <?php 
                   echo '<a class="nav-link nav-link-4" href="/connexion">Se connecter</a>';
                   ?>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="template1/img/hero.jpg">
        <form class="d-flex tm-search-form" action="{{url('/rechercher')}}" method="get" enctype="multipart/form-data">
{{ @csrf_field() }}
            <input class="form-control tm-search-input" type="search" placeholder="Recherche" name="_token" aria-label="Search">
            
            <input name="id_B" style="display:none"
            <?php 
            $idB=Produit::find($_GET['id'])->id_B;
            echo 'value="'.$idB.'" >';
            ?>
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                <?       //$produit=Produit::find(3);
						       $produit=Produit::find($_GET['id']);
						       
                echo $produit->libelle;
                ?>
            </h2>
             
        </div>
        <div class="row tm-mb-90">            
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <!--<img src="img/img-01-big.jpg" alt="Image" class="img-fluid">-->
                <? 
						      //$produit=Produit::find(3);
						       $produit=Produit::find($_GET['id']);
						       $nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                echo '<img id="'.$produit->id.'id"    alt="une image d un produit" src="/storage/images/'.$nom.'"  class="img-fluid">';
                	
	
						      
				 ?>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4">
                        <!--Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.-->
                        <? 
						      //$produit=Produit::find(3);
						       $produit=Produit::find($_GET['id']);
						       
                echo "<p class=\"product-description\">".$produit->description."</p>";
                ?>
                    </p>
                    <div class="text-center mb-5">
                        <!--<a href="#" class="btn btn-primary tm-btn-big">Download</a>-->
                        
                              <form action="{{ url('/boutique/payer') }}" method="POST">
      {{ @csrf_field() }}
      <!--<input type="text" name="stripe_price" id="strip_price_InModal" />-->
      <!--<input type="text" name="id_pInModal" id="id_p_input_InModal" />-->
      
               <?php 
			 echo '<input type="number" id="idBoutique" style="display:none;" value="'.$produit->id_B.'">
          <input type="text" id="strip_price_InModal" name="stripe_price"  style="display:none;" value="'.$produit->stripe_price.'" />
          <input type="text" style="display:none;" name="id_pInModal" value="'.$produit->id.'" id="id_p_input_InModal" />
          ';
          ?>
       <a  class="btn btn-primary tm-btn-big"> <button type="submit" class="add-to-cart btn btn-default" style="color:white;font-size:22px;" id="checkout-button">Acheter</button>
       </a>
      </form>
                    </div>                    
                    <div class="mb-4 d-flex flex-wrap">
                        <!--<div class="mr-4 mb-2">-->
                        <!--    <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">1920x1080</span>-->
                        <!--</div>-->
                        <!--<div class="mr-4 mb-2">-->
                        <!--    <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>-->
                        <!--</div>-->
                    </div>
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">
                            
                             <? 
						      //$produit=Produit::find(3);
						       $produit=Produit::find($_GET['id']);
						       
                echo "<h4 class=\"tm-text-gray-dark mb-3\">Prix Actuel: <span>".number_format($produit->prix/100, 2,',', '')." € </span></h4>";
                ?>
                        </h3>
                        <!--<p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>-->
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">                <?       //$produit=Produit::find(3);
						       $produit=Produit::find($_GET['id']);
						       
                echo $produit->libelle;
                ?></a>
                        <!--<a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>-->
                        <!--<a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>-->
                        <!--<a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>-->
                        <!--<a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>-->
                        <!--<a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>-->
                        <!--<a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a>-->
                    </div>
                </div>
            </div>
        </div>
    <!--    <div class="row mb-4">-->
    <!--        <h2 class="col-12 tm-text-primary">-->
    <!--            Related Photos-->
    <!--        </h2>-->
    <!--    </div>-->
    <!--    <div class="row mb-3 tm-gallery">-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-01.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Hangers</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">16 Oct 2020</span>-->
    <!--                <span>12,460 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-02.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Perfumes</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">12 Oct 2020</span>-->
    <!--                <span>11,402 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-03.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Clocks</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">8 Oct 2020</span>-->
    <!--                <span>9,906 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-04.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Plants</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">6 Oct 2020</span>-->
    <!--                <span>16,100 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-05.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Morning</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">26 Sep 2020</span>-->
    <!--                <span>16,008 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-06.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Pinky</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">22 Sep 2020</span>-->
    <!--                <span>12,860 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-07.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>Bus</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">12 Sep 2020</span>-->
    <!--                <span>10,900 views</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <figure class="effect-ming tm-video-item">-->
    <!--                <img src="img/img-08.jpg" alt="Image" class="img-fluid">-->
    <!--                <figcaption class="d-flex align-items-center justify-content-center">-->
    <!--                    <h2>New York</h2>-->
    <!--                    <a href="#">View more</a>-->
    <!--                </figcaption>                    -->
    <!--            </figure>-->
    <!--            <div class="d-flex justify-content-between tm-text-gray">-->
    <!--                <span class="tm-text-gray-light">4 Sep 2020</span>-->
    <!--                <span>11,300 views</span>-->
    <!--            </div>-->
    <!--        </div>        -->
    <!--    </div> <!-- row -->
    <!--</div> 
    <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">A propos de  <?php 
                   if(isset($_GET['id'])){ /* si c'est client */
                        echo Boutique::find(Produit::find($_GET['id'])->id_B)->nom_B;
                         
                     }
                   ?></h3>
                    <p>
                        
                <?php
               use Illuminate\Support\Facades\DB;

                 $pagecontents=DB::table('pages_contents')->get();                 
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="about" && $pagecontent->id_B==Produit::find($_GET['id'])->id_B){
                        echo $pagecontent->col1_p1;
                    }
                }
                ?>
                        <!--Catalog-Z is free Bootstrap 5 Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.-->
                        </p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Nos lienss</h3>
                    <ul class="tm-footer-links pl-0">
                        <li>
                            <!--<a href="#">Advertise</a>-->
                        <?php 
                   echo '<a href="/about-template1?id='.Produit::find($_GET['id'])->id_B.'">A propos</a>';
                   ?></li>
                        <li>
                            <!--<a href="#">Nos produits</a>-->
                            <?php 
                   echo '<a href="/store?id='.Produit::find($_GET['id'])->id_B.'">Nos produits</a>';
                   ?>
                        </li>
                        <li>
                            <!--<a href="#">Notre Boutique</a>-->
                            <?php 
                   echo '<a href="/contact-template1?id='. Produit::find($_GET['id'])->id_B.'">Contact</a>';
                   ?>
                        </li>
                        <li>
                            <!--<a href="#">Contact</a>-->
                                                        <?php 
                   echo '<a href="/connexion">Se connecter</a>';
                   ?>
                            </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="https://hamoprise.com/politique-d-utilisation" class="tm-text-gray text-right d-block mb-2">Condition d'utilisation</a>
                    <a href="https://hamoprise.com/politique-d-utilisation" class="tm-text-gray text-right d-block">Politique d'utilisation</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2023 <?php 
                   if(isset($_GET['id'])){ /* si c'est client */
                        echo Boutique::find(Produit::find($_GET['id'])->id_B)->nom_B;
                         
                     }
                   ?> Tout droit reservé.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Conçue par <a href="https://hamoprise.com" class="tm-text-gray" rel="sponsored" target="_parent">Hamoprise</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="template1/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>