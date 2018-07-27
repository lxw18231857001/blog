<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">用户列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/users/create">增加用户</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>用户名称</th>
                                    <th>操作</th>
                                </tr>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td>
                                            <?php if($user->id !=1): ?>
                                                <a type="button" class="btn"
                                                   href="/admin/users/<?php echo e($user->id); ?>/role">角色管理</a>
                                                <a type="button" class="btn"
                                                   href="/admin/users/<?php echo e($user->id); ?>/edit">编辑</a>
                                                <a type="button" class="btn  user-audit" user-id="<?php echo e($user->id); ?>"
                                                   user-action-status="-1">删除</a>
                                                <a type="button" class="btn"
                                                   href="/admin/users/<?php echo e($user->id); ?>/resetPassword">重置密码</a>
                                            <?php else: ?>
                                                <?php if($admin->name=='admin'): ?>
                                                    <a type="button" class="btn"
                                                       href="/admin/users/<?php echo e($user->id); ?>/role">角色管理</a>
                                                    <a type="button" class="btn"
                                                       href="/admin/users/<?php echo e($user->id); ?>/edit">编辑</a>
                                                    <a type="button" class="btn  user-audit" user-id="<?php echo e($user->id); ?>"
                                                       user-action-status="-1">删除</a>
                                                    <a type="button" class="btn"
                                                       href="/admin/users/<?php echo e($user->id); ?>/resetPassword">重置密码</a>
                                                <?php endif; ?>
                                                

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($users->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>