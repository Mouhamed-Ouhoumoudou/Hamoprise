
<?php $__env->startSection('titre'); ?>
message
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenue'); ?>

<?php
// if ($_GET['id']<700000) {

// 	}
// 	else{
// echo ' <a href="/boutique"><figure ><img style="width:120px; height:20px;position:fixed;" src="/images/triangle.png"><br><img style="height:70px; width: 100px; margin-left:7px; position:fixed;" src="'.session('boutique')->photo_profil.'" alt="logo de profil"></figure></a><br>';
// }

?>
<fieldset class="boite-message">

	<!-- <div style="position: fixed;text-align: center;"> -->
<?php
use App\Models\Boutique;


	if ($_GET['id']<700000) {
		session()->put('id_B',$_GET['id']);

		echo '<h1><a align="center" style="position: fixed; text-decoration:none; font-size:23px;background-color:#A5A7A8;border-top-left-radius:10px;border-bottom-left-radius:10px;border-top-right-radius:4px;border-bottom-right-radius:4px;" href="/boutique?id='.$_GET['id'].'." ><img src="/images/logo-profil-boutique.png" style="border-radius:100px; width:30px;float:left;">'.Boutique::find($_GET['id'])->nom_B.'</a></h1><br>';
	 	if (Boutique::find($_GET['id'])->enligne=="true") {
	 		echo '<p style="position:fixed;">en ligne<img style="border-radius:100px; width:10px;float:right;" src="/images/enligne.jpg">  </p> ';
	 	}
	 	else{
	 		echo '<p style="position:fixed;">vu le '.substr(Boutique::find($_GET['id'])->updated_at,0,16);
	 		
	 	}
	
	}
	else{


		
	echo '<a align="center" style="position: fixed; text-decoration:none; font-size:23px;background-color:#A5A7A8;border-top-left-radius:10px;border-bottom-left-radius:10px;border-top-right-radius:4px;border-bottom-right-radius:4px;" href="" ><img src="/images/logo-profil.jpg" style="border-radius:100px; width:30px;float:left;">'.$_GET["id"].' </a>';
	}
	








?>

<div align="center">
<?php
use App\Models\Message;
/*  un premier message par defaut envoyé  de lq pqrt de kassouwa à tout utilisateur*/
echo '<br><br><p style="background-color:#C9D2D1;color:black;width:150px;border-radius:5px;margin-right:25px;"><i>hello!!</i>vos discussion seront envoyes a votre destinateur  et lui seul.kassouwa assure l`integralite et confidentialite de vos communication avec vos clients.</p>';

 if(session('client')==0){/*  teste si c'est un client ou un vendeur , 1 si client et 0 si vendeur*/
 	  
      $messages=DB::table('messages')->where('id_dest',session('boutique')->id)->where('id_exp',$_GET['id'])->orWhere('id_exp',session('boutique')->id)->where('id_dest',$_GET['id'])->orderby('date_heure','asc')->get();
      foreach($messages as $message){        /* parcour des deux type de messages(reçu et envoyé) */
	
	if ($message->id_dest<700000) {/* teste si le message */
				$messageActuel= Message::find($message->id);
				$messageActuel->lu="true";
				$messageActuel->save();

				echo '<p style="background-color:#C9D2D1;color:black;width:150px;border-radius:5px;margin-right:25px;"><img src="/images/logo-profil.jpg" style="border-radius:100px; width:30px;float:left;">'.$message->message.'</p>'; 
				echo '<h6 style="color:#6D7273;">'.substr($message->created_at,0,16)."</h6>";

	}
	else{
		$now= new DateTime();

		
		echo '<p style="background-color:#13649A;color:white;width:150px;border-radius:5px;margin-left:25px;">'.$message->message.'<img src="/images/logo-profil-boutique.png" style="border-radius:100px; width:30px;float:right;"></p>'; 


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
	$messages=DB::table('messages')->where('id_dest',session('contacts'))->where('id_exp',$_GET['id'])->orWhere('id_exp',session('contacts'))->where('id_dest',$_GET['id'])->orderby('date_heure','asc')->get();

	foreach($messages as $message){
	if ($message->id_dest<700000) {
		// echo $message->created_at;
				echo '<p style="background-color:#13649A;color:white;width:150px;border-radius:5px;margin-left:25px;">'.$message->message.'<img src="/images/logo-profil.jpg" style="border-radius:100px; width:30px;float:right;"></p>'; 

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
		echo '<p style="background-color:#C9D2D1;color:black;width:150px;border-radius:5px;margin-right:25px;">'.$message->message.'<img src="/images/logo-profil-boutique.png" style="border-radius:100px; width:30px;float:left;"></p>'; 
		echo '<h6 style="color:#6D7273;">'.substr($message->created_at,0,16)."</h6>";
		
		$messageActuel= Message::find($message->id);
		$messageActuel->lu="true";
		$messageActuel->save();

	}
	
}
       

}

?> 

</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div align="center" ><form style="position: fixed; bottom: 0;" action="<?php echo e(url('/boutique/message/envoi')); ?>" method="post">
	<?php echo e(@csrf_field()); ?>


	<?php if (session('client')==0) {
		
	echo '<div style="display:none;"><input type="number" name="id_dest" value="'.$_GET["id"].'">';
	      echo '<input type="number" name="id_exp" value="'.session('boutique')->id.'"></div>';
	  }
	  else{

	  	echo '<div style="display:none;"><input type="number" name="id_dest" value="'.$_GET["id"].'">';
	      echo '<input type="number" name="id_exp" value="'.session('contacts').'"></div>';

	  }
	?>
	<script type="text/javascript">
		function envoi(){
			location.reload();
		}
	</script>
<br><textarea class="champ-message" required=""  placeholder="message" name="message" type="text"></textarea><input onclick="envoi()"  type="submit" name="envoyer" value="envoyer"></form></div>
</fieldset>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/message.blade.php ENDPATH**/ ?>