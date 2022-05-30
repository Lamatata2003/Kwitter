<?php 
function getMessages() {
	global $conn;
	//Hämta meddelande historik, nyaste meddelandet längst upp
	$query = $conn->prepare("SELECT * FROM messages, users WHERE messages.user_id = users.user_id ORDER BY m_id DESC");
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}