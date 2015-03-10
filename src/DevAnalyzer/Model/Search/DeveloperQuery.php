<?php

namespace DevAnalyzer\Model\Search;

/**
 * Represents search query for one developer.
 */
class DeveloperQuery
{
    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $location;

    /**
     * @return bool Is query valid?
     */
    public function isValid()
    {
        // At least one property should be filled
        $vars = get_object_vars($this);

        return count(array_filter($vars)) >= 1;
    }

    /**
     * @param string $email
     *
     * @return DeveloperQuery
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
     * @return DeveloperQuery
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
     * @param string $nickname
     *
     * @return DeveloperQuery
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $phoneNumber
     *
     * @return DeveloperQuery
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
     * @param string $location
     *
     * @return DeveloperQuery
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
}