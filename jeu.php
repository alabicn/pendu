<?php

    session_start();

    if (isset ($_POST{'niveau'}))
    {
        if ($_POST{'niveau'} == 1)
        {
            $mot_a_trouver = array("maternelle","tableaux","tabouret","rechauffer","coloriage","rayure","peinture","pinceau",
                                    "cartable","bibliotheque","dictionnaire","catalogue","enveloppe","etiquette","alphabet","appareil","camescope",
                                    "difference","magnetoscope","orchestre","ordinateur","telecommande","xylophone","recommencer","travailler",
                                    "directrice","mensonge","progresser","expliquer", "handicape");
                                    shuffle($mot_a_trouver);
        }else
         
    {    $mot_a_trouver = array("creperies","football","kamikazes","tracteurs","heliocoidale","chansonnier","ascensions","orthodoxes",
                               "hydroliques","maisonettes","abasourdis","abattons","abjectes","abjuriez","abondaient","abstinents","academiques","raccourcis","accoutumés",
                               "acheminons","automatismes","chromosomes",);
                               shuffle($mot_a_trouver);
        }
    
    }

    $_SESSION['motAffiche'] = array();
    $_SESSION['lettresJouees'] = array();
    $_SESSION['mot'] = strtoupper($mot_a_trouver{0});
    $_SESSION['nbTentatives'] = 0;
    $_SESSION['longueurMot'] = 0;
    $_SESSION['nbLettresTrouvees'] = 0;
 
 
    $_SESSION['longueurMot'] = strlen($_SESSION{'mot'});
     
    for($i = 1 ; $i <= $_SESSION['longueurMot'] ; $i++)
    {
        $_SESSION['motAffiche'][] = "-";
    }
     
    for($i = 1 ; $i <= 26 ; $i++)
    {
        $_SESSION['lettresJouees'][] = false;
    }
     
    echo "  <!DOCTYPE html>
            <html>
                <head>
                    <title>Le jeu du pendu - Tentative ". $_SESSION['nbTentatives']. "</title>
                    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"css/knacss.css\" />
                    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"css/style.css\" />
                </head>
                <body width=\"100%\">
                    <div style=\"margin-top: 20%\" align=\"center\">
                        <h3>
                            <img src=\"css/img/pendu". $_SESSION['nbTentatives']. ".png\">
                            <br>";
                                
                                    foreach($_SESSION['motAffiche'] as $rang => $element)
                                    {
                                        echo $element;
                                    }
                                
                                echo "<br> ";
                                
                                for($i = 0 ; $i < 26 ; $i++)
                                    {
                                        echo " <a href=\"jeu1.php?lettre=$i\" class=\"link\">", chr(65 + $i), "</a> ";
                                    }
                                echo "<br>
                        </h3>
                        <button class=\"btn--danger\"><a href=\"index.html\">Réessayez ?</a></button>
                    </div>  
                </body>
            </html>";
     
?>