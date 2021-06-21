<?php
    $text1 = $_POST["name"];

    if ($text1 != "")
    {
        echo("SENT!");
        $file = fopen("data.txt", "w");
        fwrite($file, $text1);
        fclose($file);
    } else 
    {
        echo("Messege delivery failed...");
    }
?>