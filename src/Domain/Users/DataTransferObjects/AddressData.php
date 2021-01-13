<?php


namespace Resto2web\Core\Domain\Users\DataTransferObjects;


use Spatie\DataTransferObject\DataTransferObject;

class AddressData extends DataTransferObject
{
    public string $address;
    public string $postal_code;
    public string $city;
}
