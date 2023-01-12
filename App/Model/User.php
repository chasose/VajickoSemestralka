<?php

namespace App\Model;

use App\Core\Model;

class user extends Model
{
    protected $id;
    protected $name;
    protected $password;
    protected $email;
    protected $firstName;
    protected $secondName;
    protected $telNumber;
    protected $address;
    protected $orders = [];

    /**
     * @return mixed
     */
    public function getOrders(): mixed
    {
        return $this->orders;
    }

    /**
     * @param mixed $orders
     */
    public function setOrders($orders): void
    {
        $this->orders[] = $orders;
    }

    /**
     * @return mixed
     */
    public function getTelNumber()
    {
        return $this->telNumber;
    }

    /**
     * @param mixed $telNumber
     */
    public function setTelNumber($telNumber): void
    {
        $this->telNumber = $telNumber;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param mixed $secondName
     */
    public function setSecondName($secondName): void
    {
        $this->secondName = $secondName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */


    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}