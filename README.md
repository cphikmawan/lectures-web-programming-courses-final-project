# README #

#Install Image Intervention

**composer require intervention/image**

In the $providers array add the service providers for this package.


  
**Intervention\Image\ImageServiceProvider::class**

Add the facade of this package to the $aliases array.


  
**'Image' => Intervention\Image\Facades\Image::class**

**$ php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"**

#Install Unisharp File Manager
Install package

 **composer require unisharp/laravel-filemanager**
Edit config/app.php :

Add service providers

 **Unisharp\Laravelfilemanager\LaravelFilemanagerServiceProvider::class,
 Intervention\Image\ImageServiceProvider::class,**
And add class aliases

 **'Image' => Intervention\Image\Facades\Image::class,**
Code above is for Laravel 5.1. In Laravel 5.0 should leave only quoted class names.

Publish the package’s config and assets :

 **php artisan vendor:publish --tag=lfm_config**

 **php artisan vendor:publish --tag=lfm_public**
Ensure that the files & images directories (in config/lfm.php) are writable by your web server (run commands like **chown or chmod**).


#Install Kryptonit3/Counter
**
composer require kryptonit3/counter:5.2.***

Add the following to your config\app.php Service Providers

**Kryptonit3\Counter\CounterServiceProvider::class,**
Add the following to your config\app.php Facades
**
'Counter' => Kryptonit3\Counter\Facades\CounterFacade::class,**

Then run the following:

**php artisan vendor:publish --provider="Kryptonit3\Counter\CounterServiceProvider" --tag="migrations"**

**php artisan migrate**

Set Cookie Name in Laravel env Config file

**COUNTER_COOKIE="Name of your cookie"**

#Insatall laravel-follow

**composer require overtrue/laravel-follow -vvv**

Then add the service provider to config/app.php

**Overtrue\LaravelFollow\FollowServiceProvider::class,**

Publish the migrations file:

**php artisan vendor:publish --provider='Overtrue\LaravelFollow\FollowServiceProvider' --tag="migrations"**

As optional if you want to modify the default configuration, you can publish the configuration file:

**php artisan vendor:publish --provider='Overtrue\LaravelFollow\FollowServiceProvider' --tag="config"**

And create tables:

**php artisan migrate**

#Insatall larave-collective

**composer require "laravelcollective/html":"^5.4.0"**