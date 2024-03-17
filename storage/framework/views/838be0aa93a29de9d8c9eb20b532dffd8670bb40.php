
<?php $__env->startSection('titre'); ?>
message
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenue'); ?>
<?php
use App\Models\Boutique;

if ($_GET['id']<700000) {

	echo '<a align="center"  href="" ><img src="">'.Boutique::find($_GET['id'])->nom_B.' </a>';
	
}
else{
echo '<a align="center"  href="" ><img src="">'.$_GET["id"].' </a>';
}
?>
<?php
echo "<p><i>hello!!</i>vos discussion seront envoyes a votre destinateur  et lui seul.kassouwa assure l'integralite et confidentialite de vos communication avec vos clients.</p>";
function maxN($val1,$val2){
	if ($val1>$val2) {
		return $val1;
	}
	else{
		return $val2;
	}
}

foreach($messages as $message){
	if ($message->id_dest<700000) {
				echo '<p style="background-color:#485B59;color:white">'.$message->message.'"</p>"'; 

	}
	else{
		echo '<p style="background-color:#13649A;color:white">'.$message->message.'"</p>"'; 
	}

	

	
}
?> 

<div align="center" ><form action="<?php echo e(url('/boutique/message/envoi')); ?>" method="post">
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
<br><textarea placeholder="message" name="message" type="text"></textarea><input type="submit" name="envoyer" value="envoyer"></form></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base_boutique', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\Documents\Laravel\kassouwa\resources\views//message.blade.php ENDPATH**/ ?>