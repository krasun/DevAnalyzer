<?php

namespace DevAnalyzer\Model;

/**
 * Represents the most basic info about developer.
 */
class Developer 
{
    /**
     * Unique id in provider
     *
     * @var string
     */
    private $uniqueId;

    /**
     * @var string
     */
    private $providerName;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $nickName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $location;

    public function __construct($uniqueId, $providerName)
    {
        $this->uniqueId = $uniqueId;
        $this->providerName = $providerName;
    }

    /**
     * @param string $uniqueId
     *
     * @return Developer
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * @param int $age
     *
     * @return Developer
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $email
     *
     * @return Developer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $fullName
     *
     * @return Developer
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $location
     *
     * @return Developer
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $nickName
     *
     * @return Developer
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param string $phoneNumber
     *
     * @return Developer
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $providerName
     *
     * @return Developer
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;

        return $this;
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }
}