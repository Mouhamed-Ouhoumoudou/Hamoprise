@extends('base')
@section('titre')
Abonnement Terminé
@endsection
    <link rel="stylesheet" href="template1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template1/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="template1/css/templatemo-style.css">
    
 
@section('contenue')
          <div>
              

               <?php
use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use App\Models\Vendeur;
use App\Models\Boutique;
use App\Models\Commande;
use App\Models\Message;
use App\Models\Abonnement;
use App\Models\Hamoprise;
use Dompdf\Dompdf; 
use Illuminate\Database\QueryException;
          
 use PHPMailer\PHPMailer\PHPMailer;
require_once '../vendor/autoload.php';
// use DateTime;
function get_between($input, $start, $end)

{

  $substr = substr($input, strlen($start)+strpos($input, $start), (strlen($input) - strpos($input, $end))*(-1));

  return $substr;

}
// require 'vendor/autoload.php';
require_once '../vendor/autoload.php';
$stripe = new \Stripe\StripeClient('sk_key');

try {
  $session = $stripe->checkout->sessions->retrieve(get_between($_GET['session_id'], "123", "0123"));

  

  $id_abonnement=intval(get_between($_GET['session_id'], "\"debut\"", "a123"));
  $customer =$stripe->customers->retrieve($session->customer);
//   echo "<h1>Merci pour votre confiance, $customer->name!</h1>";
//   http_response_code(200);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}

        $abonnment=Abonnement::find($id_abonnement);
        if($abonnment->duree_Non_Confirmee!=0){
            
        if($abonnment->mode=="gratuit"){
        $dateToday=new DateTime();
        $jour_dateToday= $dateToday->format('d');
        $mois_dateToday=$dateToday->format('m');
        $annee_dateToday=$dateToday->format('y');
        $mois_sum=$mois_dateToday+$abonnment->duree_Non_Confirmee;
        if($mois_sum<=12){
            $month_date_exp=$mois_sum;
            $year_date_exp=$annee_dateToday;
        }
        else if($mois_sum>12 && $mois_sum<=24){
            
            $month_date_exp=$mois_sum-12;
            $year_date_exp=$annee_dateToday+1;            
        }
            
        $montant=$abonnment->duree_Non_Confirmee*12.5;
        $duree=$abonnment->duree_Non_Confirmee." mois";
 
                $abonnment->montant=$montant;
                $abonnment->duree=$duree;
                $abonnment->day_date_exp=$jour_dateToday;
                $abonnment->month_date_exp=$month_date_exp;
                $abonnment->year_date_exp=$year_date_exp;
                $abonnment->mode="paye";
                // $abonnment->id_B
                $abonnment->duree_Non_Confirmee=0;
                $abonnment->text1="Visualisez l'état de votre Forfait Pro";
                $abonnment->text2="Il est possible de prolonger la date d'expiration de votre forfait Pro. cela donnera la durée Actuele + la durée du nouveau Forfait";
                $abonnment->save();
                

        }
        else if($abonnment->mode=="essai" || $abonnment->mode=="paye")
        {
                   
        $jour_dateToday= $abonnment->day_date_exp;
        $mois_dateToday=$abonnment->month_date_exp;
        $annee_dateToday=$abonnment->year_date_exp;
        $mois_sum=$mois_dateToday+$abonnment->duree_Non_Confirmee;
        if($mois_sum<=12){
            $month_date_exp=$mois_sum;
            $year_date_exp=$annee_dateToday;
        }
        else if($mois_sum>12 && $mois_sum<=24){
            
            $month_date_exp=$mois_sum-12;
            $year_date_exp=$annee_dateToday+1;            
        }
            
        $montant=$abonnment->duree_Non_Confirmee*12.5;
        $duree=$abonnment->duree_Non_Confirmee." mois";
 
                $abonnment->montant=$montant;
                $abonnment->duree=$duree;
                $abonnment->day_date_exp=$jour_dateToday;
                $abonnment->month_date_exp=$month_date_exp;
                $abonnment->year_date_exp=$year_date_exp;
                $abonnment->mode="paye";
                // $abonnment->id_B
                $abonnment->duree_Non_Confirmee=0;
                $abonnment->text1="Visualisez l'état de votre Forfait Pro";
                $abonnment->text2="Il est possible de prolonger la date d'expiration de votre forfait Pro. cela donnera la durée Actuele + la durée du nouveau Forfait";
                $abonnment->save();

        } 
        $Frais_Stripe=(0.015*$montant)+0.25;
          $hamoprise= Hamoprise::find(1);
           $hamoprise->chiffres=$hamoprise->chiffres+($montant-$Frais_Stripe);
            $hamoprise->save();




 require_once '../vendor/autoload.php';
// Reference the Dompdf namespace 
$dateToday=new DateTime();
$today= $dateToday->format('Y-m-d');
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$html='

<div style="width:100%;
  display: flex;
  justify-content: center;">
<h3> Hamoprise</h3>

<h1 style="color:#3B71CA;font-size:45px;margin-left:300px;"> REÇU d\'ABONNEMENT</h1>





<style>
    table {
        font-family: arial;
        width:950px;
        border-collapse: collapse;
    }
    td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: gray;
    }
</style>

<table>
    <tr>
        <th>Forfait</th>
        <th>Prix/mois</th>
        <th>Montant</th>
        <th>Date d\'expiration</th>
    </tr>
    <tr>
        <td>'.$duree.'</td>
        <td>12,50 €</td>
        <td>'.number_format($montant, 2,',', '').'€</td>
        <td>'.$jour_dateToday.'/'.$month_date_exp.'/20'.$year_date_exp.'</td>
    </tr>


</table>


<br>


<div style="width: 60%; display: table;">
    <div style="display: table-row">
        <div style="width: 550px; display: table-cell;"> <h1>Information de l\'abonnée</h1>
  
<h2> '.$customer->name.'</h2>
<h2>'.$customer->email.'</h2>
<h2>'.$customer->phone.'</h2> </div>
        <div style="width: 300px;display: table-cell;"> <h3>Méthode de Paiement:</h3>
<h4>Par carte de credit</h4>
<h4>via Hamoprise</h4>
 </div>
    </div>
</div>



<div style="width: 60%; display: table;">
    <div style="display: table-row">
        <div style="width: 550px; display: table-cell;">
        <h2>Sous-total:<span style="margin-left:15px;">'.number_format($montant, 2,',', '').'€ </span></h2>
<h2>Frais de nom domaine: <span style="margin-left:15px;"> '.number_format(0, 2,',', '').'€</span></h2>
<h2>Taxes: <span style="margin-left:15px;"> '.number_format(0, 2,',', '').'€ </span></h2> </div>
        <div style="width: 300px;display: table-cell;">
        <h1>Total Payé: <span style="margin-left:15px;"> '.number_format($montant, 2,',', '').'€</span></h1>
 </div>
    </div>
</div>

<h2>Date de l\'Abonnement:<span style="margin-left:15px;">'.$today.'</span></h2>





<p>
Merci de votre abonnement ,nous vous sommes reconnaissants de votre confiance.

Pour toute question ou préoccupation, veuillez nous contacter à marchands@hamoprise.com ou +33 7 58 32 66 47.
</p>
<br>
<p>Hamoprise</p>
<p>marchands@hamoprise.com</p>
<p>+33 7 58 32 66 47.</p>

<p> emis par <span style="color:#3B71CA;" >www.Hamoprise.com</span></p>
</div>';


// ';
// Load HTML content 
$dompdf->loadHtml($html);
 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
// $dompdf->stream('dompdfTEST.pdf');
$pdf_string =   $dompdf->output();
$nomFile= 'Recu_Abonnement_'.$abonnment->id.'.pdf';
file_put_contents($nomFile, $pdf_string );       


$mail = new PHPMailer;

// $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.hamoprise.com//';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@hamoprise.com';                 // SMTP username
$mail->Password = 'passeword';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port=465;
$emailClient=$customer->email;
$mail->From = 'contact@hamoprise.com';
$mail->FromName = 'Hamoprise';
$mail->addAddress($emailClient, $customer->name);     // Add a recipient


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation d\'abonnement pour '.$duree.'';
// $mail->Body    = 'votre abonnement de'.$duree.' à '.$montant.' euro a ete effectue avec sucess vous pouvez trouver depuis votre boutique la la prochaine date d\'expiration. Merci pour votre confiance Hamoprise </b>';
               
$mail->Body = "
<!DOCTYPE html>
            <html lang='fr'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Abonnement sur Hamoprise</title>
                <style>
                    /* Styles pour l'en-tête */
                    .header {
                        background-color: #FF5757;
                        color: white;
                        padding: 20px;
                        text-align: center;
                    }
                    .logo {
                        max-width: 200px; /* Ajustez la taille de votre logo */
                    }
                    /* Styles pour le contenu */
                    .content {
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    /* Styles pour les boutons */
                                        .button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #FF5757;
                        color: white;
                        text-decoration: none;
                        border-radius: 5px;
                    }

                    @media screen and (max-width: 600px) {
                        .button {
                        display: block;
                        margin: 10px 0; /* Ajout de marge entre les boutons pour les appareils mobiles */
                        padding: 10px 20px;
                        background-color: #FF5757;
                        color: white;
                        text-decoration: none;
                        border-radius: 5px;
                        text-align: center;;
                    }
                        .button {
                            display: block;
                            width: 70%;
                            margin-bottom: 10px;
                        }
                    }
                    /* Styles pour le pied de page */
                    .footer {
                        text-align: center;
                        padding: 10px;
                        background-color: #28282B;
                        color: white;
                    }
                </style>
            </head>
            <body>
                <!-- En-tête -->
                <div class='header'>
                    <img class='logo' src='https://hamoprise.com/images/logo-kassouwa-new2.png' alt='Logo de votre marque'> <!-- Remplacez par le chemin vers votre logo -->
                    <h1>Réçu d'abonnemnt Hamoprise</h1>
                </div>

                <!-- Contenu du courriel -->
                <div class='content'>
                    <p>
                    Merci, $customer->name, pour votre abonnement à notre service pour une durée de $duree .</p>
                    <p>Vous avez choisi le plan d'abonnement suivant : $duree pour $montant €</p>
                    <p> Ci-joint, le réçu contenant toutes les informations pour votre abonnement.
                    <p>Nous sommes ravis de vous avoir comme partenaire. Profitez de tous les avantages de votre abonnement.</p>
                        <a class='button' style=\"color:#ffffff\" href='http://hamoprise.com/BoutiqueAdmin'>Gerer votre boutique</a>
                    </p>
                </div>

                <!-- Pied de page avec plusieurs références -->
                <div class='footer'>
                    <p class='references'>Retrouvez-nous sur : <a href='https://www.facebook.com/profile.php?id=100060345133351'>Facebook</a> | <a href='https://www.youtube.com/channel/UCICRR13kZla4KO3kBUBE_3g'>Youtube</a> | <a href='https://www.instagram.com/hamoprise/'>Instagram</a></p>
                    <p class='references'>Visitez notre site web : <a href='http://www.hamoprise.com'>www.hamoprise.com</a></p>
                </div>
            </body>
            </html>

        ";
$mail->addAttachment($nomFile);
$mail->AltBody = 'ca c\'est le corps du mail';

// $mail->addAttachment("storage/images/".$nom);


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  
    echo 'True';
}



$mail = new PHPMailer;

// $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.hamoprise.com//';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@hamoprise.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port=465;

$mail->From = 'contact@hamoprise.com';
$mail->FromName = 'Hamoprise';
$mail->addAddress("mouhamed.ouhoumoudou7@gmail.com", 'Mouhamed Ouhoumoudou');     // Add a recipient


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Util ! Abonnement de '.$duree.'.';
$mail->Body    = 'Une boutique a ete souscrite pour '.$duree.' à '.$montant.' euro.</b>';
$mail->AltBody = 'ca c\'est le corps du mail';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

    // echo '<div style="background-color:green;">';
    //       echo '<h3>
    //       Abonnement effectué dejà
    //       </h3>';
    //      echo '<h1>';
    //      echo  $duree;
    //       echo "</h1>";
    //       echo '</div>';

}
else{

          echo "<h2 class=\"text text-success\">
          Abonnement effectué avec succès
          </h2>";

    
  
}
    
 
  echo "<div style=\"height:50%;\" <h1 class=\"text text-success\">Merci pour votre confiance, $customer->name!</h1>";
    echo '<h2 class="text text-success">Le mail de confirmation vous a été envoyé contenant le Réçu et toutes informations concernant votre Abonnement</h2>';
    
    echo '<button> <a href="https://mail.google.com/mail/u/0/#inbox">Consulter le mail</a></button>  <button><a href="/BoutiqueAdmin">Retour à la boutique</a></button>';      
          
          ?>
          
          
          </div>
        
@endsection       



