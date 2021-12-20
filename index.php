<?php require_once("header.php"); ?>
<body>

    <div class='container mx-auto' style='margin-top:15%'>
      
        <div class="card">

            <h3 class="card-header info-color white-text text-center py-4">
                <strong>Application de vote</strong>
            </h3>

        <div class="card-body px-lg-5">
            <form method='POST' action='evenement.php' class="text-center" style="color: #757575;">
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label>Veuillez Entrer votre Email.</label>
                        <input type="email" required class="form-control" id="inputEmail" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto">Commencer</button>
                </div>
            </form>
            

    </div>

</div>
  </div>
  <?php require_once("jsfile.php");?>

</body>
</html>
