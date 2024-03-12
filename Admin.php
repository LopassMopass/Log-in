<?php

class Admin extends User
{
    public int $accessLevel = 1;

    public function __construct(int $id, string $email, string $password, int $accesLevel)
    {
        parent::__construct($id, $email, $password);
        $this -> accessLevel = $accesLevel;
    } 
}