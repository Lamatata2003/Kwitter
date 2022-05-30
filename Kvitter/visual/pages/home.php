<!-- Ser till så att man bara kan se flödet ifall man är inloggad -->
<?php if (isset($_SESSION["isLoggedIn"])): ?>
  

  <main class="px-3 border box maincontent">
    <div class="border m-4">

      <!-- Hämtar information från användaren -->
      <?php 
      $query = $conn->prepare("SELECT * FROM users WHERE user_id = ".$_SESSION["user_id"]."");
      $query->execute();
      $results = $query->fetch(PDO::FETCH_ASSOC);
      ?>

      <!-- Skriver ut längst upp på sidan vilket användarnamn samt typ du har (user eller admin) -->
      <div class="border-name m-1 p-1 nameandtype">
        <?=$results["username"]?> | <?=$results["usertype"]?>
      </div>
      <?php if (isset($err)) {
        echo $err; 
      } ?>

      <!-- Skriver ut textrutan längst upp på sidan -->
      <form method="post" action="" onsubmit="submit.disabled = true; return true;">
      <input type="hidden" name="upload_skickat">
      <textarea class="form-control" rows="5" name="textarea" required><?php if(isset($text)){echo $text;}?></textarea>

      <!-- Knapp för att skicka iväg sitt inlägg -->
      <div class="userinfo">
        <div class="border-information m-1">
          <input type="submit" name="submit" value="Post message" class="btn btn-light btn-lg m-2">
        </div>
      </div>
    </div>
    </form>

    <!-- Laddar in alla meddelanden på sidan -->
    <?php foreach($messages as $message) {
    ?>

    <!-- Utséendet på flödeslistan med historiken av tidigare medelanden -->
    <div class="border m-4 postbox">
      <h1> <?php echo $message["username"] ?></h1>
      <p class="lead border msgcontent" style="word-wrap: break-word;"> <?=htmlentities($message["message"]);?> </p>
      <p class="lead timecontent"> <u><?php echo $message["m_created_at"] ?></u></p>
        
      </p>
    </div>
    <?php }?>

  </main> 
<?php endif ?>
