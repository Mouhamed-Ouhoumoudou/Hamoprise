@extends('base')
@extends('pageloader')
@section('titre')
Compte existe déja
@endsection

@section('style')
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo-kassouwa-new3.png">
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

<style>
    h6 {
    text-align: center;
}
h2 {
    margin: 0;
}
#multi-step-form-container {
    /*margin-top: 5rem;*/
   
}
.text-center {
    text-align: center;
}
.mx-auto {
    margin-left: auto;
    margin-right: auto;
}
.pl-0 {
    padding-left: 0;
}
.button {
    padding: 0.7rem 1.5rem;
    border: 1px solid #ff5757;
    background-color: #ff5757;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    float:left;
}
.submit-btn {
    /*border: 1px solid #0e9594;*/
    /*background-color: #0e9594;*/
     border: 1px solid #ff5757;
    background-color: #ff5757;
    margin-left:8px;
}
.mt-3 {
    margin-top: 2rem;
    
}
.d-none {
    display: none;
}
.form-step {
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    padding: 3rem;
}
.font-normal {
    font-weight: normal;
}
ul.form-stepper {
    counter-reset: section;
    margin-bottom: 1rem;
}
ul.form-stepper .form-stepper-circle {
    position: relative;
}
ul.form-stepper .form-stepper-circle span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
}
.form-stepper-horizontal {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}
ul.form-stepper > li:not(:last-of-type) {
    margin-bottom: 0.625rem;
    -webkit-transition: margin-bottom 0.4s;
    -o-transition: margin-bottom 0.4s;
    transition: margin-bottom 0.4s;
}
.form-stepper-horizontal > li:not(:last-of-type) {
    margin-bottom: 0 !important;
}
.form-stepper-horizontal li {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: start;
    -webkit-transition: 0.5s;
    transition: 0.5s;
}
.form-stepper-horizontal li:not(:last-child):after {
    position: relative;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    height: 1px;
    content: "";
    top: 32%;
}
.form-stepper-horizontal li:after {
    background-color: #dee2e6;
}
.form-stepper-horizontal li.form-stepper-completed:after {
    background-color: #ff5757;
}
.form-stepper-horizontal li:last-child {
    flex: unset;
}
ul.form-stepper li a .form-stepper-circle {
    display: inline-block;
    width: 40px;
    height: 40px;
    margin-right: 0;
    line-height: 1.7rem;
    text-align: center;
    background: rgba(0, 0, 0, 0.38);
    border-radius: 50%;
}
.form-stepper .form-stepper-active .form-stepper-circle {
    background-color: #ff5757 !important;
    color: #fff;
}
.form-stepper .form-stepper-active .label {
    color: #ff5757 !important;
}
.form-stepper .form-stepper-active .form-stepper-circle:hover {
    background-color: #ff5757 !important;
    color: #fff !important;
}
.form-stepper .form-stepper-unfinished .form-stepper-circle {
    background-color: #f8f7ff;
}
.form-stepper .form-stepper-completed .form-stepper-circle {
    background-color: #ff5757 !important;
    color: #fff;
}
.form-stepper .form-stepper-completed .label {
    color: #ff5757 !important;
}
.form-stepper .form-stepper-completed .form-stepper-circle:hover {
    background-color: #ff5757 !important;
    color: #fff !important;
}
.form-stepper .form-stepper-active span.text-muted {
    color: #fff !important;
}
.form-stepper .form-stepper-completed span.text-muted {
    color: #fff !important;
}
.form-stepper .label {
    font-size: 1rem;
    margin-top: 0.5rem;
}
.form-stepper a {
    cursor: default;
}






/* The Modal (background) */
.modal {
  display: grid; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
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
  width: 100%;
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
       .btn-success:hover{

       font-weight: 800;
       border: none;
       background-color: #081D45;
       }
       
       .Contry-flag{
           width:20px;height:20px;
       }
       @media (max-width: 550px) {
     
       .button {
    padding: 0.4rem 0.7rem;
    border: 1px solid #ff5757;
    background-color: #ff5757;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
     width:80px;
    
    }

         }
     }

      
</style>











<body>
    
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S0JFXYGV8W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S0JFXYGV8W');
</script>



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
    for($i=0;$i<10;$i++){
    $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
     $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
session()->put('pays',"$xml->geoplugin_countryName");
}

}
catch(Exception $e){
    echo "pays non detecté";
}

?>

<div style="height:300px;"></div>
<script>
    function startLoader() {
  document.getElementById("loader2").style.display = "block";
}
</script>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  

    

    <div class="loader2"  id="loader2"></div>
   
    <div>
   <h& class="text text-primary">Le compte existe déja</h&>
    <div id="multi-step-form-container">
        

        
         
        <a class="text fs-6" href="/connexion">Connectez-vous</a>
    </div>
</div>



  </div>

</div>

<script>
    /**
 * Define a function to navigate betweens form steps.
 * It accepts one parameter. That is - step number.
 */
const navigateToFormStep = (stepNumber) => {
    /**
     * Hide all form steps.
     */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });
    /**
     * Mark all form steps as unfinished.
     */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
     * Show the current form step (as passed to the function).
     */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
     * Mark the current form step as active.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
     * Loop through each form step circles.
     * This loop will continue up to the current step number.
     * Example: If the current step is 3,
     * then the loop will perform operations for step 1 and 2.
     */
    for (let index = 0; index < stepNumber; index++) {
        /**
         * Select the form step circle (progress bar).
         */
        const formStepCircle = document.querySelector('li[step="' + index + '"]');
        /**
         * Check if the element exist. If yes, then proceed.
         */
        if (formStepCircle) {
            /**
             * Mark the form step as completed.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};
/**
 * Select all form navigation buttons, and loop through them.
 */
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
     * Add a click event listener to the button.
     */
    formNavigationBtn.addEventListener("click", () => {
        /**
         * Get the value of the step.
         */
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        /**
         * Call the function to navigate to the target form step.
         */
        navigateToFormStep(stepNumber);
    });
});

</script>

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
 
 


		<!--<h3>Boutique</h3>-->

		
	
		<!--<h3> Et Vous</h3>-->
		<!--<div id="Vendeur">-->



@endsection