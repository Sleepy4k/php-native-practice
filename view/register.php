<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_base_url() . "public/css/auth.css" ?>">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
      <form class="form-signin" action="<?php echo get_base_url() . "register/process" ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating">
          <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username" required>
          <label for="floatingUsername">Username</label>
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirmation" placeholder="Password Confirmation" required>
          <label for="floatingPasswordConfirmation">Password Confirmation</label>
        </div>

        <button class="btn btn-primary w-100 py-2 button-submit" type="submit">Sign up</button>
        <a class="btn btn-primary w-100 py-2" href="<?php echo get_base_url() . "login" ?>">Already have account? Sign in</a>

        <?php 
          if (@$_SESSION['msg'] == 1) {
            echo '<div class="alert alert-info mt-4" role="alert">Maaf Username atau Password yang kamu masukkan salah.</div>';
            $_SESSION['msg'] = 0;
          } else if (@$_SESSION['msg'] == 2) {
            echo '<div class="alert alert-info mt-4" role="alert">Maaf Password yang kamu masukkan tidak sama.</div>';
            $_SESSION['msg'] = 0;
          } else if (@$_SESSION['msg'] == 3) {
            echo '<div class="alert alert-info mt-4" role="alert">Maaf Username yang kamu masukkan sudah terdaftar.</div>';
            $_SESSION['msg'] = 0;
          }
        ?>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>