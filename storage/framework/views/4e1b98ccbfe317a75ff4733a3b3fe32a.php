<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-7">
            <div class="navbar-brand">Simple To Do List</div>
            <!-- 
            <div class="navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Update Data</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        -->
        </div>
    </nav>

    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-primary">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <!-- 02. Form input data -->
                        <form id="todo-form" action="<?php echo e(route('todo.post')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="task" id="todo-input"
                                    placeholder="Tambah task baru" required value="<?php echo e(old('task')); ?>">
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="<?php echo e(route('todo')); ?>" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="<?php echo e(request
('search')); ?>" placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>

                        <ul class="list-group mb-4" id="todo-list">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- 04. Display Data -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="task-text">
                                        <?php echo $item->is_done == '1' ? '<del>' : ''; ?>

                                        <?php echo e($item->task); ?></del>
                                        <?php echo $item->is_done == '1' ? '</del>' : ''; ?>

                                    </span>
                                    <input type="text" class="form-control edit-input" style="display: none;"
                                        value="<?php echo e($item->task); ?>">
                                    <div class="btn-group">
                                        <form action="<?php echo e(route('todo.delete', ['id' => $item->id])); ?>" method="POST"
                                            onsubmit=" return confirm('Ingin hapus data ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-danger btn-sm delete-btn">✕</button>

                                        </form>

                                        <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-<?php echo e($loop->index); ?>" aria-expanded="false">✎</button>
                                    </div>
                                </li>
                                <!-- 05. Update Data -->
                                <li class="list-group-item collapse" id="collapse-<?php echo e($loop->index); ?>">
                                    <form action="<?php echo e(route('todo.update', ['id' => $item->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>
                                        <div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="task" value="<?php echo e($item->task); ?>">
                                                <button class="btn btn-outline-primary" type="submit">Update</button>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="radio px-2">
                                                <label>
                                                    <input type="radio" value="1" name="is_done" <?php echo e($item->is_done == '1' ? 'checked' : ''); ?>> Selesai
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="0" name="is_done" <?php echo e($item->is_done == '0' ? 'checked' : ''); ?>> Belum
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php echo e($data->links()); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html><?php /**PATH D:\Ardhan Laravel\to-do\resources\views/todo/todo.blade.php ENDPATH**/ ?>