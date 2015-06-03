<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/FrontOffice/InfoQh.css"/>
        <title></title>
    </head>
    <body>
	    <img class="head" src="../img/front/bdtop.png" alt="Quest'Handi"/>
        <div class="subbody">
        <!-- Bannière -->
            <div class="banniere">
                <img class="logo" src="../img/front/logoqh.png" alt="Quest'Handi"/>
            </div>

            <!-- Container -->
            <div>
                <?php 
                    $oAssociation = My_Orm_Association::find(1);
                        echo '<div class="description">'.$oAssociation->Description.'</div>';
                    $aInformation = My_Orm_Information::findSome(1, 5);
                    foreach ($aInformation as $Info){
                        echo '<div class="billet">';
							if ($action->Image != null){
                                echo '<img class="picture" SRC="'.$action->Image->Chemin.'" ALT="Pictures" TITLE="'.$action->Image->Titre.'">';
                            }
                            echo '<h3>'. $Info->Titre . '</h3>';
                            echo '<div class="info">'. nl2br($Info->Description) . '</div>';
                            echo '<div class="date">'.date("d/m/Y", strtotime($Info->DatePublication)).'</div>';
                        echo '</div>';
                        }
                ?> 
            </div>
            <!-- Bannière Bas -->
			<img class="footer" src="../img/front/bdbot.png" alt="Quest'Handi"/>
        </div>
    </body>
</html>
