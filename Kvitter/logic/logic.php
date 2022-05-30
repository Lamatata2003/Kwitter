<?php
//Tar användaren dit den ska på sidan
if (!isset($_GET["page"])) {
    $_GET["page"] = "login";
}
if ($_GET["page"] == "home") {
	$messages = getMessages();
}
if (isset($_SESSION["isLoggedIn"])) {

	//Lägger upp ett inlägg på Webbsidan
	if (isset($_POST["upload_skickat"])) {

		$text = $_POST["textarea"];
		$id = $_SESSION["user_id"];

		//HTML enteties såsom taggar och liknande blir borttaget för att undvika attacker
		$text = htmlentities($text);

		if (strlen($text) <= 280) { //Sätter max antal tecken på 280

			$query = $conn->prepare("INSERT INTO messages SET message = ?, user_id = ?, m_created_at = NOW()");
			$query->bindParam('1', $text, PDO::PARAM_STR);
			$query->bindParam('2', $id, PDO::PARAM_INT);
			$query->execute();

			//Skickar användaren till flödes sidan
			header("Location: ?page=home");
			exit();

		} else {
			$err = "The word limit is at 280 words, try making a smaller message";
		}
	}
}