@extends('base')
@extends('pageloader')
@section('title')
inscription
@endsection

@section('style')
<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 
<style >
body {
  font-family: Helvetica, sans-serif;
}

.container {
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
  padding: 10px;
}

#phone, .btn {
  padding-top: 6px;
  padding-bottom: 6px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/*.btn {*/
/*  color: #ffffff;*/
/*  background-color: #428BCA;*/
/*  border-color: #357EBD;*/
/*  font-size: 14px;*/
/*  outline: none;*/
/*  cursor: pointer;*/
/*  padding-left: 12px;*/
/*  padding-right: 12px;*/
/*}*/

/*.btn:focus, .btn:hover {*/
/*  background-color: #3276B1;*/
/*  border-color: #285E8E;*/
/*}*/

.btn:active {
  box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
}

.alert {
  padding: 15px;
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 4px;
}

.alert-info {
  border-color: #bce8f1;
  color: #31708f;
  background-color: #d9edf7;
}

.alert-error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
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
	select.pays{
	    	border-top: none;
		border-left: none;
		border-right: none;
		
		border-bottom-color: #FF5757;
			padding-left: 5px;
	}
		select.pays:active{
		border-color: white;
		border-color: white;
		border-bottom-color: #FF5757;

	}
	
</style>
@endsection
@section('contenue')
<i class="fas fa-chart-pie" style="color:blue"></i>
<i class="fas fa-chart-line"></i>


<!--<div style="font-size: 2rem;">-->
<!--  <div><i class="fa-solid fa-skating fa-fw" style="background:DodgerBlue"></i> Skating</div>-->
<!--  <div><i class="fa-solid fa-skiing fa-fw" style="background:SkyBlue"></i> Skiing</div>-->
<!--  <div><i class="fa-solid fa-skiing-nordic fa-fw" style="background:DodgerBlue"></i> Nordic Skiing</div>-->
<!--  <div><i class="fa-solid fa-snowboarding fa-fw" style="background:SkyBlue"></i> Snowboarding</div>-->
<!--  <div><i class="fa-solid fa-snowplow fa-fw" style="background:DodgerBlue"></i> Snowplow</div>-->
<!--</div>-->



<!--<form method="post">-->
<!--  Username-->
<!--  <input type="text" name="username" autofocus="" autocapitalize="none" autocomplete="username" required="" id="id_username">-->
<!--  Password-->
<!--  <input type="password" name="password" autocomplete="current-password" required="" id="id_password">-->
<!--  <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>-->
<!--  <button type="submit" class="btn btn-primary">Login</button>-->
<!--</form>-->


<? function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
try{
    $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
session()->put('pays',"$xml->geoplugin_countryName");
}
catch(Exception $e){
    echo "pays non detecté";
}

?>
<script>
    const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>



<!--<div class="container">-->
<!-- <form id="login" onsubmit="process(event)">-->
<!--   <p>Numbero de telephone:</p>-->
<!--   <input id="phone" type="tel" name="phone" />-->
<!--   <div class="alert alert-info" style="display: none;"></div>-->
   <!--<input type="submit" class="btn" value="Verify" />-->
<!-- </form>-->
<!--</div>-->


<script>
// 1a3fd18b6712c5
function getIp(callback) {
 fetch('https://ipinfo.io/json?token=1a3fd18b6712c5', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
       initialCountry: "auto",
 geoIpLookup: getIp,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   
   const info = document.querySelector(".alert-info");

function process(event) {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "";
 info.innerHTML = `Le Numero de Telephone au format E.164: <strong>${phoneNumber}</strong>`;
}
 </script>
 
 
<fieldset align=center>
	<form action="{{ url('/inscription/ajouter') }}" method="post">
		{{ @csrf_field() }}
		<h3>Boutique</h3>
		<label id="nom:" for="nom_B"></label>
		<input type="text" class="borderStyle form-control" name="nom_B" id="nom_B" aria-describedby="nom_B" maxlength="30"   placeholder="Nom" onclick="label('nom:')" required>
		<small id="nom_B" class="form-text text-muted">Donner un nom à votre boutique.</small><br><br>
		<label id="Pays:" for="adresse_B"></label>
		<!--<input type="text" name="adresse_B" placeholder="Adresse" maxlength="50" onclick="label('Pays:')" required><br><br>-->
		
		<select class="borderStyle form-control" type="text" name="adresse_B" placeholder="Adresse" maxlength="50" onclick="label('Pays:')" required>
		    
		
                  <?try{
                     echo '<option selected value="'.session('pays').'">'.session('pays').'</option>'; 
                  } 
                  catch(Exception $e){
                      echo '<option selected value="pays non choisi">choisir pays</option>';
                  }
                  ?>
                  

                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curacao">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea South">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands (Holland, Europe)">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                </select>
		
	
		<h3> Et Vous</h3>
		<div id="Vendeur">
		<label id="Nom:" for="nom_V"></label>
		<input type="text" name="nom_V" class="borderStyle form-control" style="border-top: none;
		border-left: none;
		border-right: none;
		
		border-bottom-color: #FF5757;
			padding-left: 5px;" id="nom_V" maxlength="30" placeholder="Nom" onclick="label('Nom:')" required>

		<label id="Prenom:" for="prenom_V"></label>
		<input type="text" class="borderStyle form-control" name="prenom_V" id="prenom_V" maxlength="30" placeholder="Prenom" onclick="label('Prenom:')" required>
		<label id="Email:" for="email_V"></label>
<input type="text" class="borderStyle form-control" name="email_V" id="email_V" maxlength="255"  placeholder="Email"onclick="label('Email:')" required><br>
		<label id="Mot de passe:" for="id_password"></label>
  
		<input type="password" class="borderStyle form-control" name="mpass" id="id_password" maxlength="8" minlength="4" autocomplete="current-password" placeholder="Mot de passe" onclick="label('Mot de passe:')" required>
		<label id="Adresse:" for="adresse_V"></label>
		<input type="text" class="borderStyle form-control" name="adresse_V" id="adresse_V" maxlength="50" placeholder="Adresse" onclick="label('Adresse:')" required>

		<label id="Tel:"for="tel_V"></label>
		<input type="text" class="borderStyle form-control" name="tel_V" id="tel_V" maxlength="255" minlength="8" placeholder="Tel"onclick="label('Tel:')" required><br>

		
<input required="" type="checkbox">j'accepte <a href="/politique-d-utilisation">les politiques d'utilisation</a>
		<input class="btn btn-success form-control" style="background-color:#FF5757;"  type="submit" name="creer" value="Terminer" id="creer">

		<script >
			
			function label(id){
								document.getElementById(id).innerHTML=id;
			}
		</script>
		



</fieldset>

@endsection