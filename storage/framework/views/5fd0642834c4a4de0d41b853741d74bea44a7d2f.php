

<?php $__env->startSection('header'); ?>
<header class="header" id="header">
      <nav class="nav container">
        <div class="nav__logo">
          <a href="<?php echo e(route('homepage')); ?>"
            >Beauty<span>Me</span> <i class="bx bxs-heart"></i>
          </a>
        </div>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#home" class="nav__link active-link"> Home </a>
            </li>
            <li class="nav__item">
              <a href="#about" class="nav__link"> About </a>
            </li>
            <li class="nav__item">
              <a href="#product" class="nav__link"> Product </a>
            </li>
            <li class="nav__item">
              <a href="#contact" class="nav__link"> Contact </a>
            </li>
          </ul>
          <div class="nav__close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
        </div>
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-menu"></i>
        </div>
      </nav>
    </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <section class="home section" id="home">
        <div class="home__container container grid">
          <div class="home__data">
            <h1 class="home__title">Reveal Your Beautiful Skin With Good Ingredients </h1>
            <p class="home__description">
              Get E-mail updates about our latest shop and special offers.
            </p>

            <?php if(session()->has('message')): ?>
              <div class="alert" style="text-align: center;position: relative;margin-bottom: .5rem;padding: .5rem;border-radius: .25rem;background-color: lightgreen;color: green;" class="alert">
                <?php echo e(session()->get('message')); ?>

                <i id="hide" style="font-size: 1.5rem;cursor: pointer;position: absolute;top: .25rem;right: .25rem;" class='bx bx-x'></i>
              </div>
            <?php endif; ?>

            <form action="<?php echo e(route('subscribers.store')); ?>" method="post" class="home__search">
              <?php echo csrf_field(); ?> 
              <input
                type="search"
                placeholder="Enter your email..."
                class="home__search-input"
                name="email"
                value="<?php echo e(old('email')); ?>"
              />
              <button type="submit" class="button">Subscribe</button>
            </form>
          </div>
          <div class="home__images">
            <div class="home__orbe"></div>

            <div class="home__img">
              <img src="<?php echo e(asset('frontend/assets/images/home.jpg')); ?>" alt="" />
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle">Best Categories</span>
          <h2 class="section__title">Explore categories<span>.</span></h2>

          <div class="popular__container grid">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="popular__card">
                <img
                    src="<?php echo e(Storage::url($category->banner)); ?>"
                    alt=""
                    class="popular__img"
                />
                <div class="popular__data">
                    <h3 class="popular__title"><?php echo e($category->name); ?></h3>
                    <span class="popular__description"> <?php echo e($category->properties->count()); ?> Properties </span>
                </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </section>

      <section class="section" id="property">
        <div class="container">
          <span class="section__subtitle">Best Choice</span>
          <h2 class="section__title">Popular Product<span>.</span></h2>

          <div class="property__container grid">
            <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="property__card">
                <a href="<?php echo e(route('detail', $property->slug)); ?>">
                    <div class="property__images">
                    <img
                        src="<?php echo e(Storage::url($property->galleries()->first()->photo)); ?>"
                        alt=""
                        class="property__img"
                    />
                    <span class="property__badge"><?php echo e($property->category->name); ?> </span>
                    </div>
                    <div class="property__data">
                    <h2 class="property__price"><span>Rp. </span><?php echo e($property->price); ?></h2>
                    <h3 class="property__title"><?php echo e($property->name); ?></h3>
                    <span class="property__description">
                        <?php echo e($property->address); ?></span
                    >
                    </div>
                </a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </section>

      <section class="subscribe section">
        <div class="subscribe__container container">
          <h2 class="subscribe__title">
            Start listing or buying a <br />
            product with us
          </h2>

          <a href="#" class="button subscribe__button">Get Started </a>
        </div>
      </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-alt'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/homepage.css')); ?>" />
<style>
        .hide {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-alt'); ?>
<script>
   const hideButton = document.getElementById('hide');
    const alert = document.querySelector('.alert');
    if(hideButton && alert) {
        hideButton.addEventListener('click', () => {   
            alert.classList.add('hide');
        })
    }
</script>
 <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skincare-store\resources\views/homepage.blade.php ENDPATH**/ ?>