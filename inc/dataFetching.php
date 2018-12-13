<?php
    function saveRemoteJsonData(){

        $jsonurl = "https://app.revelian.com/rss/skillsTests/skillsTests.json";
        $json = file_get_contents($jsonurl);
        //var_dump(json_decode($json));

        $file = fopen('skillsTests.json','w');
        fwrite($file, $json);
        fclose($file);

    } add_action('saveRemoteJsonData', 'saveRemoteJsonData');

function readLocalJsonData(){

    //Use file_get_contents to GET the URL in question.
    $contents = file_get_contents('skillsTests.json');

    //If $contents is not a boolean FALSE value.
    if($contents !== false){
        //Print out the contents.
        return $contents;
    }
}
?>