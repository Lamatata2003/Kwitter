<?php 
$error = false;
if(isset($_POST["login_sent"])) {

    //Användaren ska logga in med det angivits i inloggningsformuläret
    $nam = $_POST["username"];
    $pass = sha1($_POST['password']);

    $name = htmlentities($nam);

    $query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $query->bindParam('1', $name, PDO::PARAM_STR);
    $query->bindParam('2', $pass, PDO::PARAM_STR);
    $query->execute();

    //Om DB hittade en matchande rad, logga in.
    if ($query->rowCount() == 1) {

        //Lägg resultatet av queryn i sessionsvariabler som håller en inloggad på sidan
        $results = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION["user_id"] = $results["user_id"];
        $_SESSION["username"] = $results["username"];
        $_SESSION["usertype"] = $results["usertype"];

        $_SESSION["isLoggedIn"] = true;

        //Gå till flow när man är inloggad
        header("location: ?page=home");
    } else {
        //Felmeddelande om PDO inte hittade en rad i DB
        $error = true;
    }
}
//Användaren loggar ut
if (isset($_POST["signout_sent"])) {

    //Kasta all temporär session data.
    unset($_SESSION["isLoggedIn"]);
    unset($_SESSION["usertype"]);
    unset($_SESSION["user_id"]);
    unset($_SESSION["username"]);
}


