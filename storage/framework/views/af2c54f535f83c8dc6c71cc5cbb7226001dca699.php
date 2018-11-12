<?php $__env->startSection('title', $article->title); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="z-article-show">
            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>
            <h1 class="z-title"><?php echo e($article->title); ?></h1>
            <p class="z-info"><span style="margin-right:20px"><?php echo e($article->created_at_date); ?></span>sad creeper</p>
            <div class="z-content">
              <?php echo $article->content; ?>

            </div>
            <p class="z-counter">
              阅读 <?php echo e($article->view); ?>

              <a href="" onclick="return false" style="float:right" data-toggle="modal" data-target="#commentModal"><span class="glyphicon glyphicon-pencil"></span> 评论</a>
            </p>
            <div class="z-comments">
              <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <hr id="comment<?php echo e($comment->id); ?>">
                <?php if( $comment->user_id == 1 ): ?>
                  <img src="/v.jpg" class="img-circle z-avatar">
                  <p class="z-name z-center-vertical">sad creeper <span class="label label-info z-label">作 者</span></p>
                <?php elseif( $comment->website ): ?>
                  <p class="z-avatar-text"><?php echo $comment['avatar_text'] ? $comment['avatar_text'] : '匿' ?></p>
                  <a href="<?php echo e($comment->website); ?>" target="_blank">
                    <p class="z-name"><?php echo $comment['name'] ? $comment['name'] : '匿名' ?></p>
                  </a>
                <?php else: ?>
                  <p class="z-avatar-text"><?php echo $comment['avatar_text'] ? $comment['avatar_text'] : '匿' ?></p>
                  <p class="z-name"><?php echo $comment['name'] ? $comment['name'] : '匿名' ?></p>
                <?php endif; ?>
                <p class="z-content"><?php echo e($comment->content); ?></p>
                <p class="z-info"><?php echo e($comment->created_at_diff); ?> · <?php echo e($comment->city); ?> <span data-toggle="modal" data-target="#commentModal" data-replyid="<?php echo e($comment->id); ?>" data-replyname="<?php echo e($comment->name); ?>" class="glyphicon glyphicon-share-alt z-reply-btn"></span></p>
                <div class="z-reply">
                  <?php $__currentLoopData = $comment->replys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $reply->user_id == 1 ): ?>
                      <img src="/v.jpg" class="img-circle z-avatar">
                      <p class="z-name z-center-vertical">sad creeper <span class="label label-info z-label">作 者</span></p>
                    <?php elseif( $reply->website ): ?>
                      <p class="z-avatar-text"><?php echo $reply['avatar_text'] ? $reply['avatar_text'] : '匿' ?></p>
                      <a href="<?php echo e($reply->website); ?>" target="_blank">
                        <p class="z-name"><?php echo $reply['name'] ? $reply['name'] : '匿名' ?></p>
                      </a>
                    <?php else: ?>
                      <p class="z-avatar-text"><?php echo $reply['avatar_text'] ? $reply['avatar_text'] : '匿' ?></p>
                      <p class="z-name"><?php echo $reply['name'] ? $reply['name'] : '匿名' ?></p>
                    <?php endif; ?>
                    <p class="z-content">回复 <b><?php echo e($reply->target_name); ?></b>：<?php echo e($reply->content); ?></p>
                    <p class="z-info"><?php echo e($reply->created_at_diff); ?> · <?php echo e($reply->city); ?> <span data-toggle="modal" data-target="#commentModal" data-replyid="<?php echo e($comment->id); ?>" data-replyname="<?php echo e($reply->name); ?>" class="glyphicon glyphicon-share-alt z-reply-btn"></span></p>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">说点什么吧..</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('comments.store')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="exampleInputFile">留言</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">昵称</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="[选填] 怎么称呼？" value="<?php echo e($inputs->name); ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">邮箱</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="[选填] 如果有人回复，会收到邮件提醒" value="<?php echo e($inputs->email); ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">个人网站</label>
            <input type="text" class="form-control" id="website" name="website" placeholder="[选填] 包含 http:// 或 https:// 的完整域名" value="<?php echo e($inputs->website); ?>">
          </div>
          <input type="text" id="parent_id" name="parent_id" style="display:none">
          <input type="text" id="target_name" name="target_name" style="display:none">
          <input type="text" name="article_id" value="<?php echo e($article->id); ?>" style="display:none">
          <input type="submit" id="commentFormBtn"  style="display:none">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('commentFormBtn').click()">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- img Modal -->
<div class="modal fade bs-example-modal-lg" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="max-width:100%">
  <div class="modal-dialog" style="width:100%" role="document">
    <div class="modal-content" style="text-align:center;background-color:rgba(0,0,0,0.5)">
      <img id="imgModalImage" src="" alt="" style="max-width:100%">
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  $('#commentModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    if (button.data('replyid')) {
      var replyid = button.data('replyid')
      var replyname = button.data('replyname') ? button.data('replyname') : '匿名'

      var modal = $(this)
      modal.find('#parent_id').val(replyid)
      modal.find('#target_name').val(replyname)
      modal.find('#content').attr("placeholder", "回复 @"+replyname)
    }else {
      var modal = $(this)
      modal.find('#parent_id').val(0)
      modal.find('#target_name').val('')
      modal.find('#content').attr("placeholder", "")
    }
  })

  $("img").click(function(){
    $('#imgModalImage').attr('src', this.src)
    $('#imgModal').modal('show')
  });
  $('#imgModal').click(function(){
    $('#imgModal').modal('hide')
  })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>