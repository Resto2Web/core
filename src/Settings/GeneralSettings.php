<?php


namespace Resto2web\Core\Settings;


use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public bool $siteActive = true;
    public string $phoneNumber = '';
    public string $email = '';

    public static function group(): string
    {
        return 'general';
    }
}
