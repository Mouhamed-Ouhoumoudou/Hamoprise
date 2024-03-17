@extends('base')
@section('titre')
Connexion

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
    <!--<link rel="stylesheet" href="template1/fontawesome/css/all.min.css">-->
    <!--<link rel="stylesheet" href="template1/css/templatemo-style.css">-->
    
    <style >

.u-section-1 .u-sheet-1 {
  min-height: 522px;
}

.u-section-1 .u-text-1 {
  font-weight: 700;
  margin: 57px auto 60px;
}

	input.borderStyle{
		border-top: none;
		border-left: none;
		border-right: none;
		
		border-bottom-color: #FF5757;
			padding-left: 5px;

	}

	
	}
	input:active{
		border-color: white;
		border-color: white;
		border-bottom-color: #FF5757;
}
.btn-success{

       font-weight: 800;
       border: none;

       }

#corps {
    background-image: url("images/connexion_page_background.jpg");
}
 @media (max-width: 550px) {
     #corps {
    background-image: url("images/connexion_page_background_Mobile.jpg");
  /*  background-repeat: no-repeat;*/
  /*    background-size: cover;*/
  /*height: 200px;*/
  /*position: relative;*/

}
 }

   <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: grid; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  
  left: 0;
  top: 75px;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  justify-content:center;
  align-content:center;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.loader2 {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 100px;
  height: 100px;
  margin: -76px 0 0 -76px;
  border: 2px solid #ff5757;
  border-radius: 50%;
  border-top: 6px solid white;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  display:none;
}
</style>



@section('contenue')
 <!--Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S0JFXYGV8W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S0JFXYGV8W');
</script>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  

    <h6 class="u-text u-text-default u-text-1">Connexion à votre boutique</h6>

    <div class="loader2"  id="loader2"></div>
   
    <!--            <h3>Ajax Fonctionne bien </h3>-->
    <!--<button class="ask-server" onclick="affiche()"> comment vas-tu server </button>-->
        	<form id="myform" action="{{ url('/connexion/connecter')}}" method="post">
		{{@csrf_field()}}
		<!--<h3> Vendeur</h3>-->
		<label id="Téléphone:" for="nom_V"></label>
		<input type="text" class="borderStyle form-control" name="tel_V" id="tel" placeholder="Email ou Téléphone" onclick="label('Téléphone:')"  required="">
		
		<label id="Mot de passe:" for="passwd"></label>
		<input type="password" class="form-control borderStyle" name="mpass" id="passwd" placeholder="Mot de passe" onclick="label('Mot de passe:')" required=
		o; 0"><br>
		<input type="checkbox" class="" onclick="ShowPassword()">Afficher le mot de passe
			<input class="btn btn-success form-control" onclick="startLoader()" style="background-color:#FF5757;font-weight: 800;border: none;" type="submit" name="connecter" value="Se Connecter" id="connecter">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
		<script >
			
			  function affiche(){
            $.ajax({
                    url: "/ask-server"
                })
                .done(function( data ) {
                    alert(data.answer);
                });
        }
			function label(id){
								document.getElementById(id).innerHTML=id;
			}
			
			 function ShowPassword() {
  var x = document.getElementById("passwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
		</script>
	</form>
	<a class="text fs-6" href="/inscription">créer une boutique?</a>
  </div>

</div>

 <div style="height:400px">
</div>      
        
        
 @endsection       