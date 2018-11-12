<?php $__env->startSection('title', '全部文章'); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="margin-bottom:20px">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
          <div class="">
            <span>热门关键词：</span>
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e(route('tags.show', $tag->id)); ?>"><span style="margin-right:10px"><?php echo e($tag->name); ?></span></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php if(count($articles)): ?>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="z-article-horizontal">
                <div class="row">
                  <div class="col-xs-8">
                      <a href="<?php echo e(route('articles.show', $article->id)); ?>"><p class="z-title"><?php echo e($article->title); ?></p></a>
                      <p class="z-info hidden-xs">发表于 <?php echo e($article->created_at_date); ?> · 最后访问 <?php echo e($article->updated_at_diff); ?></span>
                      <p class="z-intro"><?php echo e($article->content); ?></p>
                      <div class="hidden-xs">
                        <?php if(count($article->tags)): ?>
                          <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="label label-info" style="font-size:11px;padding:1px 5px"><?php echo e($tag->name); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                  </div>
                  <div class="col-xs-4" style="padding-left:0">
                    <a href="<?php echo e(route('articles.show', $article->id)); ?>"><img src="<?php echo e($article->cover == '' ? '/default.jpg' : $article->cover); ?>" class="img-responsive z-cover" alt="imax1"></a>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($articles->links()); ?>

          <?php else: ?>
            <div class="alert alert-warning" role="alert" style="margin-top:20px">sorry, no articles!</div>
          <?php endif; ?>
        </div>
        <div class="col-md-3">
          <div class="">

          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>