<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
            <?php 
                   echo '<a class="navbar-brand" href="/store?id='. $_GET['id'].'">';
             ?>
                <!--<i class="fas fa-film mr-2"></i>-->
                                <?php
                use App\Models\Boutique;
                         $nom1=substr(Boutique::find($_GET['id'])->photo_profil, 11);  
                echo '<i>
                <img src="storage/MarkImages/'.$nom1.'" alt="Image"  style="width:40px;height:40px;">
                </i>';
                
                 echo '<input style="display:none;"   id="boutique_Global" value="'.Boutique::find($_GET['id'])->id.'"  type="number" />';
                ?>
            
                <?php
                
                // use App\Models\Pagecontent;
                     if(isset($_GET['id'])){ /* si c'est client */
                        echo Boutique::find($_GET['id'])->nom_B;
                         
                     }
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
                   echo '<a class="nav-link nav-link-1" href="/store?id='. $_GET['id'].'">Produits</a>';
                   ?>
                </li>
                <li class="nav-item">
                    <!--<a class="nav-link nav-link-2" href="videos.html">Videos</a>-->
                                       <?php 
                   echo '<a class="nav-link nav-link-2" href="/about-template1?id='. $_GET['id'].'">A propos</a>';
                   ?>
                </li>
                <li class="nav-item">
                   <?php 
                   echo '<a class="nav-link nav-link-3  active" href="/contact-template1?id='. $_GET['id'].'">contact</a>';
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

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="template1/img/hero.jpg"></div>

    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-4 col-12 mb-5">
                <h2 class="tm-text-primary mb-5">Nous contacter</h2>
                <form id="contact-form" method="post" action="{{ url('/send-new-conversation') }}" enctype="multipart/form-data" class="tm-contact-form mx-auto">
                    {{ @csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control rounded-0" placeholder="Name" required />
                    </div>
                    <div class="form-group">
                        <input type="email"  name="source" id="source" class="form-control rounded-0" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="contact-select" name="inquiry">
                            <option value="-">Sujet</option>
                            <option value="uiux">Génerale</option>
                            <option value="sales">Besoin de renseignement</option>
                            <option value="creative">Réclamation d'une commande</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea rows="8" name="message" class="form-control rounded-0" placeholder="message..."  id="messageId" required=></textarea>
                    </div>

                    <div class="form-group tm-text-right">
                        <button type="button" class="btn btn-primary" onclick="send()">Envoyer</button>
                    </div>
                    
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
                </form>                
            </div>
            <div class="col-lg-4 col-12 mb-5">
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5">Notre Adresse</h2>
                    
                    <p class="tm-mb-50">
                    <?php
                        $pagecontents=DB::table('pages_contents')->get();   
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="contact" && $pagecontent->id_B==$_GET['id']){
                        echo $pagecontent->col1_p1;
                    }
                }
                ?>
                <!--Quisque eleifend mi et nisi eleifend pretium. Duis porttitor accumsan arcu id rhoncus. Praesent fermentum venenatis ipsum, eget vestibulum purus. -->
                </p>
                    <p class="tm-mb-50">
                        <?php
                        $pagecontents=DB::table('pages_contents')->get();   
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="contact" && $pagecontent->id_B==$_GET['id']){
                        echo $pagecontent->col1_p2;
                    }
                }
                ?>
                         
                         <!--Nulla ut scelerisque elit, in fermentum ante. Aliquam congue mattis erat, eget iaculis enim posuere nec. Quisque risus turpis, tempus in iaculis.-->
                         </p>
                    <address class="tm-text-gray tm-mb-50">
                        
                        <?php
                        $pagecontents=DB::table('pages_contents')->get();   
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="contact" && $pagecontent->id_B==$_GET['id']){
                        echo $pagecontent->col1_p3;
                    }
                }
                ?>
                        <!--120-240 Fusce eleifend varius tempus<br>-->
                        <!--Duis consectetur at ligula 10660-->
                    </address>
                    <ul class="tm-contacts">
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-envelope"></i>
                                Email: <?php
                        $pagecontents=DB::table('pages_contents')->get();   
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="contact" && $pagecontent->id_B==$_GET['id']){
                        echo $pagecontent->col2_p1;
                    }
                }
                ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                Tel: <?php
                        $pagecontents=DB::table('pages_contents')->get();   
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="contact" && $pagecontent->id_B==$_GET['id']){
                        echo $pagecontent->col2_p2;
                    }
                }
                ?>
                            </a>
                        </li>
                        <li>
                            <a href="https://hamoprise.com/store?id=<?php  echo $_GET['id'];
                            ?>" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                URL: https://hamoprise.com/store?id=<?php  echo $_GET['id'];
                            ?>
                            </a>
                        </li>
                    </ul>
                </div>                
            </div>
            <!--<div class="col-lg-4 col-12">-->
            <!--    <h2 class="tm-text-primary mb-5">Our Location</h2>-->
                <!-- Map -->
            <!--    <div class="mapouter mb-4">-->
            <!--        <div class="gmap-canvas">-->
            <!--            <iframe width="100%" height="520" id="gmap-canvas"-->
            <!--                src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"-->
            <!--                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>-->
            <!--        </div>-->
            <!--    </div>               -->
            <!--</div>-->
        </div>
        
        <!--debut con...-->
    <!--    <div class="row tm-mb-74 tm-people-row">-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <img src="img/people-1.jpg" alt="Image" class="mb-4 img-fluid">-->
    <!--            <h2 class="tm-text-primary mb-4">Ryan White</h2>-->
    <!--            <h3 class="tm-text-secondary h5 mb-4">Chief Executive Officer</h3>-->
    <!--            <p class="mb-4">-->
    <!--                Mauris ante tellus, feugiat nec metus non, bibendum semper velit. Praesent laoreet urna id tristique fermentum. Morbi venenatis dui quis diam mollis pellentesque.-->
    <!--            </p>-->
    <!--            <ul class="tm-social pl-0 mb-0">-->
    <!--                <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>-->
    <!--                <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>-->
    <!--                <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <img src="img/people-2.jpg" alt="Image" class="mb-4 img-fluid">-->
    <!--            <h2 class="tm-text-primary mb-4">Catherine Pinky</h2>-->
    <!--            <h3 class="tm-text-secondary h5 mb-4">Chief Marketing Officer</h3>-->
    <!--            <p class="mb-4">-->
    <!--                Sed faucibus nec velit finibus accumsan. Sed varius augue et leo pharetra, in varius lacus eleifend. Quisque ut eleifend lacus.-->
    <!--            </p>-->
    <!--            <ul class="tm-social pl-0 mb-0">-->
    <!--                <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>-->
    <!--                <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>-->
    <!--                <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <img src="img/people-3.jpg" alt="Image" class="mb-4 img-fluid">-->
    <!--            <h2 class="tm-text-primary mb-4">Johnny Brief</h2>-->
    <!--            <h3 class="tm-text-secondary h5 mb-4">Accounting Executive</h3>-->
    <!--            <p class="mb-4">-->
    <!--                Sed faucibus nec velit finibus accumsan. Sed varius augue et leo pharetra, in varius lacus eleifend. Quisque ut eleifend lacus.-->
    <!--            </p>-->
    <!--            <ul class="tm-social pl-0 mb-0">-->
    <!--                <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>-->
    <!--                <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>-->
    <!--                <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">-->
    <!--            <img src="img/people-4.jpg" alt="Image" class="mb-4 img-fluid">-->
    <!--            <h2 class="tm-text-primary mb-4">George Nelson</h2>-->
    <!--            <h3 class="tm-text-secondary h5 mb-4">Creative Art Director #C69</h3>-->
    <!--            <p class="mb-4">-->
    <!--                Nunc convallis facilisis congue. Curabitur gravida rutrum justo sed pulvinar. Pellentesque ac ante in erat bibendum dignissim.-->
    <!--            </p>-->
    <!--            <ul class="tm-social pl-0 mb-0">-->
    <!--                <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>-->
    <!--                <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>-->
    <!--                <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div> -->
    <!-- fin container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">A propos de  <?php 
                   if(isset($_GET['id'])){ /* si c'est client */
                        echo Boutique::find($_GET['id'])->nom_B;
                         
                     }
                   ?></h3>
                    <p>
                        
                <?php
                                
                foreach($pagecontents as $pagecontent){
                    if($pagecontent->type=="about" && $pagecontent->id_B==$_GET['id']){
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
                   echo '<a href="/about-template1?id='. $_GET['id'].'">A propos</a>';
                   ?></li>
                        <li>
                            <!--<a href="#">Nos produits</a>-->
                            <?php 
                   echo '<a href="/store?id='. $_GET['id'].'">Nos produits</a>';
                   ?>
                        </li>
                        <li>
                            <!--<a href="#">Notre Boutique</a>-->
                            <?php 
                   echo '<a href="/contact-template1?id='. $_GET['id'].'">Contact</a>';
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
                        echo Boutique::find($_GET['id'])->nom_B;
                         
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