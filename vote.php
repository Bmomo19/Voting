<?php require_once("header.php"); ?>
<?php
  $curl = curl_init($host."/vote/get.php?equipeId=".$_GET["id"]."&evenementId=".$_GET["evenementId"]."&email=".$_COOKIE[$cookie_name]);
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_CONNECTTIMEOUT => 30
  ]);

  $data = curl_exec($curl);
  $test = json_decode($data, true); 
?>
<body>
    <div class='container mx-auto' style='padding-top:10%'>
  <span>Hello, <span class="text-primary"><?php echo $_COOKIE[$cookie_name] ?></span></span> 
        <div class="card">
            <h1> 
                <a href="equipe.php?evenementId=<?php echo $_GET["evenementId"] ?>"> <?php echo $test['Evenement'] ?> - <?php echo $test['Equipe']?></a>
            </h1>
            <h2 class="card-header info-color white-text text-center py-4">
                <strong>ATTRIBUTION DE NOTE</strong>
            </h2>
            <div class="card card-body">
                <h3 style="text-align: center;">Liste des membres de l'équipes</h3> <hr>
                <?php require_once('members.php');?>
            </div>

            </div>
            <div class="card card-body">
                <h4 class="card-title">
                    <div>Donnez une note à l'équipe</div>
                </h4>
                <form id="myform" action="#" method="POST">
                    <fieldset class="rating">
                        <input name="note" type="radio" id="rating5" value="5" on="change:rating.submit" <?php echo $test["Note"]=='5'?'checked':'' ?> >
                        <label for="rating5" title="5 stars" checked>☆</label>

                        <input name="note" type="radio" id="rating4" value="4" on="change:rating.submit" <?php echo $test["Note"]=='4'?'checked':'' ?>>
                        <label for="rating4" title="4 stars">☆</label>

                        <input name="note" type="radio" id="rating3" value="3" on="change:rating.submit" <?php echo $test["Note"]=='3'?'checked':'' ?>>
                        <label for="rating3" title="3 stars">☆</label>

                        <input name="note" type="radio" id="rating2" value="2" on="change:rating.submit" <?php echo $test["Note"]=='2'?'checked':'' ?>>
                        <label for="rating2" title="2 stars">☆</label>

                        <input name="note" type="radio" id="rating1" value="1" on="change:rating.submit" <?php echo $test["Note"]=='1'?'checked':'' ?>>
                        <label for="rating1" title="1 stars">☆</label>
                    </fieldset>
                    <input type="hidden" name="evenementId" value="<?php echo $_GET["evenementId"] ?>" />
                    <input type="hidden" name="equipeId" value="<?php echo $_GET["id"] ?>" />
                    <input type="hidden" name="email" value="<?php echo $_COOKIE[$cookie_name] ?>" />
                    <p class="card-text">
                        <div class="md-form">
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Vos observations" name="observation"><?php echo $test["Observation"] ?></textarea> <br>
                                <button type="submit" class="btn btn-primary mx-auto">NOTER</button>
                                <a href="equipe.php?evenementId=<?php echo $_GET["evenementId"] ?>" class="btn btn-info mx-auto">ANNULER</a>
                            </div>
                    </p>
                </form>
            </div>
        </div>

        <?php require_once("jsfile.php"); ?>
        
        <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
        <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
        <style amp-custom>
            .rating {
                --star-size: 3;
                /* use CSS variables to calculate dependent dimensions later */
                padding: 0;
                /* to prevent flicker when mousing over padding */
                border: none;
                /* to prevent flicker when mousing over border */
                unicode-bidi: bidi-override;
                direction: rtl;
                /* for CSS-only style change on hover */
                text-align: left;
                /* revert the RTL direction */
                user-select: none;
                /* disable mouse/touch selection */
                font-size: 3em;
                /* fallback - IE doesn't support CSS variables */
                font-size: calc(var(--star-size) * 1em);
                /* because `var(--star-size)em` would be too good to be true */
                cursor: pointer;
                /* disable touch feedback on cursor: pointer - http://stackoverflow.com/q/25704650/1269037 */
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                -webkit-tap-highlight-color: transparent;
                margin-bottom: 1em;
            }

            /* the stars */
            .rating>label {
                display: inline-block;
                position: relative;
                width: 1.1em;
                /* magic number to overlap the radio buttons on top of the stars */
                width: calc(var(--star-size) / 3 * 1.1em);
            }

            .rating>*:hover,
            .rating>*:hover~label,
            .rating:not(:hover)>input:checked~label {
                color: transparent;
                /* reveal the contour/white star from the HTML markup */
                cursor: inherit;
                /* avoid a cursor transition from arrow/pointer to text selection */
            }

            .rating>*:hover:before,
            .rating>*:hover~label:before,
            .rating:not(:hover)>input:checked~label:before {
                content: "★";
                position: absolute;
                left: 0;
                color: gold;
            }

            .rating>input {
                position: relative;
                transform: scale(3);
                /* make the radio buttons big; they don't inherit font-size */
                transform: scale(var(--star-size));
                /* the magic numbers below correlate with the font-size */
                top: -0.5em;
                /* margin-top doesn't work */
                top: calc(var(--star-size) / 6 * -1em);
                margin-left: -2.5em;
                /* overlap the radio buttons exactly under the stars */
                margin-left: calc(var(--star-size) / 6 * -5em);
                z-index: 2;
                /* bring the button above the stars so it captures touches/clicks */
                opacity: 0;
                /* comment to see where the radio buttons are */
                font-size: initial;
                /* reset to default */
            }

            form.amp-form-submit-error [submit-error] {
                color: red;
            }
        </style>

        <script>
            $("#myform").submit(function(e) {

                e.preventDefault();
                $.ajax({
                    url: "<?php echo $host."/vote/do.php" ?>",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        location.href = "equipe.php?evenementId=<?php echo $_GET["evenementId"] ?>"
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            })
        </script>
</body>

</html>