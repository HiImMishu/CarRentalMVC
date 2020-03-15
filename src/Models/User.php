<?php
namespace Model;

/**
 * @Entity @Table(name = "user")
 **/
 class User
 {
   /** @Id @Column(type="integer") @GeneratedValue **/
   protected $id;

   /** @FirstName(type = "string") **/
   protected $firstName;

   /** @LastName(type = "string") **/
   protected $lastName;

   /** @Email(type = "string") **/
   protected $email;

   /** @Password (type = "string") **/
   protected $password;

   public function getId()
   {
     return $this->id;
   }

   public function setId($id)
   {
     $this->id = $id;
   }

   public function getFirstName()
   {
     return $this->firstName;
   }

   public function setFirstName($firstName)
   {
     $this->frstName = $firstName;
   }

   public function getLastName()
   {
     return $this->lastName;
   }

   public function setLastName($lastName)
   {
     $this->lastName = $lastName;
   }

   public function getEmail()
   {
     return $this->email;
   }

   public function setEmail($email)
   {
     $this->email = $email;
   }

   public function getPassword()
   {
     return $this->password;
   }

   public function setPassword($password)
   {
     $this->password = $password;
   }
 }
