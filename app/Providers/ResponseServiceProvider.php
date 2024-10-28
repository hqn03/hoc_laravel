<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(ResponseFactory $factory): void
    {
        $factory->macro('api_success', function($message = '', $data = null) use ($factory){
            $format = [
                'status' => 200,
                'message' => $message,
                'data' => $data,
            ];
        });

        $factory->macro('api_error', function(string $message='', $errors = []) use ($factory){
            $format = [
                'status' => 500,
                'message' => $message,
                'errors' => $errors,
            ];
        });
    }
}
