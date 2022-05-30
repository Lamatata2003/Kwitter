<!-- Inkluderar massa filer -->
<?php 
session_start();
include "db/connection.php";

include "logic/login.php";
include "logic/sqlfunctions.php";
include "logic/logic.php";

include "visual/header.php";

include "visual/nav.php";

if ($_GET["page"] == "home") {
	include "visual/pages/home.php";
}
if ($_GET["page"] == "login") {
	include "visual/pages/login.php";
}
if ($_GET["page"] == "register") {
	include "visual/pages/register.php";
}
include "visual/footer.php";
