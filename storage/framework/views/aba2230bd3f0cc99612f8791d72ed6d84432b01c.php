<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <!-- 轮播 -->
          <!-- <div id="carousel-example-generic" class="carousel slide z-slide" data-ride="carousel" style="margin-bottom: 20px;">
              <div class="carousel-inner z-inner" role="listbox">
                  <div class="item active">
                      <a href="#"><img src="default.jpg" class="img-responsive" alt="imax1"></a>
                      <div class="z-content">
                          <p class="z-title">Measure Anything in Laravel with StatsD</p>
                          <p class="z-intro">I want to show you some tools and techniques you can use to measure anything and everything that you want in your Laravel applications with StatsD. These ideas are simple and not new; yet, I believe that the simplicity and power are what makes StatsD great.</p>
                          <div class="z-center-horizontal">
                              <a href="" class="z-button">read more..</a>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <a href="#"><img src="/img/default2.png" class="img-responsive" alt="imax2"></a>
                      <div class="z-content">
                          <p class="z-title">Measure Anything in Laravel with StatsD</p>
                          <p class="z-intro">I want to show you some tools and techniques you can use to measure anything and everything that you want in your Laravel applications with StatsD. These ideas are simple and not new; yet, I believe that the simplicity and power are what makes StatsD great.</p>
                          <div class="z-center-horizontal">
                              <a href="" class="z-button">read more..</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="z-slide-button">
                  <a class="z-location-left" href="#carousel-example-generic" data-slide="prev">
                      <span class="z-button glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="z-location-right" href="#carousel-example-generic" data-slide="next">
                      <span class="z-button glyphicon glyphicon-chevron-right"></span>
                  </a>
              </div>
          </div> -->

          <!-- 最新文章 -->
          <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="z-article-vertical">
              <img src="<?php echo e($article->cover == '' ? 'default.jpg' : $article->cover); ?>" class="img-responsive z-cover" alt="imax1">
              <div class="z-content">
                  <?php if(count($article->tags)): ?>
                    <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <span class="label label-info" style="font-size:11px;padding:1px 5px"><?php echo e($tag->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <p class="z-title"><?php echo e($article->title); ?></p>
                  <p class="z-info">- 发表于 <?php echo e($article->created_at_date); ?> · 最后访问 <?php echo e($article->updated_at_diff); ?> -</span>
                  <p class="z-intro"><?php echo e($article->content); ?></p>

                  <div class="z-center-horizontal">
                      <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="z-button">read more..</a>
                  </div>
              </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- <div class="col-md-4">

        </div> -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>