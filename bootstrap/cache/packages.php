<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'overtrue/laravel-wechat' => 
  array (
    'providers' => 
    array (
      0 => 'Overtrue\\LaravelWeChat\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'EasyWeChat' => 'Overtrue\\LaravelWeChat\\Facade',
    ),
  ),
);