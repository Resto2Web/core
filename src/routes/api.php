<?php

use Resto2web\Core\API\Controllers\WebsiteStatusController;
use Resto2web\Core\Common\Middlewares\CheckWebsiteSecret;

Route::group(['as'=> 'api.','prefix' => 'api','middleware' => CheckWebsiteSecret::class],function (){
    Route::patch('status', WebsiteStatusController::class);
});
