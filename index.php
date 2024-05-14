<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);

?>

<html>

<head>
 <meta charset="UTF-8" />
 <title>O próximo filme da Marvel</title>
 <meta name="description" content="O próximo filme da Marvel">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
 <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Marvel_Logo.svg" alt="Marvel" style="padding: 16px 0; height: 300px; width: 100%;">

 <h1 style="text-align: center;">Próxima estreia:</h1>
 
 <section>
 <hgroup>
  <h3><?= $data["title"]; ?> lançamentos em <?= $data["days_until"]; ?> dias</h3>
  <p>Data de estréia: <?= $data["release_date"];?></p>
  <p>Descrição: <?= $data["overview"]?></p>
 </hgroup>

  <img src="<?= $data["poster_url"]; ?>" alt="Póster <?= $data["title"]; ?>" width="300" style="border-radius: 16px;">
 </section>

 <h2 style="text-align: center;">O que vem depois do <?= $data["title"]?>?</h2>
 
 <section>
 <hgroup>
  <h3><?= $data["following_production"]["title"]; ?> lançamentos em <?= $data["following_production"]["days_until"]; ?> dias</h3>
  <p>Data de estréia: <?= $data["following_production"]["release_date"];?></p>
  <p>Descrição: <?= $data["following_production"]["overview"]?></p>
 </hgroup>

  <img src="<?= $data["following_production"]["poster_url"]; ?>" alt="Póster <?= $data["following_production"]["title"]; ?>" width="300" style="border-radius: 16px;">
 </section>
</main>

</html>

<style>
 section {
  display: grid;
  grid-template-columns: calc(100% - 300px) 300px;
  justify-items: center;
  align-items: center;
  gap: 12px;
 }

 hgroup {
  display: flex;
  flex-direction: column;
  gap: 4px;
 }

 @media screen and (width < 768px) {
  section {
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
  }

  h1 {
   font-size: 26px;
  }

  h2 {
   font-size: 20px;
  }

  h3 {
   font-size: 16px;
  }

  p {
   font-size: 12px;
  }
  
  hgroup>:not(:first-child):last-child  {
   font-size: 12px;
  }
 }
</style>