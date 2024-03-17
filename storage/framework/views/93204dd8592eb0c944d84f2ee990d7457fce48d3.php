
<?php $__env->startSection('title'); ?>
Connexion
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
</style>
	<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenue'); ?>

<fieldset >
	<form action="<?php echo e(url('/connexion/connecter')); ?>" method="post">
		<?php echo e(@csrf_field()); ?>

		<h3> Vendeur</h3>
		<label id="tel:" for="nom_V"></label>
		<input type="text" name="tel_V" id="tel" placeholder="tel" onclick="label('tel:')" required=""><br><br>
		
		<label id="Mot de passe:" for="passwd"></label>
		<input type="password" name="mpass" id="passwd" placeholder="Mot de passe" onclick="label('Mot de passe:')" required=
		o; 0"><br><br>
			<input class="btn-sub" type="submit" name="connecter" value="connecter" id="connecter">

		<script >
			
			function label(id){
								document.getElementById(id).innerHTML=id;
			}
		</script>
	</form>

</fieldset>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mouha\OneDrive\Documents\Laravel\Laravel\kassouwa\resources\views/connexion.blade.php ENDPATH**/ ?>