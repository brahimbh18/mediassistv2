<?php

class User {
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;

    private $age;
    private $gender;
    private $bloodType;
    private $weight;
    private $height;
    private $phone;
    private $address;

    public function __construct($id, $name, $email, $username, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }

    public function getAge() { return $this->age ?? null; }
    public function getGender() { return $this->gender ?? null; }
    public function getBloodType() { return $this->bloodType ?? null; }
    public function getWeight() { return $this->weight ?? null; }
    public function getHeight() { return $this->height ?? null; }
    public function getAllergiesOrDiseases() { return $this->allergiesOrDiseases ?? null; }
    public function getPhone() { return $this->phone ?? null; }
    public function getAddress() { return $this->address ?? null; }

    // Setters
    public function setName($name) { $this->name = $name; }
    public function setEmail($email) { $this->email = $email; }
    public function setUsername($username) { $this->username = $username; }
    public function setPassword($password) { $this->password = $password; }

    public function setAge($age) { $this->age = $age; }
    public function setGender($gender) { $this->gender = $gender; }
    public function setBloodType($bloodType) { $this->bloodType = $bloodType; }
    public function setWeight($weight) { $this->weight = $weight; }
    public function setHeight($height) { $this->height = $height; }
    public function setAllergiesOrDiseases($allergiesOrDiseases) { $this->allergiesOrDiseases = $allergiesOrDiseases; }
    public function setPhone($phone) { $this->phone = $phone; }
    public function setAddress($address) { $this->address = $address; }
}

?>