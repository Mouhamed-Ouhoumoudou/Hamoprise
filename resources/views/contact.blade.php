@extends('base')
@section('titre')
Contacts


@endsection
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1156274418867959');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1156274418867959&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<link rel="stylesheet" href="template1/css/bootstrap.min.css">
@section('contenue')
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S0JFXYGV8W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S0JFXYGV8W');
</script>
      
      <!--<div style="width:390px;margin: 0 auto;">-->
           
      <!--    </div>-->



<style>
          
       .first { 
            width: 47%; 
            display: inline-block; 
            
            padding-left:60px;
            
        } 
  
        .second { 
            width: 47%; 
            display: inline-block; 
            
            padding-right:60px;
            
        } 
  
        .TextColor2{
        color:#191970;
       
       }
  
        @media screen and (max-width: 550px) { 
  
            .first, 
            .second
             { 
                width: 95%; 
                padding:4px;
            } 
              h3.TextColor1{
      font-size:29px;
  }
  h4.TextColor1{
      font-size:20px;
  }
        .TextColor2{
        color:#191970;
       font-size:12px;
       }
        } 
</style>
<div class="first">
    <!--<p>disponible pour mieux vous servir</p>-->
<h3 class="TextColor1" style="font-weight: bold;">Contacter notre équipe</h3>         
<p class="TextColor2"> Pour les coordonnées : </p>

<!--Adresse : [Adresse physique de votre entreprise]-->
<!--<h4 class="TextColor1">Téléphone : +33 7 58 32 66 47</h4>-->
<h4 class="TextColor1">E-mail : contact@hamoprise.com</h4>
<h4 class="TextColor1">facebook, Instagram: @Hamoprise</h4>
   <p class="TextColor2"> Nous sommes ravis de vous offrir un moyen de communication directe avec notre équipe. Si vous avez des questions, des commentaires, des demandes spécifiques ou si vous souhaitez en savoir plus sur nos services, n'hésitez pas à nous contacter. Nous sommes là pour vous aider de toutes les manières possibles.
       </p>
</div>
    <div  class="second">
<img style="height:400px;" src="/images/contactLogo.png" alt="contact">
<h3 class="TextColor1" >Pour mieux vous servir !!</h3>
   <!--<p> Nous sommes ravis de vous offrir un moyen de communication directe avec  -->
   <!--    </p>-->
    </div>
<!--<div style="width:300px;margin: 0 auto;">-->

<!--Coordonnées de Contact :-->

<!--Adresse : [Adresse physique de votre entreprise]-->
<!--<h5 class="TextColor1">Téléphone : +33 7 58 32 66 47</h5>-->
<!--<h5 class="TextColor1">E-mail : contact@hamoprise.com</h5>-->
<!--<h5 class="TextColor1">facebook, Instagram: @Hamoprise</h5>-->
<!-- </div>    -->
      
       <p class="TextColor2">Mettez en valeur vos produits de manière captivante. Notre plateforme simplifie tout le processus, de la mise en page à la gestion des stocks, vous permettant ainsi de vous concentrer sur ce qui compte vraiment
       </p>
       
                    <style>
.loader {
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 2px solid #FF5757;
  border-right: 2px solid #FF5757;
  border-bottom: 2px solid #FF5757;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  
  position: fixed;
  top: 50%;
  left: 50%;
  margin: -50px 0 0 -50px;
  
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}






.fondu-out {
    opacity: 0;
    transition: opacity 0.4s ease-out;
}

        </style>
 
              <div  class="loader"></div>
 <script>
      const loader = document.querySelector('.loader');

window.addEventListener('load', () => {

    loader.classList.add('fondu-out');

})
        </script>
@endsection