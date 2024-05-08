<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- css file link here-->
    <link rel="stylesheet" href="style.css">
    <script defer src="signup.js"></script>

</head>

<body>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="form-container">
        <form id="form" action="" method="post" enctype="multipart/form-data">
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
                <button type="submit">Check Actors Born</button>
                <script defer src="signup.js"></script>
            </div>
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
    
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\Users\noure\OneDrive\Desktop\Laravel\registration-website\resources\views/temp.blade.php ENDPATH**/ ?>