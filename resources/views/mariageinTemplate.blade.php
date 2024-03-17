<html>
    <head>
        <title>
        
        @yield('titre')
        </title>
        <link rel="icon" type="image/jpeg" sizes="16x16" href="storage/images/jNRxeh5H9pdC06YVOTzVuayL4kyfzzXcdubJK5t4.png">
                <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<meta property="og:title" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />-->
<!--<meta property="og:description" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />-->
<!--<meta property="og:url" content="https://hamoprise.com/create?id=126" />-->

<meta property="og:image" content="https://hamoprise.com/storage/images/d2iWRNON6uzUe5qnl43Nwmhs7QkJvX7VhWY6L4eC.png" />

          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    .btn-product{
	width: 100%;
}

#output{
    display:none;
}

blink {
  -webkit-animation: 2s linear infinite condemed_blink_effect; // pour Safari 4.0-8.0
  animation: 2s linear infinite condemed_blink_effect;
}
@-webkit-keyframes condemed_blink_effect { // pour Safari 4.0-8.0
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}
@keyframes condemed_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@-webkit-keyframes scrolling-left1 {
    0% {-webkit-transform: translateX(100%);}
      100% {-webkit-transform: translateX(-100%);}
}
@-webkit-keyframes scrolling-left2 {
    0% {-webkit-transform: translateX(0%);}
      100% {-webkit-transform: translateX(-200%);}
}



/*#idNom {*/
/*    display:none;*/
/*}*/
/*#idNomInput{*/
/*    display:none;*/
/*}*/
/*#suivantBtn{*/
/*    display:none;*/
/*}*/
/*#finishBtn{*/
/*    display:none;*/
/*}*/


.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}


</style>
    </head>
    <body style="background-color:black;">
        
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="span12">
      <div class="head">
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <!--<h1 class="muted">Company Name</h1>-->
                    <h1>MariageIn</h1>
                </div>

                <!--<div class="span4 offset2" style="margin-top:15px;">-->
                <!--    <button class="btn pull-right" type="button">Sign In</button>-->
                <!--</div>-->
            </div>
        </div>

        <!--<div class="navbar">-->
        <!--    <div class="navbar-inner">-->
        <!--        <div class="container">-->
        <!--            <ul class="nav">-->
        <!--                <li>-->
        <!--                    <a href="#">Explore Product</a>-->
        <!--                </li>-->

        <!--                <li>-->
        <!--                    <a href="#">Search</a>-->
        <!--                </li>-->

        <!--                <li>-->
        <!--                    <a href="#">Features</a>-->
        <!--                </li>-->

        <!--                <li>-->
        <!--                    <a href="#">Blog</a>-->
        <!--                </li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
      </div>
    </div>
  </div>
</div>
        @yield('contenu')
    </body>
</html>

