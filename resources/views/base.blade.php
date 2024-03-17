

 <html style="font-size: 16px;" lang="fr">
 <head>
     <meta name="theme-color" content="#ffffff" />
     <meta name="google-site-verification" content="Oo95BD_VgOzc3Nr-LQP1f0p6O4NihnNNAfY7X17doDw" />
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>@yield('titre')</title>
 	
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo-kassouwa-new3.png">
    <!--<link rel="icon" type="image/x-icon" href="/images/logo-kassouwa-new2.png">-->
    <link href="/css/app.css" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!--<title>Hamoprise</title>-->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="css/jquery.js" defer=""></script>
    
    <script class="u-script" type="text/javascript" src="css/nicepage.js" defer=""></script>

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
<!--    <script type="application/ld+json">-->
<!--    {-->
<!--		"@context": "http://schema.org",-->
<!--		"@type": "Organization",-->
<!--		"name": "Hamoprise",-->
<!--		"logo": "/images/logo-kassouwa-new2.png",-->
<!--		"sameAs": []-->
<!--}</script>-->
    <!--<meta name="theme-color" content="#478ac9">-->
  <!--  <meta property="og:title" content="Hamoprise">-->
  <!--  <meta property="og:type" content="website">-->
  <!--<meta data-intl-tel-input-cdn-path="css/intlTelInput/">-->
  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
<meta property="og:image" content="https://hamoprise.com/images/logo-kassouwa-new2.png" />
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Hamoprise">
<meta name="twitter:description" content="Plateforme pour créer sa boutique en ligne">
<meta name="twitter:image" content="https://hamoprise.com/images/logo-kassouwa-new2.png">
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
  background-color: #db545a;
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
  background-color: #db545a;
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

       .imageResponsive{
       width:50%;
       float: left;
       }
       #imageResponsive2{
       padding-bottom:250px;
       height:70%;
       }
       #divLead{
       
       }
       #img2{
       width:100%;
       }
       #img2mobile{
       display:none;
       
       }

       .valideIcon{
       width:50px;height:50px;
       }
       .TextColor1{
       color:#191970;
       font-weight: bold;
       }
       .TextColor2{
        color:#191970;
       
       }
       .btn-success{
       background-color:#14A44D;
       width:60%;
       font-weight: 800;
       border: none;
       margin-left:20px;
       }
       .DivListeAvantage{
       margin-left:65px;
       }
       #btnCTAmobile{
       display:none;
       }
       @media (max-width: 550px) {
       .divSection{
    padding-left:15px;
}

       .imageResponsive{
       width:100%;
     
       }
       .DivListeAvantage{
       margin-left:20px; width:100%;height:20%;
       }
       #img2mobile{
       display:block;
       width:90%;
       height:10%;
       
       }
       #img2{
       display:none;
       
       }
       h1.TextColor1{
       top:0;
       color:#191970;
       font-weight: bold;font-size:30px;
       }
       .valideIcon{
       width:40px;height:40px;
       }
       h4.TextColor1{

       color:#191970;
       font-weight: bold;font-size:15px;
       }
       .TextColor2{
        color:#191970;
        font-size:12px;
       
       }
       #btnCTAmobile{
       display:block;
       }
  </style>
    
 </head>
 <body class="u-body u-xl-mode" data-lang="fr">
     

<div class="topnav" id="myTopnav">
  <a href="/" class="active"><img src="/images/logo-kassouwa-new2.png">Hamoprise </a>
  <div class="menuPrincipal">
  <a href="/services">Fonctionnalités</a>
  <a href="/Guide">Guides</a>
  <a href="/tarifs">Tarifs</a>   
  <a href="/demo">Demo</a> 
  <a href="/contacts">Contacter notre équipe </a>  
  
  
  </div>

  <div class="loginDiv">
  <a href="/inscription">Créer une Boutique</a>
  <a href="/connexion">Se connecter</a>      
  </div>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<!--<div id="chercher" style="background-color:#FF5757;width:400px;">-->
<!--    <div style="display:flex;background-color:white;width:290px;border-radius:7px;margin-left: auto;-->
<!--    margin-right: auto;">-->
        
<!--    <div style="padding-left:10px;">-->
<!--        <input style="border: none;">-->
<!--    </div>-->
  
<!--  <div>chercher</div>-->
<!--</div>-->
<!--</div>-->


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
     document.getElementById("myModal").style.display="none";
  } else {
    x.className = "topnav";
     document.getElementById("myModal").style.display="block";
  }
  
 
}
</script>

<!--      <header class="u-clearfix u-header u-palette-2-base u-valign-middle-md u-header" id="sec-72b9">-->
<!--          <img class="u-align-left u-image u-image-round u-radius-10 u-image-1 animated customAnimationIn-played" data-image-width="1000" data-image-height="1000" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250" src="/images/logo-kassouwa-new2.png" style="will-change: transform, opacity; animation-duration: 1500ms;">-->
      

      
<!--      <h2 class="u-text u-text-default u-text-1" ><span><img src="/images/logo-kassouwa-new2.png"></span>Hamoprise </h2><nav class="u-menu u-menu-one-level u-offcanvas u-menu-1 u-enable-responsive">-->
<!--        <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700;">-->
<!--          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" data-lang-fr="{&quot;content&quot;:&quot;<svg class=\&quot;u-svg-link\&quot; viewBox=\&quot;0 0 24 24\&quot;><use xmlns:xlink=\&quot;http://www.w3.org/1999/xlink\&quot; xlink:href=\&quot;#svg-0016\&quot;></use></svg><svg class=\&quot;u-svg-content\&quot; version=\&quot;1.1\&quot; id=\&quot;svg-0016\&quot; viewBox=\&quot;0 0 16 16\&quot; x=\&quot;0px\&quot; y=\&quot;0px\&quot; xmlns:xlink=\&quot;http://www.w3.org/1999/xlink\&quot; xmlns=\&quot;http://www.w3.org/2000/svg\&quot;>    <g>        <rect y=\&quot;1\&quot; width=\&quot;16\&quot; height=\&quot;2\&quot;></rect>        <rect y=\&quot;7\&quot; width=\&quot;16\&quot; height=\&quot;2\&quot;></rect>        <rect y=\&quot;13\&quot; width=\&quot;16\&quot; height=\&quot;2\&quot;></rect>    </g></svg>&quot;,&quot;href&quot;:&quot;#&quot;}">-->
<!--            <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0016"></use></svg>-->
<!--            <svg class="u-svg-content" version="1.1" id="svg-0016" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>-->
<!--</g></svg>-->
<!--          </a>-->
<!--        </div>-->
<!--        <div class="u-custom-menu u-nav-container">-->
<!--          <ul class="u-nav u-unstyled u-nav-1">-->
<!--              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-white u-text-white active" href="/Guide" data-lang-fr="{&quot;content&quot;:&quot;Creer une boutique&quot;,&quot;href&quot;:&quot;Accueil.html&quot;}" style="padding: 10px 6px;">Guide</a>-->
<!--            </li>-->
<!--              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-white u-text-white active" href="/inscription" data-lang-fr="{&quot;content&quot;:&quot;Creer une boutique&quot;,&quot;href&quot;:&quot;Accueil.html&quot;}" style="padding: 10px 6px;">Creer une Boutique</a>-->
<!--</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-hover-white u-text-white" href="/connexion" data-lang-fr="{&quot;content&quot;:&quot;se connecter&quot;,&quot;href&quot;:&quot;À-propos-de.html&quot;}" style="padding: 10px 2px 10px 6px;">Se connecter</a>-->
<!--</li></ul>-->
<!--        </div>-->
<!--        <div class="u-custom-menu u-nav-container-collapse">-->
<!--          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">-->
<!--            <div class="u-inner-container-layout u-sidenav-overflow">-->
<!--              <div class="u-menu-close"></div>-->
<!--              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item  "><a class="u-button-style u-nav-link active" href="Accueil.html" data-lang-fr="{&quot;content&quot;:&quot;Creer une boutique&quot;,&quot;href&quot;:&quot;Accueil.html&quot;}">Creer une Boutique</a>-->
<!--</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" data-lang-fr="{&quot;content&quot;:&quot;se connecter&quot;,&quot;href&quot;:&quot;À-propos-de.html&quot;}">Se connecter</a>-->
<!--</li></ul>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>-->
<!--        </div>-->
<!--      <style class="offcanvas-style">            .u-offcanvas .u-sidenav { flex-basis: 250px !important; }            .u-offcanvas:not(.u-menu-open-right) .u-sidenav { margin-left: -250px; }            .u-offcanvas.u-menu-open-right .u-sidenav { margin-right: -250px; }            @keyframes menu-shift-left    { from { left: 0;        } to { left: 250px;  } }            @keyframes menu-unshift-left  { from { left: 250px;  } to { left: 0;        } }            @keyframes menu-shift-right   { from { right: 0;       } to { right: 250px; } }            @keyframes menu-unshift-right { from { right: 250px; } to { right: 0;       } }            </style></nav>-->
<!--      <form action="/rechercher"" method="get" class="u-radius-20 u-search u-search-left u-white u-search-1">-->
<!--        <button class="u-search-button" type="submit">-->
<!--          <span class="u-search-icon u-spacing-10">-->
<!--            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 56.966 56.966"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-6a0c"></use></svg>-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-6a0c" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" class="u-svg-content"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path></svg>-->
<!--          </span>-->
<!--        </button>-->
<!--        <input class="u-search-input" type="search" name="search" value="" placeholder="Rechercher un produit ex: chemise">-->
<!--      </form></header>-->
      
       <div class="divSection">
       
       @yield('contenue')
       
       </div>
<!-- <footer class="u-clearfix u-footer u-grey-80" id="sec-e433"><div class="u-clearfix u-sheet u-sheet-1">-->
<!--        <div class="u-clearfix u-expanded-width u-gutter-30 u-layout-wrap u-layout-wrap-1">-->
<!--          <div class="u-gutter-0 u-layout">-->
<!--            <div class="u-layout-row">-->
<!--              <div class="u-align-center-sm u-align-center-xs u-align-left-md u-align-left-xl u-container-style u-layout-cell u-left-cell u-size-20 u-size-30-md u-layout-cell-1">-->
<!--                <div class="u-container-layout u-valign-middle u-container-layout-1"><!--position-->
<!--                  <div data-position="" class="u-position"><!--block-->
<!--                    <div class="u-block">-->
<!--                      <div class="u-block-container u-clearfix"><!--block_header-->
<!--                        <h5 class="u-block-header u-text"><!--block_header_content-->
<!--Hamoprise <!--/block_header_content</h5>-->
<!--/block_header--><!--block_content-->
<!--                        <div class="u-block-content u-text"><!--block_content_content
<!--Hamoprise est une place de marché virtuelle pour vendeurs et commerçants,une alternative à la création de sites de vente, permettant aux commerçants de vendre rapidement leurs produits et leurs fonds sont automatiquement transférés sur leurs coordonnées bancaires. . 
/block_content_content</div>
<!--/block_content-->
<!--                      </div>-->
<!--                    </div><!--/block-->
<!--                  </div><!--/position-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="u-align-center-sm u-align-right-md u-container-style u-layout-cell u-size-20 u-size-30-md u-layout-cell-2">-->
<!--                <div class="u-container-layout u-container-layout-2">-->
<!--                  <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="1000" data-image-height="1000">-->
<!--                    <img src="images/logo-kassouwa-new2.png" class="u-logo-image u-logo-image-1">-->
<!--                  </a>-->
<!--                </div>-->
<!--              </div>-->
<!--              <div class="u-align-center-sm u-align-center-xs u-align-left-md u-align-right-lg u-align-right-xl u-container-style u-layout-cell u-right-cell u-size-20 u-size-30-md u-layout-cell-3">-->
<!--                <div class="u-container-layout u-valign-middle u-container-layout-3">-->
<!--                  <div class="u-social-icons u-spacing-10 u-social-icons-1">-->
<!--                    <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-dedc"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-dedc"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2-->
<!--      c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>-->
<!--                    </a>-->
<!--                    <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7c5e"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7c5e"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2-->
<!--      c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1-->
<!--      c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14-->
<!--      c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4-->
<!--      c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>-->
<!--                    </a>-->
<!--                    <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2a44"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-2a44"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2-->
<!--      z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8-->
<!--      C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5-->
<!--      c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>-->
<!--                    </a>-->
<!--                    <a class="u-social-url" title="linkedin" target="_blank" href=""><span class="u-icon u-social-icon u-social-linkedin u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9af4"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-9af4"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7-->
<!--      C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5-->
<!--      H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path></svg></span>-->
<!--                    </a>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div></footer>-->
<!--    <section class="u-backlink u-clearfix u-grey-80">-->
<!--      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">-->
<!--        <span>Website Templates</span>-->
<!--      </a>-->
<!--      <p class="u-text">-->
<!--        <span>created with</span>-->
<!--      </p>-->
<!--      <a class="u-link" href="" target="_blank">-->
<!--        <span>Website Builder Software</span>-->
<!--      </a>. -->
<!--    </section>-->
 

 
 <div  >
  <!-- Footer -->
  <footer 
          class="text-center text-lg-start text-white"
          style="background-color: #28282B;width:100%;"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Hamoprise
            </h6>
            <p >
             <!--Hamoprise est une place de marché virtuelle pour vendeurs et commerçants,une alternative à la création de sites de vente, permettant aux commerçants de vendre rapidement leurs produits et leurs fonds sont automatiquement transférés sur leurs coordonnées bancaires.-->
              Votre Allié pour la Création de Boutiques en Ligne Performantes,offrant une expérience équivalente à celle des leaders du marché. Que vous soyez un entrepreneur debutant ou un professionnel chevronné.Notre plateforme vous permet de construire facilement votre présence en ligne, avec des fonctionnalités avancées et une interface conviviale. 
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
            <p>
              <a class="text-white" href="/">Hamoprise</a>
            </p>
            <p>
              <a class="text-white">MarketPlace</a>
            </p>
            <p>
              <a class="text-white" href="/Guide">Guides</a>
            </p>
            <p>
              <a class="text-white" href="/contacts">nous contacter</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fa fa-home mr-3"></i> 91350 Grigny,France</p>
            <p><i class="fa fa-envelope mr-3"></i> contact@hamoprise.com</p>
            <p><i class="fa fa-phone mr-3"></i> + 33 7 58 32 66 47</p>
            <!--<p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>-->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Suivez-nous</h6>

  <!--instagram-->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: red"
               href="https://www.instagram.com/hamoprise/"
               role="button"
               >
                
                <!--Instagram-->
                <i class="fa fa-instagram"></i>
              </a>
            <!-- Facebook -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #3b5998"
               href="https://www.facebook.com/p/Hamoprise-100060345133351/?paipv=0&eav=AfbXJ0jBrtMGTrRm1_H8gveVFS9WMaBp0zO3QE6YP602cqO6VCcYRaYifnoBEfMaHSc&_rdr"
               role="button"
               >
                <!--Facebook-->
               
               <i class="fa fa-facebook"></i>
               </a>
                
     <!--youtube-->

                <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: red"
               href="https://www.youtube.com/channel/UCICRR13kZla4KO3kBUBE_3g"
               role="button"
               >
                
                <!--YouTube-->
                <i class="fa fa-youtube"></i>
              </a>
              
            @Hamoprise

          </div>
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © <?php $dateToday=new DateTime();

        $annee_dateToday=$dateToday->format('y'); echo '20'.$annee_dateToday.' Copyright:';
        ?>
      <a class="text-white" href="https://hamoprise.com/"
         >Hamoprise.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->
     
 </body>
 </html>