
@extends('base_boutique')
@extends('pageloader')

@section('titre')
    <?php use App\Models\Boutique;
    /* cette page peut etre referencié pqr deux internaute , soit un client en passage ou un vendeur lui-meme qui va d'abord se connecter*/
  if(isset($_GET['id'])){ /* si c'est client */

  echo Boutique::find($_GET['id'])->nom_B;

}
  else{ /* sinon c'est que c'est vendeur */
     
    echo session('boutique')->nom_B;

  }
  ?>
  @endsection
  <div style="background-color: #FF5757;position:fixed;width:100%;">
  <?php
  $str = $_GET['id'];
  $int=preg_replace("/[^0-9]/", '', $str);
  echo '<input type="number" style="display:none;" id="idBForAsync" value='.$int.'>';
  if(isset($_GET['id'])){
    /*affichage de logo de la boutique au niveau client*/
     $nom1=substr(Boutique::find($_GET['id'])->photo_profil, 11);
     session()->put('id_B',$_GET['id']);
     echo '<a href="/boutique?id='.$_GET['id'].'">
     
     <img class="BoutiqueProfilTriangle"  src="/images/triangle.png"><img class="BoutiqueProfil" src="storage/MarkImages/'.$nom1.'" alt="logo de profil">
     <h1 translate="no" class="BoutiqueMarkTitle">'.Boutique::find($_GET['id'])->nom_B.'</h1><img class="BoutiqueProfil" src="/images/storeIcon.png" alt="logo de la boutique"></a> 
     <form class="recherche" id="recherche" action="/rechercher" method="get">
     <div class="rechercheBox">
     
     <input class="champ-requet" id="champ-requet" type="search" name="requete" placeholder="Recherche dans '.Boutique::find($_GET['id'])->nom_B.' ..." required="">
     
    
        <input  class="btn-recherche" id="btn-recherche" type="image" name="recherche" src="images/recherche.png"   onclick="recherche()"> 
      
      </div>
    </form><br><br><br><hr>';

  }
  else{
    /*affichage de logo de la boutique  au niveau vendeur*/
 echo '<a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';

}
 
  ?>

</div><br><br><br>
@section('contenue')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
document.getElementById('idBForAsync').style.display="none";
document.onload = function(){ 
};
window.addEventListener('load',() => {

  var id = document.getElementById('idBForAsync').value;

                 $.ajax({
                    url: "/boutique-visite?id="+id
                })
                .done(function( data ) {
                    data.answer;
                });
                
                
});
</script>

  <!-- la partie javascript ecrit pour certains boutons de la page -->
  <script type="text/javascript">
    function ajouter(id_B,id_V){
            document.getElementById('btn-ajout').style.display="none";
      document.getElementById('produit').style.display="block";
      document.getElementById('id_B').value=id_B;
      document.getElementById('id_V').value=id_V;
      document.getElementById("btn-entete").style.display="none";
    }
    function terminer(){
      document.getElementById('produit').style.display="none";
            document.getElementById('btn-ajout').style.display="block";

    }
   
    function annuler(){
      document.getElementById('produit').style.display="none";
      location.reload();
    }
  </script>
  <br><br><br><div id="produit" style="display: none;">

   <!-- formulaire d'ajout d'un produit -->

    <form action="{{ url('/boutique/ajouterP') }}" method="post" enctype="multipart/form-data">
      {{ @csrf_field() }}
      <input style="display:none;" type="number" name="id_B" id="id_B">
      <input style="display: none;" type="number" name="id_V" id="id_V">
      <label for="url_photo">photo:</label>
      <input type="file" name="url_photo" id="url_photo" required=""><br>
      <label for="prix">prix:</label>
      <input type="number" name="prix" id="prix" required=""> <br><br>
      <label for="libelle">Libelle:</label>
      <input type="text" name="libelle" id="libelle" required=""><br><br>
      <label for="description">description:</label>
      <textarea type="text" name="description" id="description"></textarea><br>
      <input class="btn"  style="background-color: #00FF00;" type="submit" name="Terminer" value="Terminer"  onclick="terminer()">
      <button class="btn" onclick="annuler()">Annuler</button>
    </form>
  </div>



  
  <?php 

  use Illuminate\Support\Facades\DB;

  $produits=DB::table('produits')->get();
  /* affichage des produit etant client */
  if(isset($_GET['id'])){


    session()->put('client',1);
    
echo'<div class="produitBox">';
      foreach($produits as $produit){

    
        if($produit->id_B==$_GET['id']){
                
                

                $nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                
                	
						
          echo '
           
          <div class="produitEntity">';
          echo '<img id="'.$produit->id.'id" class="produit" onclick="launchModal('.$produit->id.')"  alt="une image d un produit" src="storage/images/'.$nom.'">';
          echo '<div>
          <p id="'.$produit->id.'libelle" >'.$produit->libelle.'</p>';
          echo '<h2 id="'.$produit->id.'prix" style="color:black;">'.$produit->prix.'€</h2>
          </div>
           
          <p id="'.$produit->id.'description" style="display:none;">'.$produit->description.'</p>
          <input type="number" id="idBoutique" style="display:none;" value="'.$produit->id_B.'">
          <input type="text" id="'.$produit->id.'strip_price" style="display:none;" value="'.$produit->stripe_price.'" />
          ';

          echo "</div>";

                }
          }
          
          echo '</div>';
    }
    else{
      /* affichage des produits et d'autres boutons suplementaire etant vendeur*/
     

echo '<div id="btn-entete" style="position:fixed;"><button class="btn btn-primary" style="background-color:#FFFFF0;">

    <a 
    href="/boutique" style="text-decoration:none;"><img class="icon" src="images/icon-produit.jpg"> produits
   </a>
  </button>

  ';



      echo '<button class="commande">
        <a href="/boutique/commande?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-commande.jpg">

    commandes
  </a>
  </button>';
  echo '<button class="profil">
        <a href="/boutique/profil?id_B='.session('boutique')->id.'"><img class="icon" src="images/icon-boutique.jpg">

   profil
  </a>
  </button>
  </div>';
   $id_B=session('boutique')->id;
       //  le bouton d'ajout ne peut etre vu que par le vendeur 
        echo '<br><br><button id="btn-ajout" class="btn-ajout"  onclick="ajouter('.$id_B.','.session('vendeur')->id.')">+</button><br>';
  session()->put('client',0);
      
        /* affichage de produit b*/
        echo "<br>";
        foreach ($produits as $produit) {
          if($produit->id_B==session('boutique')->id){
          
           $nom=substr($produit->url_photo, 14);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
           echo '<input type="number" id="id" value='.$produit->id.'>
          <input type="text" id="nom" value='.$nom.'>
          <input type="text" id="libelle" value='.$produit->libelle.'>
          <input type="text" id="prix" value='.$produit->prix.'>
          <input type="text" id="description" value='.$produit->description.'>
          
          ';
          echo '<a style="text-decoration:none;display:inline-block; margin-left:5;" href="/boutique/produit?id='.$produit->id.'">';
           echo '<img class="produit" style="width:170px;height:160px; border-radius:10px; display:inline-block;" src="/images/'.$nom.'">';
           echo '<h3>'.$produit->libelle.'</h3>';
           
            echo '<h2 style="color:black;">'.$produit->prix.' € <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';
             echo "</a>";

          
         }

       }
    

    }
   

 ?>
<!-- @foreach ($produits as $produit)

@if($produit->id_B=$_GET['id'])
$nom=substr($produit->url_photo, 14)
<img id="myBtn" class="produit" onclick="launchModal({{$produit->id}},'hh','{{$produit->libelle}}','{{$produit->prix}}','{{$produit->description}}')"  alt="une image d un produit" src="storage/images/hh">';
           <p>{{$produit->libelle}}</p>
           <h2 style="color:black;">{{$produit->prix}}  DT <span style="background-color:#FF9888;color:white; border-radius:3px;">New</span></h2>';

    @endif
@endforeach -->


<!-- Trigger the Modal -->

<h4 id="telVendeur" style="display:none;"><?  use App\Models\Vendeur;
      $B=Boutique::find($_GET['id']);
       $tel=Vendeur::find($B->id_V)->tel; 
       echo $tel;?></h4>

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
							<button class="add-to-cart btn btn-default" type="button" onclick="commandeModal()">Discuter</button>
							<button class="like btn btn-default" type="button"><i class="bx bx-heart"></i></button>
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
  <div class="modal-content">
      
      <!-- The Close Button -->
    <span class="close">&times;</span>
  
  <!--<h1>Audio</h1>-->

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
    <!--<button id="downloadButton">Download</button>-->

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
        <img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments" />
        <div class="description">
          <h3>entrez votre numero vous serz contacté</h3>
          
        </div>
      </div>
      
      
  <?
   require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
  ?>
  
	<div   id="formulaire"><form action="{{url('/boutique/produit/commande')}}" method="post" >
	{{ @csrf_field() }}
<img style="width:70px;height:90px;" src="/images/photo-telephone.jpg"><input style="height:30px;font-size:20px;type="number" name="contacts" required placeholder="numero de telephone">

<?php   /* si c'est client */

  

 echo '<input style="display:none;" id="idProduitInput" type="number" name="id_P"">
<input style="display:none;" id="idBoutiqueInput" type="number" name="id_B"/>';

?>

<input class="btn btn-primary" type="submit" name="envoyer" value="envoyer" >
</form></div>

	

  
  </div>
  </div>

</div>






<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<div class="container">
 <h3 class="h3">shopping Demo-3 </h3>
    <div class="row">
    <?php
    // foreach($produits as $produit){

    
    //     if($produit->id_B==$_GET['id']){
                
                

    //             $nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                
    //           echo '<div class="col-md-3 col-sm-6">
    //         <div class="product-grid3">
    //             <div class="product-image3">
    //                 <a>
                        
    //                     <img id="'.$produit->id.'id" class="pic-1" onclick="launchModal('.$produit->id.')"  alt="une image d un produit" src="storage/images/'.$nom.'">
                        
    //                 </a>
    //                 <ul class="social">
    //                     <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
    //                     <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
    //                 </ul>
    //                 <span class="product-new-label">New</span>
    //             </div>
    //             <div class="product-content">
    //                 <h3 class="title"><a href="#">'.$produit->libelle.'</a></h3>
    //                 <div class="price">
    //                     '.$produit->prix.'€
    //                     <span>$75.00</span>
    //                 </div>
    //                 <ul class="rating">
    //                     <li class="fa fa-star"></li>
    //                     <li class="fa fa-star"></li>
    //                     <li class="fa fa-star"></li>
    //                     <li class="fa fa-star disable"></li>
    //                     <li class="fa fa-star disable"></li>
    //                 </ul>
    //             </div>
    //         </div>
    //     </div>'; 	
						
          
    //             }
    //       }
          ?>
     

</div>



<script>

function launch(id){

<!--var idStr=id+"id";-->
<!--var img = document.getElementById(idStr);-->
<!--var modalImg = document.getElementById("imgNew");-->
<!-- modalImg.src = img.src;-->
}

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
 
  var libelleValue=document.getElementById(idLibelle).textContent; 
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
@endsection
