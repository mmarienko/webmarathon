<?php
function autoload($pClassName)
{
   include(__DIR__ . '/' . $pClassName . '.php');
}
spl_autoload_register("autoload");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>t07</title>
   <style>
      table,
      td {
         border: 1px solid #000;
      }
   </style>
</head>

<body>
   <h1>Avenger Quote to XML</h1>

   <?php

   $avengerQuote1 = new AvengerQuote(5942, "Tony Stark", "I know I said,  no more surprice,
   but I gotta say, I was really hoping to pull off one last one.", [
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint06",
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint07"
   ]);
   $avengerQuote1->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote1->addComment("My first favourite quote of Bruce Banner");

   $avengerQuote2 = new AvengerQuote(1333, "Bruce Banner", "That's my secret, captain: I'm always angry", [
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint06",
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint07"
   ]);
   $avengerQuote2->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote2->addComment("My first favourite quote of Bruce Banner");

   $avengerQuote3 = new AvengerQuote(6637, "Tony Stark", "I know I said,  no more surprice,
   but I gotta say, I was really hoping to pull off one last one.", [
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint06",
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint07"
   ]);
   $avengerQuote3->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote3->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote3->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote3->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote3->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote3->addComment("My first favourite quote of Bruce Banner");

   $avengerQuote4 = new AvengerQuote(1992, "Tony Stark", "That's my secret, captain: I'm always angry", [
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint06",
      "https://lms.ucode.world/pdf/connect-web-sprint07/sprint07"
   ]);
   $avengerQuote4->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote4->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote4->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote4->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote4->addComment("My first favourite quote of Bruce Banner");
   $avengerQuote4->addComment("My first favourite quote of Bruce Banner");

   $listAvengerQuote = new ListAvengerQuotes();
   $listAvengerQuote->addAvengerQuote($avengerQuote1);
   $listAvengerQuote->addAvengerQuote($avengerQuote2);
   $listAvengerQuote->addAvengerQuote($avengerQuote3);
   $listAvengerQuote->addAvengerQuote($avengerQuote4);

   $listAvengerQuote->toXML("avenger_quote.xml");

   ?>

   <table>
      <tbody>
         <tr>
            <td>
               <br> To XML
               <pre><?php print_r($listAvengerQuote) ?></pre>
            </td>
            <td>
               <br> From XML
               <pre><?php print_r($listAvengerQuote->fromXML("avenger_quote.xml")) ?></pre>
            </td>
         </tr>
      </tbody>
   </table>

</body>

</html>