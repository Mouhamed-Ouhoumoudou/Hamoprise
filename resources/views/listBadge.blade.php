@extends('mariageinTemplate')
@section('titre')

liste des participants en temps réel
@endsection

@section('contenu')


  



<div class="container" >
    <div class="row">
    	<div class="col-xxl-12 ">
			<div class="col-xxl-12 col-xxl-12">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info"></h4>
					
					
					<h4>Liste des badges pour le  mariage de cha'aibou <blink style="color:green;"><span >en temps réel</span></blink></h4>
					
					

					
					
					
					<table class="table table-striped">
					    <th>Nom</th>
					    <th>photo</th>
					    <?php
					    use Illuminate\Support\Facades\DB;

  $produits=DB::table('produits')->get();
  /* affichage des produit etant client */


  
    

      foreach($produits as $produit){

    
        if($produit->prix==999){
                
                

                $nom=substr($produit->url_photo, 7);/* pour recuper le nom d'image dans le url public/images/nomDuFichier*/
                
                	
						
         if($produit->badge==1){
              echo '<tr><td><img id="'.$produit->id.'id"  alt="une image d un produit" style="width:100px;height:100px; border-radius:50px;" src="storage/images/bWXANuWcneIMo3aJuYDqHXYwM0H6WSmxViIOzM10.jpg"></td>';
              
          echo "<td>$produit->libelle</td>';
          </tr>";
         }
         else{
             
        
          echo '<tr><td><img id="'.$produit->id.'id"  alt="une image d un produit" style="width:100px;height:100px; border-radius:50px;" src="storage/images/'.$nom.'"></td>';
          echo "<td>$produit->libelle</td>';
          </tr>";
         }
           
          
          
        }
      }
        
          
					    ?>
					</table>
							

<script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

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
</script>

<div class="row">
							<div class="col-xxl-12" id="partage" onclick="parager(1)">
								<a class="btn  btn-success btn-product"><span class=""><i class="bx bx-whatsapp"></i></span>
								Partager &nbsp; &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg></a> 
         <script>
         function parager(id){
             var idv=id;
             const shareData = {
  title: 'mariage',
  text: 'Trouver un badge pour mariage de Cha\'aibou et il vous verait dans la liste des participants virtuels!',
  url: 'https://hamoprise.com/liste
}

const btn = document.querySelector('#partage');

// Share must be triggered by "user activation"
btn.addEventListener('click', async () => {
  try {
    await navigator.share(shareData);
    
  } catch (err) {
    alter("erreur");
  }
});
         }
         
</script>
							</div>
							<br>
							
							
						
						</div>
        
					
				</div>
			</div>
			
			    
        </div> 

	</div>
</div>

@endsection