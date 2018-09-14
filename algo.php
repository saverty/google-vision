<?php
session_start();

//Chargement des dépendances
require __DIR__ . '/vendor/autoload.php';

//Chargement de Google Vision
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

//Identifiant google vision
putenv('GOOGLE_APPLICATION_CREDENTIALS='.realpath('key.json'));

//Upload de l'image
if(isset($_FILES["image"])){
  move_uploaded_file($_FILES["image"]["tmp_name"], "img.jpg");
}

//Creation du client
$imageAnnotator = new ImageAnnotatorClient();

//Récupere l'image
$image = file_get_contents("img.jpg");

//Dection web
$webResults = array();
$web = $imageAnnotator->webDetection($image)->getWebDetection();;

foreach ($web->getBestGuessLabels() as $label) {
  array_push($webResults, $label->getLabel());
}


//Detection de la violence
$response = $imageAnnotator->safeSearchDetection($image);
$violence = $response->getSafeSearchAnnotation()->getViolence();


//Detection des tags
$labelResults = array();
$labels = $imageAnnotator->labelDetection($image)->getLabelAnnotations();

foreach ($labels as $label) {
  array_push($labelResults, $label->getDescription());
}


$data = [
  "titre" => $webResults[0],
  "labels" => $labelResults,
  "violence" => $violence * 20

];

$_SESSION['data'] = $data;
header('Location: index.php');

?>
