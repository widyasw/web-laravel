

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="btn btn-light shadow-sm">Back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gallery</h3>
               </div>
               <div class="card-body">
                <form action="<?php echo e(route('admin.properties.galleries.store', $property->id )); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
             <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                              <a href="<?php echo e(Storage::url($gallery->photo)); ?>">
                                <img src="<?php echo e(Storage::url($gallery->photo)); ?>" width="200" alt="">
                              </a>
                            </td>  
                            
                            <td>
                                <a href="<?php echo e(route('admin.properties.galleries.edit',[$property->id,$gallery->id])); ?>" class="btn btn-info">edit</a>
                                <form onclick="return confirm('are you sure');" class="d-inline-block" action="<?php echo e(route('admin.properties.galleries.destroy', [$property->id,$gallery->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?> 
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
              </div>
              </div>
            </div>
        </div>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Edit Property</h3>
               </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo e(route('admin.properties.update', $property->id)); ?>">
                <?php echo csrf_field(); ?> 
                <?php echo method_field('put'); ?>
                <div class="card-body">
                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name', $property->name)); ?>" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option  <?php echo e($category->id === $property->category->id ? 'selected' : null); ?> value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') ? 'selected' : null); ?>>
                          <?php echo e($category->name); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="location">Brand</label>
                    <input type="text" name="location" class="form-control" value="<?php echo e(old('location', $property->location)); ?>">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="<?php echo e(old('price', $property->price)); ?>">
                  </div>
                  <div class="form-group">
                    <label for="bed">Qty</label>
                    <input type="number" name="bed" class="form-control" value="<?php echo e(old('bed', $property->bed)); ?>">
                  </div>
                  <div class="form-group">
                    <label for="bath">Size</label>
                    <input type="number" name="bath" class="form-control" value="<?php echo e(old('bath', $property->bath)); ?>">
                  </div>
                  <div class="form-group">
                    <label for="dimension">Qnty</label>
                    <input type="number" name="dimension" class="form-control" value="<?php echo e(old('dimension', $property->dimension)); ?>">
                  </div>
                  <div class="form-group">
                    <label for="year_build">Year post</label>
                    <input type="date" name="year_build" class="form-control" value="<?php echo e(old('year_build', $property->year_build)); ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">tags</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"><?php echo e(old('address', $property->address)); ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="7"><?php echo e(old('description', $property->description)); ?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skincare-store\resources\views/admin/properties/edit.blade.php ENDPATH**/ ?>