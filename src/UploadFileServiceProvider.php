<?php

namespace Mintellity\UploadFile;

use Illuminate\Support\ServiceProvider;

class UploadFileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/views/components' => resource_path('views/components'),
        ], 'upload-file-components');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function register()
    {
        $this->app->singleton(UploadFile::class, function () {
            return new UploadFile();
        });
    }
}
