@extends('base')
@extends('pageloader')
@section('title')
Connexion
@endsection

@section('style')
<style >
	input.borderStyle{
		border-top: none;
		border-left: none;
		border-right: none;
		
		border-bottom-color: #FF5757;
			padding-left: 5px;

	}
	fieldset{
	    display:center;
	}
	
</style>
	@endsection
@section('contenue')

<fieldset align="center">
	<form id="myform" action="{{ url('/connexion/connecter')}}" method="post">
		{{@csrf_field()}}
		<h3> Vendeur</h3>
		<label id="tel:" for="nom_V"></label>
		<input type="text" class="borderStyle form-control" name="tel_V" id="tel" placeholder="tel" onclick="label('tel:')"  required="">
		
		<label id="Mot de passe:" for="passwd"></label>
		<input type="password" class="form-control borderStyle" name="mpass" id="passwd" placeholder="Mot de passe" onclick="label('Mot de passe:')" required=
		o; 0"><br>
		<input type="checkbox" class="" onclick="ShowPassword()">Afficher le mot de passe
			<input class="btn btn-success form-control" style="background-color:#FF5757;" type="submit" name="connecter" value="connecter" id="connecter">

		<script >
			
			
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






@endsection