<?php


namespace Domain\Users\DataTransferObjects;


use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public string $first_name;
    public string $last_name;
    public string $password;
    public string $email;
}
