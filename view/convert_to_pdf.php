<?php
    $html = $_POST['data'];
    //$pdf = html2pdf($html);
    
    header("Content-Type: application/pdf"); //check this is the proper header for pdf
    header("Content-Disposition: attachment; filename='some.pdf';");
    //echo $pdf;
?>