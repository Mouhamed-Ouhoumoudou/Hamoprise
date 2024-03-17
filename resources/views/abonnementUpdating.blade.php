<html>
    <head>
        <title>mise a jour d'abonnement</title>
    </head>
    
    <body>
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

        // try{
            
            $abonnments=DB::table('abonnements')->get();
             foreach ($abonnments as $abn){
         $abonnment=Abonnement::find($abn->id);
  
        $dateToday=new DateTime();
        $jour_dateToday= $dateToday->format('d');
        $mois_dateToday=$dateToday->format('m');
        $annee_dateToday=$dateToday->format('y');
        if($jour_dateToday==$abonnment->day_date_exp && $mois_dateToday==$abonnment->month_date_exp && $annee_dateToday==$abonnment->year_date_exp){
            $abonnment->mode="gratuit";
            $abonnment->text1="Forfait Pro expiré, vous êtes en mode gratuit maintenant (limité)";
            $abonnment->text2="Pour beneficier plus des Fonctionalités d'Hamoprise afin de bien gerer votre Boutique Prolonger le Forfait Pro.";
            $abonnment->save();

        }
        else if($annee_dateToday>$abonnment->year_date_exp){
            $abonnment->mode="gratuit";
            $abonnment->text1="Forfait Pro expiré, vous êtes en mode gratuit maintenant (limité)";
            $abonnment->text2="Pour beneficier plus des Fonctionalités d'Hamoprise afin de bien gerer votre Boutique Prolonger le Forfait Pro.";
            $abonnment->save();         
        }
        else if($annee_dateToday==$abonnment->year_date_exp){
            if($mois_dateToday>$abonnment->month_date_exp){
            $abonnment->mode="gratuit";
            $abonnment->text1="Forfait Pro expiré, vous êtes en mode gratuit maintenant (limité)";
            $abonnment->text2="Pour beneficier plus des Fonctionalités d'Hamoprise afin de bien gerer votre Boutique Prolonger le Forfait Pro.";
            $abonnment->save();                 
            }
            else if($mois_dateToday==$abonnment->month_date_exp){
                if($jour_dateToday>$abonnment->day_date_exp){
                 $abonnment->mode="gratuit";
            $abonnment->text1="Forfait Pro expiré, vous êtes en mode gratuit maintenant (limité)";
            $abonnment->text2="Pour beneficier plus des Fonctionalités d'Hamoprise afin de bien gerer votre Boutique Prolonger le Forfait Pro.";
                 $abonnment->save();                     
                }
            }
        }
             }
            
            echo "executé";


        ?>
    </body>
    
</html>