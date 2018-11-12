<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<?php if(env('APP_NAME') == 'sadcreeper' && env('APP_DEBUG') == false): ?>
  <script>
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?ec4335b5bc7f9967785dddd770b05538";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
  })();
  </script>
<?php endif; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        Home
                    </a>

                    <div class="navbar-brand visible-xs-block" style="padding:4px 0 0 50px">
                      <form class="navbar-form navbar-left search" style="margin:0;border:0;float:right" role="search" action="<?php echo e(route('articles.search')); ?>" method="post">
                          <?php echo e(csrf_field()); ?>

                          <div class="form-group">
                              <span class="glyphicon glyphicon-search" style="line-height:inherit"></span>
                              <input type="text" name="key" style="border: none;margin-left:5px;width:100px" placeholder="search..">
                          </div>
                      </form>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo e(route('articles.list')); ?>">全部文章</a></li>
                        <li><a href="https://github.com/SadCreeper/laravel-blog-v2" target="_blank"><img src="/icons/github.png" alt="" style="width:18px;margin-bottom:3px"></a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs" style="margin-top:6px">
                            <form class="navbar-form navbar-left search" role="search" action="<?php echo e(route('articles.search')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <input type="text" name="key" style="border: none;margin-left:5px;width:100px" placeholder="search..">
                                </div>
                            </form>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <!-- <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <?php if(Auth::check()): ?>
                                        <?php if(Auth::id() === 1): ?>
                                          <li><a href="/admin">管理后台</a></li>
                                          <li role="separator" class="divider"></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>

        <footer class="z-footer">
            <p class="z-text">DESIGN & FRONT-END CODE BY</p>
            <p class="z-text-big">sad creeper</p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
