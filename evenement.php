
<?php 
  require_once("header.php"); 

  $curl = curl_init($host."/evenement/list.php");
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_CONNECTTIMEOUT => 30,
    CURLOPT_HTTPGET        => true,
  ]);

  $data = curl_exec($curl);
  $test = json_decode($data, true); 
?>
<body>
  <div class='container mx-auto' style='margin-top:15%'>
  <span>Hello, <span class="text-primary"><?php echo $_COOKIE[$cookie_name] ?></span></span> 
    <div class="card">
      <h3 class="card-header info-color white-text text-center py-4">
        <strong>Evenements</strong>
      </h3>

      <div class="card-body px-lg-5">
      <?php
              foreach($test as $event){  
            ?>
              <p class="card-title text-muted" style="margin-top:2%;"><?= $event['Date']; ?></p>
              <a href="equipe.php?evenementId=<?php echo $event['Id'] ?>"><h1 class="card-text text-primary text-center"> 
                <?= $event['Libelle'];?> 

                </h1> <hr> </a>
            <?php
              }
            ?>
      </div>

    
    </div>        
  </div>
    <?php require_once("jsfile.php");?>
</body>
</html>



