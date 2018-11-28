<?php 


class events
{
		private $id;
		private $user_id;
		private $title;
		private $org;
		private $description;
		private $phone;
		private $street;
		private $city;
		private $zipCode;
		private $country;
		private $email;
		private $datetime1;
		private $category;
		private $lat;
		private $lng;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setUser_id($user_id) { $this->user_id = $user_id; }
		function getUser_id() { return $this->user_id; }
		function setTitle($title) { $this->title = $title; }
		function getTitle() { return $this->title; }
		function setOrg($org) { $this->org = $org; }
		function getOrg() { return $this->org; }
		function setDescription($description) { $this->description = $description; }
		function getDescription() { return $this->description; }
		function setPhone($phone) { $this->phone = $phone; }
		function getPhone() { return $this->phone; }
		function setStreet($street) { $this->street = $street; }
		function getStreet() { return $this->street; }
		function setCity($city) { $this->city = $city; }
		function getCity() { return $this->city; }
		function setZipCode($zipCode) { $this->zipCode = $zipCode; }
		function getZipCode() { return $this->zipCode; }
		function setCountry($country) { $this->country = $country; }
		function getCountry() { return $this->country; }
		function setEmail($email) { $this->email = $email; }
		function getEmail() { return $this->email; }
		function setDatetime1($datetime1) { $this->datetime1 = $datetime1; }
		function getDatetime1() { return $this->datetime1; }
		function setCategory($category) { $this->category = $category; }
		function getCategory() { return $this->category; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }
		
	public function __construct()
	{
		include('db.php');



	}


	public function getEvents(){
		include('db.php');
		$sql = "SELECT * FROM events WHERE lat IS NULL AND lng IS NULL";
		$sql = "SELECT * FROM events";

		$statement = $d->query($sql);
		//$statement->execute();
		$events = $statement->fetch_all();
		return $events;
	}

	public function addLtLgToDB(){
		include('db.php');
		$sql = "UPDATE events SET lat = ?, lng = ? WHERE id= ?";
		$statement = $d->prepare($sql);
		
		$statement->bind_param('ddi', $this->lat, $this->lng, $this->id);
		//$statement->bind_param('f', $lng);
		//$statement->bind_param('i', $id);

		if ($statement->execute()) {
			return true;
		} else {
			return false;
		}
		

	}

	public function getEventsMarked(){
		include('db.php');
		$sql = "SELECT * FROM events";

		$statement = $d->query($sql);
		//$statement->execute();
		$events = $statement->fetch_all();
		return $events;
	}

	public function getOneEvent($id){
		include('db.php');
		$sql = "SELECT * FROM events WHERE id = $id";
		$statement = $d->query($sql);
		//$statement->execute();
		$events = $statement->fetch_all();
		return $events;
	}

	public function getSearchEvent($s, $by){
		include('db.php');
		if($by === 'zipCode'){
			$sql = 'SELECT * FROM events WHERE zipCode = "'.$s.'" ';
			$statement = $d->query($sql);
			$events = $statement->fetch_all();
			return $events;
		}elseif ($by === 'title') {
			$sql = 'SELECT * FROM events WHERE title = "'.$s.'" ';
			$statement = $d->query($sql);
			$events = $statement->fetch_all();
			return $events;
		}elseif ($by === 'city') {
			$sql = 'SELECT * FROM events WHERE city = "'.$s.'" ';
			$statement = $d->query($sql);
			$events = $statement->fetch_all();
			return $events;
		}
		
	}

	public function getFilterEvent($categories){
		include('db.php');
		$sql = 'SELECT * FROM events WHERE category = "'.$categories.'" ';
		$statement = $d->query($sql);
		//$statement->execute();
		$events = $statement->fetch_all();
		return $events;
	}



}


 ?>