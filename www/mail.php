<?php 
$headers ='';
$headers .= 'From: Jonny <jon@example.com>';
$headers .= 'Reply-To: Jonny <jon@example.com>';
$headers .= 'Return-Path: Jonny <jon@example.com>';     // these two to set reply address
$headers .= "Message-ID:< TheSystem@".$_SERVER['SERVER_NAME'].">";
$headers .= "X-Mailer: PHP v";           // These two to help avoid spam-filters 
mail('solamenteporpensar@hotmail.com', 'test', 'hola', $headers);
?>