<!-- Inkluderar javascripten till klockan -->
<script type="text/javascript" src="js/clock.js"></script>
<main class="px-3 border box">

  <!-- Canvasen där klockan ritas ut -->
  <canvas id="canvas" width="400" height="400"></canvas>

  <!-- Koden körs ifall man inte är inloggad -->
  <?php if (!isset($_SESSION["isLoggedIn"])) {
  ?>
  <div class="border m-4">
    <?php  
    if ($error == true) {
      echo '<strong>This account does not exist! Try again...</strong>';
     } ?>

    <!-- Utséendet när man ska logga in på sidan -->
    <form class="loginorout" method="post" action="" onsubmit="submit.disabled = true; return true;">
    <input type="hidden" name="login_sent"> 
    <label>Username</label><br>
    <input type="text" name="username"><br>
    <label>Password</label><br>
    <input type="password" name="password"><br>
  
  <!-- "Logga in" knapp -->
    <input type="submit" name="submit" value="Login" class="btn btn-light btn-lg m-2">
  </form> 
  <?php 
} 
else { ?> <!-- Koden körs ifall man är inloggad -->

  <!-- "Logga ut" knapp -->
  <form class="loginorout" method="post" action="" onsubmit="submit.disabled = true; return true;">
    <input type="hidden" name="signout_sent">
    <input type="submit" name="submit" value="Sign out" class="btn btn-light btn-lg m-2">
  </form> 
<?php } ?>
</main>

