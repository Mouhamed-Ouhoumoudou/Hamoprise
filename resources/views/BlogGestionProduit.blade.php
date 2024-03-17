@extends('base')
@section('titre')
Section Article
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
                Gérez Votre Inventaire avec Efficacité
            </h2>
        </div>
        <div class="row tm-mb-74 tm-row-1640">            
            <div class=" col-lg-7 col-md-6 col-12">
                <p>
                     La section Artcile de votre menu, Cette zone est votre hub central pour gérer votre inventaire de manière efficace. Utilisez nos outils intuitifs pour ajouter de nouveaux produits, mettre à jour des informations et maximiser la visibilité de votre catalogue.
                </p>
                <img src="images/2.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <div class="tm-about-img-text">
                    <p class="mb-4">

                    <h5>1. Ajout de Nouveaux Produits</h5> 
                    <p>
Ajoutez facilement de nouveaux produits à votre catalogue. Remplissez les informations essentielles telles que le nom, la description, les images et les prix pour présenter vos produits de manière attrayante</p> 
<h5>2. Gestion des Variantes</h5>
                    <p>
Pour les produits avec différentes options (tailles, couleurs, etc.), utilisez la gestion des variantes pour organiser et présenter toutes les options disponibles de manière claire. si cette fonctionnalité n'est pas disponible pour votre boutique il tres important de les preciser dans la description d'article afin d'ameliorer <a href="https://fr.wikipedia.org/wiki/Optimisation_pour_les_moteurs_de_recherche">l'optimisation pour le moteur de recherche</a></a></p>

<h5>3. Analyse des Performances Produits</h5>
                    <p>


Explorez les statistiques de performance de chaque produit. Identifiez les produits les plus populaires, ajustez vos stratégies de marketing et maximisez vos profits.</p>
<h5>4.Accessibilité des Produits</h5>
                    <p>

 Profiter de liens des partage et des buttons mis en place  pour chaque produit  afin d'ètre accessible depuis les canaux sociaux</p>
                </div>                
            </div>
        </div>
        
 
            
@endsection