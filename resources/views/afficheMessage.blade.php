@extends('base_boutique')
@extends('pageloader')
@section('titre')
message
@endsection

@section('contenue')
<!-- 
<?php
/*  un premier message par defaut envoyé  de lq pqrt de kassouwa à tout utilisateur*/
// echo '<p style="background-color:#485B59;color:white;width:150px;border-radius:5px;margin-right:25px;"><i>hello!!</i>vos discussion seront envoyes a votre destinateur  et lui seul.kassouwa assure l`integralite et confidentialite de vos communication avec vos clients.</p>';

// foreach($messages as $message){  parcour des deux type de messages(reçu et envoyé) 
// 	if ($message->id_dest<700000) { /* teste si le message */
// 				echo '<p style="background-color:#485B59;color:white;width:150px;border-radius:5px;margin-right:25px;">'.$message->message.'</p>'; 

// 	}
// 	else{
// 			echo '<p style="background-color:#13649A;color:white;width:150px;border-radius:5px;margin-left:25px;">'.$message->message.'</p>'; 
// 	}

	

	
// }
?> 

<div align="center" ><form action="{{ url('/boutique/message/envoi') }}" method="post">
	{{@csrf_field()}}

	<?php 
	// if (session('client')==0) {
		
	// echo '<div style="display:none;"><input type="number" name="id_dest" value="'.$_GET["id"].'">';
	//       echo '<input type="number" name="id_exp" value="'.session('boutique')->id.'"></div>';
	//   }
	//   else{

	//   	echo '<div style="display:none;"><input type="number" name="id_dest" value="'.$_GET["id"].'">';
	//       echo '<input type="number" name="id_exp" value="'.session('contacts').'"></div>';

	//   }
	?> 
<br><textarea placeholder="message" name="message" type="text"></textarea><input type="submit" name="envoyer" value="envoyer"></form></div> -->









<div >
<?php
use App\Models\Message;
/*  un premier message par defaut envoyé  de lq pqrt de kassouwa à tout utilisateur*/
echo '<br><br><p style="background-color:#C9D2D1;color:black;width:150px;border-radius:5px;margin-right:25px;"><i>hello!!</i>vos discussion seront envoyes a votre destinateur  et lui seul.kassouwa assure l`integralite et confidentialite de vos communication avec vos clients.</p>';

 if(session('client')==0){/*  teste si c'est un client ou un vendeur , 1 si client et 0 si vendeur*/
 	  
      
      foreach($messages as $message){        /* parcour des deux type de messages(reçu et envoyé) */
	
	if ($message->id_dest<700000) {/* teste si le message */
				$messageActuel= Message::find($message->id);
				$messageActuel->lu="true";
				$messageActuel->save();

				echo '<img src="/images/logo-profil.jpg" style="border-radius:100px; width:30px;float:left;"><p style="background-color:#C9D2D1;color:black;width:150px;border-radius:5px;margin-right:25px;">'.$message->message.'</p>'; 
				echo '<h6 style="color:#6D7273;">'.substr($message->created_at,0,16)."</h6>";

	}
	else{
		$now= new DateTime();

		
		echo '<p style="background-color:#13649A;color:white;width:150px;border-radius:5px;margin-left:25px;">'.$message->message.'</p>'; 


			if ($message->lu=="true") {
				echo '<p style="color:#6D7273;margin-left:150px;">lu</p><br>';
			}
			else{
				echo '<p style="color:#6D7273;margin-left:120px;">envoyé</p><br>';
				
			}
	}
	
}
   }    
   
else{
	// $messages=DB::table('messages')->where('id_dest',session('contacts'))->where('id_exp',$_GET['id'])->orWhere('id_exp',session('contacts'))->where('id_dest',$_GET['id'])->orderby('date_heure','asc')->get();

	foreach($messages as $message){
	if ($message->id_dest<700000) {
		// echo $message->created_at;
				echo '<p style="background-color:#13649A;color:white;width:150px;border-radius:5px;margin-left:25px;">'.$message->message.'</p>'; 

			$now=new DateTime();
			
			if ($message->lu=="true") {
				echo '<p style="color:#6D7273;margin-left:150px;">lu</p><br>';
			}
			else{
				echo '<p style="color:#6D7273;margin-left:120px;">envoyé</p><br>';
				
			}

	}
	else{
		// echo $message->created_at;
		echo '<p style="background-color:#C9D2D1;color:black;width:150px;border-radius:5px;margin-right:25px;">'.$message->message.'</p>'; 
		echo '<h6 style="color:#6D7273;">'.substr($message->created_at,0,16)."</h6>";
		
		$messageActuel= Message::find($message->id);
		$messageActuel->lu="true";
		$messageActuel->save();

	}
	
}
       

}

?> 

</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div align="center" ><form style="position: fixed; bottom: 0;" action="{{ url('/boutique/message/envoi') }}" method="post">
	{{@csrf_field()}}

	 <?php 
	//if (session('client')==0) {
		
	// echo '<div style="display:none;"><input type="number" name="id_dest" value="'.$_GET["id"].'">';
	//       echo '<input type="number" name="id_exp" value="'.session('boutique')->id.'"></div>';
	//   }
	//   else{

	//   	echo '<div style="display:none;"><input type="number" name="id_dest" value="'.$_GET["id"].'">';
	//       echo '<input type="number" name="id_exp" value="'.session('contacts').'"></div>';

	//   }
	?>
	<script type="text/javascript">
		function envoi(){
			location.reload();
		}
	</script>
<br><textarea  required="" style="width:250px;border: none;margin-left: 700px;" placeholder="message" name="message" type="text"></textarea><input onclick="envoi()"  type="submit" name="envoyer" value="envoyer"></form></div>
</fieldset>
@endsection
