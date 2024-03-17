
<?php $__env->startSection('title'); ?>
inscription
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style >
	input{
		border-top: none;
		border-left: none;
		border-right: none;
		
		border-bottom-color: #FF9888;
			padding-left: 5px;

	}
	input:active{
		border-color: white;
		border-color: white;
		border-bottom-color: #FF9888;

	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenue'); ?>

<fieldset align=center>
	<form action="<?php echo e(url('/inscription/ajouter')); ?>" method="post">
		<?php echo e(@csrf_field()); ?>

		<h3>Boutique</h3>
		<label id="nom:" for="nom_B"></label>
		<input type="text" name="nom_B" id="nom_B" maxlength="30"   placeholder="Nom" onclick="label('nom:')" required><br><br>
		<label id="adresse:" for="adresse_B"></label>
		<input type="text" name="adresse_B" placeholder="Adresse" maxlength="50" onclick="label('adresse:')" required><br><br>

		<h3> Vendeur</h3>
		<div id="Vendeur">
		<label id="Nom:" for="nom_V"></label>
		<input type="text" name="nom_V" id="nom_V" maxlength="30" placeholder="Nom" onclick="label('Nom:')" required><br><br>

		<label id="Prenom:" for="prenom_V"></label>
		<input type="text" name="prenom_V" id="prenom_V" maxlength="30" placeholder="Prenom" onclick="label('Prenom:')" required><br><br>

		<label id="Mot de passe:" for="passwd"></label>
		<input type="password" name="mpass" id="passwd" maxlength="8" minlength="4" placeholder="Mot de passe" onclick="label('Mot de passe:')" required><br><br>

		<label id="Adresse:" for="adresse_V"></label>
		<input type="text" name="adresse_V" id="adresse_V" maxlength="50" placeholder="Adresse" onclick="label('Adresse:')" required><br><br>

		<label id="Tel:"for="tel_V"></label>
		<input type="text" name="tel_V" id="tel_V" maxlength="17" minlength="8" placeholder="Tel"onclick="label('Tel:')" required>

		
		<input class="btn-sub" type="submit" name="creer" value="Terminer" id="creer" style="background-color: #00FF00; border-bottom-color: #00FF00;border-radius: 5px; width: 200px; font-size: 15px;">

		<script >
			
			function label(id){
								document.getElementById(id).innerHTML=id;
			}
		</script>

</fieldset>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/inscription.blade.php ENDPATH**/ ?>