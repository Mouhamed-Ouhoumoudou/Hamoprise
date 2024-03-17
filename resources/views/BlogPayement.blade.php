@extends('base')
@section('titre')
Section Message
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
    <link rel="stylesheet" href="template1/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="template1/css/templatemo-style.css">
    
 
@section('contenue')

                <div class="row mb-4">
            <h2 class="col-12 ">
               Les options de paiements sont déjà integrées!!
            </h2>
        </div>
        <div class="row tm-mb-74 tm-row-1640">            
            <div class=" col-lg-7 col-md-6 col-12">
Nous sommes ravis de vous informer que notre plateforme prend en charge une solution de paiement intégrée, vous permettant d'accepter des paiements en ligne pour vos produit en toute simplicité. Hamoprise offre une expérience transparente, avec la possibilité d'utiliser plusieurs cartes de crédit parmi les plus couramment utilisées.</p>
                <img src="images/7-2.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <div class="tm-about-img-text">
                    <p class="mb-4">


 <h5>1. Cartes de Crédit Prises en Charge</h5>
                    <p>

Hamoprise par l'intermediaire de Stripe, prend en charge plusieurs cartes de crédit, offrant une flexibilité maximale pour répondre aux préférences de paiement de vos clients. Parmi les cartes les plus utilisées, nous incluons :

<ul>
    <li>Visa
</li>
    <li>MasterCard
</li>
    <li>American Express
</li>
    <li>CB
</li>
</ul>

</p>
<h5>2. Notifications Instantanées et Gestion des Transactions</h5>
                    <p>

Recevez des notifications en temps réel pour chaque transaction réussie. La gestion des transactions est simplifiée, vous permettant de suivre et de gérer efficacement chaque paiement depuis votre tableau de bord marchand.</p>

<h5>3. Support Client Hamoprise</h5>
                    <p>

Profitez du support client dédié de Hamoprise. L'équipe est là pour répondre à toutes vos questions sur les paiements, assurant une expérience fluide et sans accroc pour vous et vos clients.</p>


      </div>
            </div>
        </div>
        
  
        
 @endsection       