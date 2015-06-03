<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/FrontOffice/Info.css"/>
        <title></title>
    </head>
    <body>
        <div id="background"></div>
        <div class="subbody">
            <!-- Container -->
            <div class="banniere">
                <img class="logo" src="../img/front/logoafdlr.png" alt="AuFoinDeLaRue"/>
            </div>
            <div>
                <?php 
                     $oAssociation = My_Orm_Association::find(2);
                        echo '<div class="description">'.nl2br($oAssociation->Description).'</div>';
                    $aInformation = My_Orm_Information::findSome(2, 5);
                    foreach ($aInformation as $Info){
                        echo '<div class="billet">';
                            echo '<h3>'. $Info->Titre . '</h3>';
                            echo '<div class="info">'. nl2br($Info->Description) . '</div>';
                            $date = date_create_from_format('Y-m-d',$Info->DatePublication);
                            echo '<div class="date">le '. date_format($date,'d/m/Y').'</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>
