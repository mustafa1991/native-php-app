<?php

class User
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $fname
     */
    protected $fname;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * User constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}