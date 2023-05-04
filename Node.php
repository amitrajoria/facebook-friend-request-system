<?php 
// include 'database.php';
class Node {
	private $id;
	private $username;
	private $email;
	private $city;
	private $img;
	private $friends;
	private $request;
	private $sentRequest;

	public function __construct($id, $username, $email, $city, $img) {
		$this->id = $id;
		$this->username = $username;
		$this->email = $email;
		$this->city = $city;
		$this->img = $img;
		$this->friends = friendsOfUser($id);
		$this->request = requestsOfUser($id);
		$this->sentRequest = sentRequestByUser($id);
	}

	public function getId() {
		return $this->id;
	} 

	public function getUsername() {
		return $this->username;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getCity() {
		return $this->city;
	}

	public function getImg() {
		return $this->img;
	}

	public function getFriends() {
		return $this->friends;
	}

	public function getRequest() {
		return $this->request;
	}

	public function getSentRequest() {
		return $this->sentRequest;
	}
}


?>