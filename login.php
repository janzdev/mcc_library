<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./assets/img/mcc-logo.png">
  <title>MCC LIBRARY</title>

  <!-- Custom CSS link -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- Icounscout Link  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <div class="logincontainer">
    <div class="content">
      <div class="image-box">
        <img src="./assets/img/mcc-logo.png" alt="">
      </div>
      <form action="#" class="wrapper">
        <p>Welcome to</p>
        <div class="header">MCC <span>LIBRARY</span></div>
        <div class="input-box">
          <input type="text" spellcheck="false" id="firstname" required />
          <label for="firstname">Student ID No.</label>
        </div>
        <div class="input-box">
          <input type="password" spellcheck="false" class="inputvalue" id="password" required />
          <label for="password">Password</label>
          <i class="uil uil-eye-slash toggle"></i>
        </div>
        <div class="input-box">
          <button type="submit" class="btn" id="submit"><a href="index.php">SIGN IN</a></button>
          <p>Don't have an account? <a href="./signup.php">Sign up</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="./assets/js//hidepass.js"></script>
</body>

</html>