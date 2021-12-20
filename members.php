
<?php
  $curl = curl_init($host."/equipe/membres/list_membre.php?equipeId=9");
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_CONNECTTIMEOUT => 30
  ]);

  $members = curl_exec($curl);
  $teamMembers = json_decode($members, true);
?>

<body>
    <div class="container mx-auto" style="margin-top:15%">
        <?php
            foreach($teamMembers as $membre){  
        ?>
        <div class="card" style="width: 14rem;">
            <img src="<?php echo($membre['Photo']); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo ($membre['Nom'].' '.$membre['Prenoms']); ?></h5>
                <a href="#" class="btn btn-primary">Donner une note</a>
            </div>
        </div>
        <?php
            }
        ?>
