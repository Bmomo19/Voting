
<?php require_once("header.php"); ?>
<?php
  $curl = curl_init($host."/equipe/list.php?evenementId=".$_GET["evenementId"]);
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_CONNECTTIMEOUT => 30
  ]);

  $data = curl_exec($curl);
  $test = json_decode($data, true); 
?>
<body>
    <div class='container mx-auto' style='padding-top:15%'>
  <span>Hello, <span class="text-primary"><?php echo $_COOKIE[$cookie_name] ?></span></span> 
        <div class="card">
        <h1 class="text-center" style='margin-top:5px;'>  <a href="evenement.php"><?php echo strtoupper($test['Libelle'])?></a> </h1>
                <h3 class="card-header info-color white-text text-center py-4">
                    <strong>La liste des équipes</strong>
                </h3>
            <div>
                <?php
                    foreach($test['data'] as $equipe){  
                ?>
                <a href='vote.php<?php echo "?id=".$equipe['Id']."&evenementId=".$_GET["evenementId"] ?>' >
                    <h3>
                    <ul class="list-group list-group-flush">
                         <li class="list-group-item text-primary"><?= $equipe['Libelle']; ?></li>
                    </ul>
                    </h3>
                    <hr>
                </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php require_once("jsfile.php"); ?>
</body>
</html>


