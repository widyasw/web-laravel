

<?php $__env->startSection('header'); ?>
<header class="header" id="header">
            <div class="nav">
                <a href="<?php echo e(route('homepage')); ?>"
                    >Beauty<span>Me</span> <i class="bx bxs-heart"></i>
                </a>
            </div>
        </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <section class="home section" id="home">
                <div class="home__container container grid">
                    <h1 class="home__title">Product</h1>
                    <img
                        class="home__img"
                        src="<?php echo e(Storage::url($property->galleries->first()->photo)); ?>"
                        alt=""
                    />
                </div>
            </section>

            <section class="galleries container">
                <?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img class="<?php echo e($property->galleries->first()->photo == $gallery->photo  ? 'active' : null); ?>" src="<?php echo e(Storage::url($gallery->photo)); ?>" alt="" />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>

            <section class="container">
                <h3 class="section__title">Description</h3>
                    <?php if(session()->has('message')): ?>
                        <div class="alert" style="position: relative;text-align: center;background-color: lightgreen;padding: 1rem;margin-bottom: .5rem;color: green;border-radius: .25rem;">
                            <?php echo e(session()->get('message')); ?>

                            <i id="hide" style="font-size: 1.5rem;cursor: pointer;position: absolute;top: .25rem;right: .25rem;" class='bx bx-x'></i>
                        </div>
                    <?php endif; ?>
                
                <div class="card__container">
                    <article class="description__content">
                        <div class="description__header">
                            <div class="description__category">
                                <i class="bx bxs-pin"></i>
                                <span><?php echo e($property->category->name); ?></span>
                            </div>
                            
                            <h5 class="description__price">Rp. <?php echo e($property->price); ?></h5>
                        </div>
                        <p class="description__text" style="text-align: justify;">
                             <?php echo e($property->description); ?>

                        </p>
                        <div class="description__footer">
                            <div class="description__footer-item">
                                <div class="description__feature">
                                    <span class="description__feature-icon">
                                        <i class="bx bx-basket"></i>
                                    </span>
                                    <div class="description__feature-container">
                                        <h6>Quantity</h6>
                                        <span><?php echo e($property->bed); ?> item</span>
                                    </div>
                                </div>
                            </div>
                            <div class="description__footer-item">
                                <div class="description__feature">
                                    <span class="description__feature-icon">
                                    <i class='bx bx-droplet'></i>
                                    </span>
                                    <div class="description__feature-container">
                                        <h6>Size</h6>
                                        <span><?php echo e($property->bath); ?> ml</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="description__footer-item">
                                <div class="description__feature">
                                    <span class="description__feature-icon">
                                    <i class='bx bx-calendar'></i>
                                    </span>
                                    <div class="description__feature-container">
                                        <h6>Year Post</h6>
                                        <span><?php echo e(date('Y', strtotime($property->year_build))); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="contact__content">
                        <div class="contact__header">
                            <h3>Contact Owner</h3>
                        </div>
                        <form action="<?php echo e(route('messages.store')); ?>" method="post" class="form">
                            <?php echo csrf_field(); ?> 
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Name"
                                    name="name"
                                    value="<?php echo e(old('name')); ?>"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Email"
                                    name="email"
                                    value="<?php echo e(old('email')); ?>"
                                />
                            </div>
                            <div class="form-group">
                                <textarea
                                    name="message"
                                    class="form-control"
                                    id=""
                                    cols="30"
                                    rows="5"
                                    placeholder="Message"
                                ><?php echo e(old('message')); ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-contact">Send</button>
                        </form>
                    </article>
                </div>
            </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-alt'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/detail.css')); ?>" />
    <style>
        .hide {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-alt'); ?>
  <script>
    //   hide
    const hideButton = document.getElementById('hide');
    const alert = document.querySelector('.alert');
    if(hideButton && alert) {
        hideButton.addEventListener('click', () => {   
            alert.classList.add('hide');
        })
    }
    // end
            const largeImage = document.querySelector(".home__img");
            const images = document.querySelectorAll(".galleries img");
            images.forEach((image, i) => {
                image.addEventListener("click", () => {
                    largeImage.src = image.src;
                    image.style.transition = ".2s";
                    const current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(
                        "active",
                        ""
                    );
                    image.className += " active";
                });
            });
        </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skincare-store\resources\views/detail.blade.php ENDPATH**/ ?>