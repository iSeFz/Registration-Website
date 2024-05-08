

<?php $__env->startSection('title', 'Sign Up'); ?>

<?php $__env->startSection('content'); ?>
    <div class="form-container">
        <form id="form" action="/users" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <h3>Sign Up</h3>
            <div class="input-control">
                <input type="text" id="fullname" placeholder="Full Name" name="fullname">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="text" id="name" placeholder="Username" name="username">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="date" id="birthdate" placeholder="Birth Date" name="birthdate">
                <div class="error"></div>
            </div>
            <button id="checkactors" method="GET" type="submit">Check Actors Born</button>
            <div class="input-control">
                <input type="text" id="phone" placeholder="Phone" name="phone">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="text" id="address" placeholder="Address" name="address">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="password" id="password" placeholder="Password" name="password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="password" id="cpassword" placeholder="Confirm Password">
                <div class="error"></div>
            </div>
            <div>
                <label for="photo">Upload Photo</label>
            </div>
            <div class="input-control">
                <input type="file" id="photo" name="photo">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="email" id="email" placeholder="Email" name="email">
                <div class="error"></div>
            </div>
            <input id="submitform" type="submit" name="submit" value="Register Now" class="form-btn">
            <p>Already have an account? <a href="">Login</a></p>
        </form>
    </div>
    <div class="actorscontainer">
    <ul id="actors" ></ul>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\noure\OneDrive\Desktop\Laravel\registration-website\resources\views/index.blade.php ENDPATH**/ ?>