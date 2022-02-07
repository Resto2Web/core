<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateThemeSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('theme.headings_font', '');
        $this->migrator->add('theme.body_font', '');
        $this->migrator->add('theme.primary_color', '');
        $this->migrator->add('theme.secondary_color', '');
    }
}
