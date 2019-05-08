<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 04/05/2019
 * Time: 15:55
 */
?>



    
    Recherche:
    <form method = 'get' action="">
        <input type= text  name= 'mot_recherche' />
        <input type= 'submit'  name= Submit  value= Envoyer/>
    </form>

<?php
$jojo = $_GET['mot_recherche'];
htmlspecialchars($jojo);

echo 'je suis dahns la merdasse' . $jojo;



