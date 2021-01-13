<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.siteActive', true);
        $this->migrator->add('general.phoneNumber', '');
        $this->migrator->add('general.email', '');
        $this->migrator->add('general.facebook_url', '');
    }
}
