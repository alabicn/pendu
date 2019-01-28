<?php

    session_start();
     
    $positionLettre = $_GET['lettre'];
     
    if(!$_SESSION['lettresJouees'][$positionLettre])
    {
        $_SESSION['lettresJouees'][$positionLettre] = true;
         
        $nbLettres = 0;
         
        for($i = 0 ; $i < $_SESSION['longueurMot'] ; $i++)
        {
            if($_SESSION['mot'][$i] == chr(65 + $positionLettre))
            {
                $_SESSION['motAffiche'][$i] = chr(65 + $positionLettre);
                 
                $_SESSION['nbLettresTrouvees']++;
                 
                $nbLettres++;
            }
        }
         
        if($nbLettres == 0)
        {
            $_SESSION['nbTentatives']++;
             
            if($_SESSION['nbTentatives'] > 7)
            {
                echo "<h3>Tu as perdu!</h3>";
                 
                for($i = 0 ; $i < $_SESSION['longueurMot'] ; $i++)
                {
                    $_SESSION['motAffiche'][$i] = $_SESSION['mot'][$i];
                }
            }
        }
        else
        {
            if($_SESSION['nbLettresTrouvees'] == $_SESSION['longueurMot'])
            {
                    echo "<h3>Bravo ! ! !<br>Tu as gagné</h3>";
            }
        }
    }
     
     
    echo "  <!DOCTYPE html>
            <html>
                <head>
                    <title>Le jeu du pendu - Tentative ". $_SESSION['nbTentatives']. "</title>
                    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"css/knacss.css\" />
                    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"css/style.css\" />
                </head>
                <body width=\"100%\">
                    <div align=\"center\" style=\"margin-top: 15%\">";
                         
                        echo "<h3>
                                <img src=\"css/img/pendu", $_SESSION['nbTentatives'], ".png\">
                                <br>";
                                
                                foreach($_SESSION['motAffiche'] as $rang => $element)
                                {
                                    echo $element;
                                }
                         
                        echo "<br> ";
                         
                        if(($_SESSION['nbTentatives'] <= 7) && ($_SESSION['nbLettresTrouvees'] < $_SESSION['longueurMot']))
                        {
                            for($i = 0 ; $i < 26 ; $i++)
                            {
                                if($_SESSION['lettresJouees'][$i])
                                {
                                    echo chr(65 + $i), " ";
                                }
                                else
                                {
                                    echo " <a href=\"jeu1.php?lettre=$i\" class=\"link\">", chr(65 + $i), "</a> ";
                                }
                            }
                        }
                        else
                        {
                            for($i = 0 ; $i < 26 ; $i++)
                            {
                                echo chr(65 + $i), " ";
                            }
                        }
                        echo "<br>
                        </h3>
                        <button class=\"btn--danger\"><a href=\"index.html\">Réessayez ?</a></button>
                    </div>
                </body>
            </html>";
?>