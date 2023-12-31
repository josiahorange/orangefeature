<?php 
$chooseJson = file_get_contents(plugin_dir_path( __FILE__ ) . '../json/ofChoose.json');
$howtoJson = file_get_contents(plugin_dir_path( __FILE__ ) . '../json/ofHowto.json');
$ofHowto = json_decode($chooseJson, true);
$ofChoose = json_decode($chooseJson, true);



?>