<?php $__env->startSection('content'); ?>

    <div class="col-sm-8 blog-main">
        <form class="form-horizontal" action="/user/<?php echo e(\Auth::id()); ?>/updatePassword" method="POST"
              enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">绑定邮箱</label>
                <div class="col-sm-10">
                    <input class=" form-control" name="email" type="email" value="<?php echo e($user->email); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input class=" form-control" name="password" type="password" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-10">
                    <input class=" form-control" name="password_confirmation" type="password" value="">
                </div>
            </div>
            <button type="submit" class="btn btn-default">修改密码</button>

        </form>
        <?php echo $__env->make('layout.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <br>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>