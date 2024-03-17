 @extends('pageloader')

 <html style="font-size: 16px;" lang="fr">
 <head>
     <meta name="theme-color" content="#db545a" />
     <meta name="google-site-verification" content="Oo95BD_VgOzc3Nr-LQP1f0p6O4NihnNNAfY7X17doDw" />
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	@yield('meta')
 	<title>@yield('titre')</title>
 	
    <!--<link rel="icon" type="image/png" sizes="16x16" href="images/logo-kassouwa-new3.png">-->

    <link href="/css/app.css" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!--<title>Hamoprise</title>-->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="css/jquery.js" defer=""></script>
    

  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
  
  @yield('cssCouleur')
  <style>
/*      .u-section-1 .u-sheet-1 {*/
/*  min-height: 522px;*/
/*}*/

/*.u-section-1 .u-text-1 {*/
/*  font-weight: 700;*/
/*  margin: 57px auto 60px;*/
/*}*/
.divSection{
    padding:17px;
}





/*pris de w3*/

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  /*background-color: #db545a;*/
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  font-weight: bold;
}

.topnav a:hover {
  background-color: #fff;
  color: black;
  border-radius:5px;
  
}

.topnav a.active {
  /*background-color: #db545a;*/
  color: white;
  font-weight: bold;
  font-size: 24px;
}

.topnav .icon {
  display: none;
}

.loginDiv{
    float:right;
}

.produitEntity{
    /*width:190px;*/
    width:18%;
    /*height:190px;*/
    height:33%;
    float:left;
    margin-bottom:50px;
    margin-left:20px;
    margin-bottom:60px;
}
.produitEntity{
    /*width:190px;*/
    width:18%;
    /*height:190px;*/
    height:33%;
    float:left;
    margin-bottom:50px;
    margin-left:20px;
    margin-bottom:60px;
}
/*.produitEntity img{*/
/*    width:400px;*/
/*}*/
img.produit{
			width:235px;height:185px; border-radius:10px;display:inline-block;
		}
.produitBox{
    width:100%;
}




	   .menu{
		   display: none;
	   }
	   .menu-mobile{
		   margin-top: 200px;
		   display: none;
		   background-color: #db545a;
		   width: 158px;
		   position: fixed;
		   left: 0;
	   }
	   h3.nom-kassouwa{
		   display: block;
		   color: white;
		   font-size: 20px;

	   } 
	   
	   
	   #modal2{
	       width:30%;
	   }
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  .topnav div:not(:first-child) {display: none;}
  /*.topnav div:not(:first-child) {display: none;}*/
  /*.topnav div a:not(:first-child) {display: none;}*/
  /*.topnav div a.icon {*/
  /*  float: right;*/
  /*  display: block;*/
  /*}*/
  .menuPrincipal{
    float:left;
    display:block;
    margin-top:80px;
}

.topnav a.active{
    display:block;
}
.produitEntity{
    /*width:190px;*/
    width:20%;
    /*height:190px;*/
    max-height:20%;
    float:left;
    /*margin-bottom:15%;*/
    margin-left:4%;
    margin-bottom:80px;
}
.produitEntity:active{
    background-color:black;
}
.produitEntity h2{
    margin-top:5px;
    font-size:10px;
}
img.produit{
			width:150px;height:80px; border-radius:10px;display:inline-block;
		}
		
#modal2{
	       width:80%;
	   }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive div {
    float: none;
    display: block;
    text-align: left;
  }
.topnav.responsive div a {
    float: none;
    display: block;
    text-align: left;
  }

  /*  .topnav.responsive {position: relative;}*/
  /*.topnav.responsive .icon {*/
  /*  position: absolute;*/
  /*  right: 0;*/
  /*  top: 0;*/
  /*}*/
  /*.topnav.responsive div a {*/
  /*  float: none;*/
  /*  display: block;*/
  /*  text-align: left;*/
  /*}*/
}

/* css pour modal */
/* Style the Image Used to Trigger the Modal */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}



.modal{
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
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
/* Caption of Modal Image (Image Text) - Same Width as the Image */

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
  color: #db545a; }

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
  background: #db545a;
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
  </style>
    
 </head>
 <body class="u-body u-xl-mode" data-lang="fr">
     

<div class="topnav" id="myTopnav">
    
  <!--<a href="#home" class="active"><img src="/images/logo-kassouwa-new2.png">Hamoprise </a>-->
   @yield('titreBoutique')

  <div class="menuPrincipal">
       @yield('menuLiens')
  
  
  
  </div>

  <div class="loginDiv">
  <a href="/inscription">Créer une Boutique</a>
  <a href="/connexion">Se connecter</a>      
  </div>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<!--<div id="chercher" style="background-color:#db545a;width:400px;">-->
<!--    <div style="display:flex;background-color:white;width:390px;border-radius:7px;margin-left: auto;-->
<!--    margin-right: auto;">-->
        
<!--    <div style="padding-left:10px;">-->
        @yield('inputSeach')
        
<!--    </div>-->
  
<!--  <div style="width:20%; float:right"> chercher</div>-->
<!--</div>-->
<!--</div>-->


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

      
       <!--<div class="divSection">-->
       
       @yield('contenue')
       
       <!--</div>-->
     
 </body>
 </html>