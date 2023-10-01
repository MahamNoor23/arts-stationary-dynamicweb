<?php
include 'header.php';
include 'config.php';

if (isset($_POST['btn'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $post = $_POST['post'];
  $country = $_POST['country'];

  $hash = password_hash($pass, PASSWORD_BCRYPT);

  $insert = "INSERT INTO `register` (`First name`, `Last name`, `Email`, `password`, `Address`, `Phone_number`, `Post_Code`, `Country`) VALUES ('$fname', '$lname', '$email', '$hash', '$address', '$phone', '$post', '$country')";

  $query = mysqli_query($conn, $insert);

  if ($query) {
    echo "<script>window.location = 'login.php';</script>";

  }
}
?>

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row ec_breadcrumb_inner">
          <div class="col-md-6 col-sm-12">
            <h2 class="ec-breadcrumb-title">Register</h2>
          </div>
          <div class="col-md-6 col-sm-12">
            <!-- ec-breadcrumb-list start -->
            <ul class="ec-breadcrumb-list">
              <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="ec-breadcrumb-item active">Register</li>
            </ul>
            <!-- ec-breadcrumb-list end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Ec breadcrumb end -->


<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="section-title">
        <h2 class="ec-bg-title">Register</h2>
        <h2 class="ec-title">Register</h2>
        <p class="sub-title mb-3">Best place to buy and sell digital products</p>
      </div>
    </div>
    <div class="ec-register-wrapper">
      <div class="container ">
        <form method="post" class="row g-3">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">First Name</label>
            <input type="text" class="form-control" name="fname" id="inputEmail4" placeholder="Enter your First Name ">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Last Name </label>
            <input type="text" class="form-control" name="lname" id="inputEmail4" placeholder="Enter your Last Name">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Enter your Email">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" id="inputPassword4" placeholder="Enter your password">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Enter your Address">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="inputPassword4" placeholder="Enter your Phone Number">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Postal Code</label>
            <input type="text" class="form-control" name="post" id="inputPassword4" placeholder="Enter your Postal Code ">
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">Country</label>
            <select id="inputState" name="country" class="form-select">
              <option selected>Choose Country</option>
              <?php
              $fetch = "SELECT * FROM  countries";
              $result = mysqli_query($conn, $fetch);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <option> <?php echo $row[1] ?> </option>
              <?php
              } ?>
            </select>
          </div>
          <div class="col-12 d-flex justify-content-center ">
            <button type="submit" name="btn" class="btn btn-primary">Sign in</button>
          </div>
        </form>
      </div>
      <div>
      </div>
    </div>
  </div>

  <!-- End Register -->

  <?php
  include 'footer.php'
  ?>
  </body>

  </html>