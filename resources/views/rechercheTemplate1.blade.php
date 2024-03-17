<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
    use App\Models\Boutique;
    // echo Boutique::find(Session::get('$boutiquePub'))->nom_B;
    // session('$boutiquePub')->nom_B;
    ?>
    </title>
    <link rel="stylesheet" href="template1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template1/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="template1/css/templatemo-style.css">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->

<style>
    

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


.modal-content {
    width:60%;
  background-color: #fefefe;
  /*margin: 15% auto;*/
  margin-left:200px;
  margin-right:200px;
  /* 15% from the top and centered 
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
/* Caption of Modal Image (Image Text) - Same Width as the Image */
#modal2{
       width:30%;
  background-color: #fefefe;
  /*margin: 15% auto;*/
  /*margin-left:200px;*/
  /*margin-right:200px;*/
}
#libelle{
     margin: auto;
  display: block;
  width: 60%;
  max-width: 700px;
  text-align: center;
  /*color: #ccc;*/
  padding: 10px 0;
  height: 190px;
}
/* Add Animation - Zoom in the Modal */

@media screen and (max-width: 550px) {
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {
    width:80px;
  background-color: #fefefe;
  margin: 15% auto;
  /*margin-left:10px;*/
  /*margin-right:200px;*/
  /* 15% from the top and centered 
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
#modal2{
       width:80%;
  background-color: #fefefe;
  /*margin: 15% auto;*/
  /*margin-left:200px;*/
  /*margin-right:200px;*/
}
}
@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}


/*partie du contenue template copié sur internet*/

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  /*background: #eee;*/
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #FF6888; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #FF6888;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */












@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body {
    font-family: "Poppins", sans-serif;
    color: #444444;
}

a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #fe302f;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444; 
}

.section-products .single-product {
    margin-bottom: 26px;
}

.section-products .single-product .part-1 {
    position: relative;
    height: 290px;
    max-height: 290px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: all 0.3s;
}

.section-products .single-product:hover .part-1::before {
		transform: scale(1.2,1.2) rotate(5deg);
}

.section-products #product-1 .part-1::before {
    background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
    background-size: cover;
		transition: all 0.3s;
}

.section-products #product-2 .part-1 {
    background: url("https://hamoprise.com/storage/images/k5oDzcLn9AaWLF1CL38jHBwBmcc3nabAKzEihg9v.jpg") no-repeat center;
    background-size: cover;
	border-radius:7px;
}

.section-products #product-3 .part-1::before {
    background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-4 .part-1::before {
    background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
    background-size: cover;
}

.section-products .single-product .part-1 .discount,
.section-products .single-product .part-1 .new {
    position: absolute;
    top: 15px;
    left: 20px;
    color: #ffffff;
    background-color: #fe302f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.section-products .single-product .part-1 .new {
    left: 0;
    background-color: #444444;
}

.section-products .single-product .part-1 ul {
    position: absolute;
    bottom: -41px;
    left: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
    opacity: 0;
    transition: bottom 0.5s, opacity 0.5s;
}

.section-products .single-product:hover .part-1 ul {
    bottom: 30px;
    opacity: 1;
}

.section-products .single-product .part-1 ul li {
    display: inline-block;
    margin-right: 4px;
}

.section-products .single-product .part-1 ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: #ffffff;
    color: #444444;
    text-align: center;
    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
    transition: color 0.2s;
}

.section-products .single-product .part-1 ul li a:hover {
    color: #fe302f;
}

.section-products .single-product .part-2 .product-title {
    font-size: 1rem;
}

.section-products .single-product .part-2 h4 {
    display: inline-block;
    font-size: 1rem;
}

.section-products .single-product .part-2 .product-old-price {
    position: relative;
    padding: 0 7px;
    margin-right: 2px;
    opacity: 0.6;
}

.section-products .single-product .part-2 .product-old-price::after {
    position: absolute;
    content: "";
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #444444;
    transform: translateY(-50%);
}
</style>
</head>
<body>
     
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!--<i class="fas fa-film mr-2"></i>-->
                                <?php
                // // use App\Models\Boutique;
                //          $nom1=substr(Boutique::find($_GET['id'])->photo_profil, 11);  
                // echo '<i>
                // <img src="storage/MarkImages/'.$nom1.'" alt="Image"  style="width:40px;height:40px;">
                // </i>';
                // echo '<input style="display:none;"   id="boutique_Global" value="'.Boutique::find($_GET['id'])->id.'"  type="number" />';

                // ?>
            
                <?php
                
                // // use App\Models\Pagecontent;
                //      if(isset($_GET['id'])){ /* si c'est client */
                //         echo Boutique::find($_GET['id'])->nom_B;
                         
                //      }
                ?>
                 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <!--<a class="nav-link nav-link-1 active" aria-current="page" href="/store">Produits</a>-->
                      <?php 
                //   echo '<a class="nav-link nav-link-1 active" href="/store?id='. $_GET['id'].'">Produits</a>';
                   ?>
                </li>
                <li class="nav-item">
                    <!--<a class="nav-link nav-link-2" href="videos.html">Videos</a>-->
                //                       <?php 
                //   echo '<a class="nav-link nav-link-2" href="/about-template1?id='. $_GET['id'].'">A propos</a>';
                   ?>
                </li>
                <li class="nav-item">
                   <?php 
                //   echo '<a class="nav-link nav-link-3" href="/contact-template1?id='. $_GET['id'].'">contact</a>';
                   ?>
                </li>
                <li class="nav-item">
                    <!--<a class="nav-link nav-link-4" href="/contact-template1">Contact</a>-->
                      <?php 
                //   echo '<a class="nav-link nav-link-4" href="/connexion">Se connecter</a>';
                   ?>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="template1/img/hero.jpg">
        <form class="d-flex tm-search-form" action="{{url('/rechercher')}}" method="get" enctype="multipart/form-data">

{{ @csrf_field() }}
            <input class="form-control tm-search-input" type="search" placeholder="Search" name="_token" aria-label="Search">
                        <input name="id_B" style="display:none"
            <?php 
            echo 'value="'.$id_B.'" >';
            ?>
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Résultat de recherche
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <!--<form action="" class="tm-text-primary">-->
                <!--    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200-->

                <!--</form>-->
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">
              
  <?php 

  use Illuminate\Support\Facades\DB;

//   $produits=DB::table('produits')->get();
  
//   for($i=0;$i<count($produits);$i++){
     foreach($produits as $produit){

        // if($produit->id_B==$_GET['id']){
                $nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                    
        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5" >
                <figure class="effect-ming tm-video-item">
                    ';
                    
                    echo '<img id="'.$produit->id.'id" class="img-fluid"  alt="une image d un produit" src="storage/images/'.$nom.'">';
                    
                   echo '<figcaption class="d-flex align-items-center justify-content-center">
                        <h2>voir  details</h2>
                        <a  href="/produit-template1?id='.$produit->id.'">View more</a>
                    </figcaption>                    
                </figure>
                <input type="text" id="'.$produit->id.'libelle" value="'.$produit->libelle.'" style="display:none">
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">'.$produit->libelle.'</span>
                    <span style="color:black;" id="'.$produit->id.'prix">'.number_format($produit->prix/100, 2,',', '').' € </span>
                              <p id="'.$produit->id.'description" style="display:none;">'.$produit->description.'</p>
          <input type="number" id="idBoutique" style="display:none;" value="'.$produit->id_B.'">
          <input type="text" id="'.$produit->id.'strip_price" style="display:none;" value="'.$produit->stripe_price.'" />
                </div>
            </div>
            ';
        }
//   }
    //  }
//   }
   ?>
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="template1/img/img-04.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Plants</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">14 Oct 2020</span>-->
            <!--        <span>16,100 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-05.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Morning</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">12 Oct 2020</span>-->
            <!--        <span>12,460 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-06.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Pinky</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">10 Oct 2020</span>-->
            <!--        <span>11,402 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-01.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Hangers</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">24 Sep 2020</span>-->
            <!--        <span>16,008 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-02.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Perfumes</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">20 Sep 2020</span>-->
            <!--        <span>12,860 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-07.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Bus</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">16 Sep 2020</span>-->
            <!--        <span>10,900 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-08.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>New York</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">12 Sep 2020</span>-->
            <!--        <span>11,300 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-09.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Abstract</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">10 Sep 2020</span>-->
            <!--        <span>42,700 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-10.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Flowers</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">8 Sep 2020</span>-->
            <!--        <span>11,402 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-11.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Rosy</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">4 Sep 2020</span>-->
            <!--        <span>32,906 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-12.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Rocki</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">28 Aug 2020</span>-->
            <!--        <span>50,700 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-13.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Purple</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">22 Aug 2020</span>-->
            <!--        <span>107,510 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-14.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Sea</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">14 Aug 2020</span>-->
            <!--        <span>118,006 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-15.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Turtle</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">9 Aug 2020</span>-->
            <!--        <span>121,300 views</span>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">-->
            <!--    <figure class="effect-ming tm-video-item">-->
            <!--        <img src="img/img-16.jpg" alt="Image" class="img-fluid">-->
            <!--        <figcaption class="d-flex align-items-center justify-content-center">-->
            <!--            <h2>Peace</h2>-->
            <!--            <a href="photo-detail.html">View more</a>-->
            <!--        </figcaption>                    -->
            <!--    </figure>-->
            <!--    <div class="d-flex justify-content-between tm-text-gray">-->
            <!--        <span class="tm-text-gray-light">3 Aug 2020</span>-->
            <!--        <span>21,204 views</span>-->
            <!--    </div>-->
            <!--</div>         -->
        </div> <!-- row -->
        <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                    <!--<a href="javascript:void(0);" class="tm-paging-link">2</a>-->
                    <!--<a href="javascript:void(0);" class="tm-paging-link">3</a>-->
                    <!--<a href="javascript:void(0);" class="tm-paging-link">4</a>-->
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>            
        </div>
    </div> <!-- container-fluid, tm-container-content -->





<h4 id="telVendeur" style="display:none;">
<?  use App\Models\Vendeur;
    //   $B=Boutique::find($_GET['id']);
    //   $tel=Vendeur::find($B->id_V)->tel; 
    //   echo $tel;
       ?></h4>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div id="modalContent1" class="modal-content">
      
      <!-- The Close Button -->
    <span class="close">&times;</span>
  
   <!--Modal Content (The Image) -->
  <!--<img class="modal-content" id="img01">-->
  <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" style="border-radius:7px;" id="pic-1">
						  <img  id="img01"/></div>
						  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126"  id="imageTog1"/></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title" id="libelleidInModal">men's shoes fashion</h3>
						<div class="rating">
							<div class="stars">
								<i class="bx bx-star checked"></i>
								<i class="bx bx-star checked"></i>
								<i class="bx bx-star checked"></i>
								<i class="bx bx-star "></i>
								<i class="bx bx-star "></i>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p id="descriptionidInModal" class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">prix actuel: <span id="prixidInModal">$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							<!--<button class="add-to-cart btn btn-default" type="button">add to cart</button>-->
							
							<script src="https://js.stripe.com/v3/"></script>
      <form action="{{ url('/boutique/payer') }}" method="POST">
      {{ @csrf_field() }}
      <input type="text" name="stripe_price" id="strip_price_InModal" />
      <input type="text" name="id_pInModal" id="id_p_input_InModal" />
        <button type="submit" class="add-to-cart btn btn-default" id="checkout-button">Acheter</button>
      </form>
							<br><button class="add-to-cart btn btn-default" type="button" onclick="commandeModal()">Discuter</button>
							<!--<button class="like btn btn-default" type="button"><i class="bx bx-heart"></i></button>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div>
      <div>
    <!--<h3 id="libelleidInModal"></h3>-->
    </div>
        <!--<h3 id="prixidInModal"></h3>-->
     </div>
	    

	
	<!--<div  id="callButton" class="btn btn-success">-->
 <!--   <a id="callNumber" href="tel:123-456-7890">-->
 <!--   <img alt="call number" src="images/call.png">-->
 <!--<h4>Appeler</h4>-->
 <!--   </a>-->
    <h4 id="callNumber"></h4>
   <!--</div>-->
   
  <!-- <div id="btn-commander" class="desc-produit">-->
  <!--   <p id="descriptionidInModal"></p>-->
     
		<!--</div>-->
  
  </div>
  </div>

</div>


<!-- The Modal -->
<div id="myModal2" class="modal" >

  <!-- Modal content -->
  <div class="modal-content" id="modal2">
      
      <!-- The Close Button -->
    <span class="close">&times;</span>
  
<!--  <h1>Audio</h1>-->

<!--    <button id="startRecordingButton">-->
<!--    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">-->
<!--  <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"/>-->
<!--  <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z"/>-->
<!--</svg></button>-->
<!--    <button id="stopRecordingButton">Stop recording-->
<!--    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">-->
<!--  <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/>-->
<!--</svg></button>-->
<!--    <button id="playButton">Play-->
<!--    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">-->
<!--  <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>-->
<!--</svg></button>-->
<!--    <button id="downloadButton">Download</button>-->

    <script>
        var startRecordingButton = document.getElementById("startRecordingButton");
        var stopRecordingButton = document.getElementById("stopRecordingButton");
        var playButton = document.getElementById("playButton");
        var downloadButton = document.getElementById("downloadButton");


        var leftchannel = [];
        var rightchannel = [];
        var recorder = null;
        var recordingLength = 0;
        var volume = null;
        var mediaStream = null;
        var sampleRate = 44100;
        var context = null;
        var blob = null;

        startRecordingButton.addEventListener("click", function () {
            // Initialize recorder
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
            navigator.getUserMedia(
            {
                audio: true
            },
            function (e) {
                console.log("user consent");

                // creates the audio context
                window.AudioContext = window.AudioContext || window.webkitAudioContext;
                context = new AudioContext();

                // creates an audio node from the microphone incoming stream
                mediaStream = context.createMediaStreamSource(e);

                // https://developer.mozilla.org/en-US/docs/Web/API/AudioContext/createScriptProcessor
                // bufferSize: the onaudioprocess event is called when the buffer is full
                var bufferSize = 2048;
                var numberOfInputChannels = 2;
                var numberOfOutputChannels = 2;
                if (context.createScriptProcessor) {
                    recorder = context.createScriptProcessor(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                } else {
                    recorder = context.createJavaScriptNode(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                }

                recorder.onaudioprocess = function (e) {
                    leftchannel.push(new Float32Array(e.inputBuffer.getChannelData(0)));
                    rightchannel.push(new Float32Array(e.inputBuffer.getChannelData(1)));
                    recordingLength += bufferSize;
                }

                // we connect the recorder
                mediaStream.connect(recorder);
                recorder.connect(context.destination);
            },
                        function (e) {
                            console.error(e);
                        });
        });

        stopRecordingButton.addEventListener("click", function () {

            // stop recording
            recorder.disconnect(context.destination);
            mediaStream.disconnect(recorder);

            // we flat the left and right channels down
            // Float32Array[] => Float32Array
            var leftBuffer = flattenArray(leftchannel, recordingLength);
            var rightBuffer = flattenArray(rightchannel, recordingLength);
            // we interleave both channels together
            // [left[0],right[0],left[1],right[1],...]
            var interleaved = interleave(leftBuffer, rightBuffer);

            // we create our wav file
            var buffer = new ArrayBuffer(44 + interleaved.length * 2);
            var view = new DataView(buffer);

            // RIFF chunk descriptor
            writeUTFBytes(view, 0, 'RIFF');
            view.setUint32(4, 44 + interleaved.length * 2, true);
            writeUTFBytes(view, 8, 'WAVE');
            // FMT sub-chunk
            writeUTFBytes(view, 12, 'fmt ');
            view.setUint32(16, 16, true); // chunkSize
            view.setUint16(20, 1, true); // wFormatTag
            view.setUint16(22, 2, true); // wChannels: stereo (2 channels)
            view.setUint32(24, sampleRate, true); // dwSamplesPerSec
            view.setUint32(28, sampleRate * 4, true); // dwAvgBytesPerSec
            view.setUint16(32, 4, true); // wBlockAlign
            view.setUint16(34, 16, true); // wBitsPerSample
            // data sub-chunk
            writeUTFBytes(view, 36, 'data');
            view.setUint32(40, interleaved.length * 2, true);

            // write the PCM samples
            var index = 44;
            var volume = 1;
            for (var i = 0; i < interleaved.length; i++) {
                view.setInt16(index, interleaved[i] * (0x7FFF * volume), true);
                index += 2;
            }

            // our final blob
            blob = new Blob([view], { type: 'audio/wav' });
        });

        playButton.addEventListener("click", function () {
            if (blob == null) {
                return;
            }

            var url = window.URL.createObjectURL(blob);
            var audio = new Audio(url);
            audio.play();
        });

        downloadButton.addEventListener("click", function () {
            if (blob == null) {
                return;
            }

            var url = URL.createObjectURL(blob);

            var a = document.createElement("a");
            document.body.appendChild(a);
            a.style = "display: none";
            a.href = url;
            a.download = "sample.wav";
            a.click();
            window.URL.revokeObjectURL(url);
        });

        function flattenArray(channelBuffer, recordingLength) {
            var result = new Float32Array(recordingLength);
            var offset = 0;
            for (var i = 0; i < channelBuffer.length; i++) {
                var buffer = channelBuffer[i];
                result.set(buffer, offset);
                offset += buffer.length;
            }
            return result;
        }

        function interleave(leftChannel, rightChannel) {
            var length = leftChannel.length + rightChannel.length;
            var result = new Float32Array(length);

            var inputIndex = 0;

            for (var index = 0; index < length;) {
                result[index++] = leftChannel[inputIndex];
                result[index++] = rightChannel[inputIndex];
                inputIndex++;
            }
            return result;
        }

        function writeUTFBytes(view, offset, string) {
            for (var i = 0; i < string.length; i++) {
                view.setUint8(offset + i, string.charCodeAt(i));
            }
        }

    </script>
  
  
 

  <div class="product">
        <!--<img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments" />-->
        <!--<div class="description">-->
        <!--  <h3>entrez votre numero vous serz contacté</h3>-->
          
        <!--</div>-->
      </div>
      
      
  <?
   require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
  ?>
  
	<div   id="formulaire" style="display:none">
	    <form action="{{url('/boutique/produit/commande')}}" method="post" >
	{{ @csrf_field() }}
<img style="width:70px;height:90px;" src="/images/photo-telephone.jpg"><input style="height:30px;font-size:20px;type="number" name="contacts" required placeholder="numero de telephone">

<?php   /* si c'est client */

  

 echo '<input style="display:none;" id="idProduitInput" type="number" name="id_P"">
<input style="display:none;" id="idBoutiqueInput" type="number" name="id_B"/>';

?>

<input class="btn btn-primary" type="submit" name="envoyer" value="envoyer" >
</form>
</div>



<!--formulaire message-->
<div width="300">
 <form method="post" action="{{ url('/send-new-conversation') }}" enctype="multipart/form-data">
      {{ @csrf_field() }}
        <label>Email:</label><input type="text" placeholder="taper votre e-mail" class="form-control" name="source" id="source"><br>
        

        <textarea type="text" class="form-control"  placeholder="message..." name="message" id="messageId"></textarea>
        
        <button type="button" class="btn form-control" onclick="send()">envoyer</button>
        
    </form>
    </div>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

    <script>
        function send(){
                    
                    
            var source=document.getElementById("source").value;     
         var boutique_dest_id=document.getElementById("boutique_Global").value;
         var messageId=document.getElementById("messageId").value;

    var formData = new FormData();
     
        formData.append("source", source);
        formData.append("boutique_dest_id", boutique_dest_id);
        formData.append("message", messageId);
        formData.append("messagelabel", source);
        
         $.ajax({
        url: "/send-new-conversation",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,  
        dataType: 'JSON',
        success: function (data) {
              alert(data.result);
    }
    }); 
        }


    </script>
	

  
  </div>
  </div>

</div>


    
    <script src="template1/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    
    <script>
          function launchModal(id){


history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(1);
  
      modal.style.display = "none";
history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(-1);
};

};

  var idStr=id+"id";
  var idLibelle=id+"libelle";
  var idPrix=id+"prix";
  var idDescription=id+"description";
  var idStripe_price=id+"strip_price";
 
  var libelleValue=document.getElementById(idLibelle).value; 
  var Prix=document.getElementById(idPrix).textContent;
  var Description=document.getElementById(idDescription).textContent;
  
  var VendeurNumber=document.getElementById("telVendeur").textContent;
  var stripe_price_input=document.getElementById(idStripe_price).value;
  
  var id_B=document.getElementById("idBoutique").value;
  var idBInModal=document.getElementById("idBoutiqueInput");
  var idPInModal=document.getElementById("idProduitInput");
  var stripe_priceInModal=document.getElementById("strip_price_InModal");
  var input_id_p_InModal=document.getElementById("id_p_input_InModal");
  idBInModal.value=id_B;
  idPInModal.value=id;
  stripe_priceInModal.value=stripe_price_input;
  stripe_priceInModal.style.display="none";
  input_id_p_InModal.value=id;
  input_id_p_InModal.style.display="none";
  var modal = document.getElementById("myModal");

var CallNumber=document.getElementById("callNumber");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(idStr);
var modalImg = document.getElementById("img01");


var libelleModal=document.getElementById("libelleidInModal");
var prixModal=document.getElementById("prixidInModal");
var descriptionModal=document.getElementById("descriptionidInModal");

modal.style.display = "block";


CallNumber.href="tel:"+VendeurNumber;
  modalImg.src = img.src;
  modalImg.style.borderRadius="7px";
  document.getElementById("imageTog1").src=img.src;
  document.getElementById("imageTog1").style.borderRadius="7px";
  libelleModal.innerHTML=libelleValue;
  prixModal.innerHTML=Prix;
  var matches = Prix.match(/(\d+)/);
             
            if (matches) {
                
                      prixModal.innerHTML=matches[0]+` €    <span style="background-color:#FF9888;color:white; border-radius:3px;"></span>`;
            }
  
  descriptionModal.innerHTML=Description;

  // document.getElementById("description").value=description;  


                 $.ajax({
                    url: "/produit-visite?id="+id
                })
                .done(function( data ) {
                    data.answer;
                });
                
                
// Get the <span> element that closes the modal

var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  }
  
  }
  
  function  commandeModal(){
       var modal = document.getElementById("myModal2");
      modal.style.display = "block";
      var span = document.getElementsByClassName("close")[1];

// When the user clicks on <span> (x), close the modal
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(2);
  
      modal.style.display = "none";
      history.pushState(null, null, location.href);
window.onpopstate = function () {
  history.go(-1);
};
     
};

  }
function annulerCommande(){
var modal = document.getElementById("myModal2");
 modal.style.display = "none";
}

    </script>
</body>
</html>