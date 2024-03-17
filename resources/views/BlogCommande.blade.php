@extends('base')
@section('titre')
Section Commandes
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
                Gérez Vos Commandes en Toute Simplicité
            </h2>
        </div>
        <div class="row tm-mb-74 tm-row-1640">            
            <div class=" col-lg-7 col-md-6 col-12">
                <p>
                    la section Commande de votre tableau de bord marchand ! Cette section est le cœur de la gestion des transactions pour votre boutique. Voici comment vous pouvez tirer le meilleur parti de cette fonctionnalité :
                </p>
                <img src="images/5.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <div class="tm-about-img-text">
                    <p class="mb-4">

                    <h5>Suivi des Commandes en Temps Réel</h5> 
                    <p>
                        
Dès qu'un client passe une commande sur votre boutique, elle apparaîtra automatiquement dans la section "Commande". Suivez chaque étape, de la confirmation à l'expédition, en un coup d'œil. Cela vous permet de rester informé et d'assurer un traitement rapide.</p> 
<h5>Statuts Personnalisables</h5>
                    <p>
Adaptez les statuts de vos commandes selon votre processus de traitement. De "En Attente" à "Expédiée", personnalisez les statuts pour refléter précisément la progression de chaque commande.</p>

<h5>Notifications Automatiques</h5>
                    <p>

Le système enverra automatiquement des notifications aux clients pour les informer de chaque étape de leur commande. Plus besoin de vous soucier des mises à jour manuelles.</p>
                </div>                
            </div>
        </div>
        
 @endsection       