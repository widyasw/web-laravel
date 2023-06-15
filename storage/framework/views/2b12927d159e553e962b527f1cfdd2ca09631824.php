

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <?php if($errors->any()): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.properties.index')); ?>" class="btn btn-light shadow-sm">Back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo e(route('admin.properties.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') ? 'selected' : null); ?>>
                          <?php echo e($category->name); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="location">Brand</label>
                    <input type="text" name="location" class="form-control" value="<?php echo e(old('location')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="<?php echo e(old('price')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="bed">Qty</label>
                    <input type="number" name="bed" class="form-control" value="<?php echo e(old('bed')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="bath">Size</label>
                    <input type="number" name="bath" class="form-control" value="<?php echo e(old('bath')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="dimension">Qnty</label>
                    <input type="number" name="dimension" class="form-control" value="<?php echo e(old('dimension')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="year_build">Year post</label>
                    <input type="date" name="year_build" class="form-control" value="<?php echo e(old('year_build')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Tags</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"><?php echo e(old('address')); ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="7"><?php echo e(old('description')); ?></textarea>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skincare-store\resources\views/admin/properties/create.blade.php ENDPATH**/ ?>