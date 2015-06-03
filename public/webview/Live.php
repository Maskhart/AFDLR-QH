<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/FrontOffice/Live.css" rel="stylesheet">
        <script src="../js/jquery-1.11.2.min.js"></script>
        <script src="../js/script-live.js"></script>
    </head>
    <body>
        <div id="background"></div>
        <!-- Cadre d'info -->
        <div class="subbody">
            <div class="blockinfo">
                <?php $Live = My_Orm_Live::find();?>
                <!-- Scène -->
                <div class="infoscene">
                 <?php  echo $Live->PrestationMusique->Prestation->Scene->Libelle; ?>
                </div>
                <div class="infomusique">
                    <div id="artiste">
                         <?php echo $Live->PrestationMusique->Prestation->Artiste->Nom;?>
                    </div>
                    <div id="musique">
                        <?php echo $Live->PrestationMusique->Musique->Titre ?>
                    </div>
                    <?php
                        if($Live->PrestationMusique->Musique->IdentifiantVideo != null){
                            echo '<div class="filtre">';
                                echo '<input type="button" value="Paroles" id="parole" />';
                                echo '<input type="button" value="Video" id="video" />';
                            echo '</div>';
                        }
                    ?>   
                </div>
				<?php
					if ($Live == null){
						echo '<div class="error">Pas de live disponible pour le moment !</div>';
					}
				?> 
                <div class="video">
					 
                </div>
            </div>

        </div>
    </body>
</html>
