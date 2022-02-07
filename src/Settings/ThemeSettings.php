<?php

namespace Resto2web\Core\Settings;

use Spatie\LaravelSettings\Settings;

class ThemeSettings extends Settings
{
    public string $headings_font = '';
    public string $body_font = '';
    public string $primary_color = '';
    public string $secondary_color = '';

    public static function group(): string
    {
        return 'theme';
    }
}
