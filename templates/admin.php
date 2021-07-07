<?php


$chooseJson = file_get_contents(plugin_dir_path( __FILE__ ) . '../json/ofChoose.json');
$howtoJson = file_get_contents(plugin_dir_path( __FILE__ ) . '../json/ofHowto.json');
$ofHowto = json_decode($howtoJson, true);
$ofChoose = json_decode($chooseJson, true);

if(isset($_POST['submit'])) 
{ 


    $temp3 = $ofChoose;
    for($i = 1; $i < count($ofChoose); $i++){   
        $key = key($temp3);
        $ofChoose[key($temp3)] = $_POST[key($temp3) . "Choose"];
        array_shift($temp3);
    }


    $temp4 = $ofHowto;
    for($i = 1; $i < count($ofHowto); $i++){   
        $key = key($temp4);
        $ofHowto[key($temp4)] = $_POST[key($temp4) . "Howto"];
        array_shift($temp4);
    }


    echo("Posts Have Been Updated");




    $chooseJson = json_encode($ofChoose);
    $howtoJson = json_encode($ofHowto); 

    file_put_contents(plugin_dir_path( __FILE__ ) . '../json/ofChoose.json', $chooseJson);
    file_put_contents(plugin_dir_path( __FILE__ ) . '../json/ofHowto.json', $howtoJson); 

}




?>


<div id="ofWrapper">

    <h1 style="4rem;">Quick & Easy Lighting Featured Posts</h1>

    <form id="orangefeatform"  action="<?php echo $_SERVER['PHP_SELF'];?>?page=orangefeature" method="post">

        <div class="buttongroupwrapper">  
            <div  class="buttongroup">

        <?php


        echo('<h2 style="font-size:2rem;">How to</h1>');

        $temp2 = $ofHowto;
        for($i = 1; $i < count($ofHowto); $i++){
            $key = key($temp2);
            array_shift($temp2);
            ?> <h3><?php echo($key)?></h3> <input type="text" name="<?php echo($key)?>Howto" value=<?php echo($ofHowto[$key]);?>> <?php 

        } 

        ?> 

            </div> 

            <div class="buttongroup">


        <?php

        echo('<h2 style="font-size:2rem;">How to Choose</h1>');


        $temp = $ofChoose;
        for($i = 1; $i < count($ofChoose); $i++){
            $key = key($temp);
            array_shift($temp);
            ?> <h3><?php echo($key)?></h3> <input type="text" name="<?php echo($key)?>Choose" value=<?php echo($ofChoose[$key]);?>> <?php


        }

  

        ?>

            </div>



    


        </div> 

        
    </form> 

    <input class="hvr-grow" id="featbutton" form="orangefeatform" type="submit" name="submit" value="Change Posts!">





</div>  


