<!DOCTYPE html> 
<html>
  <head>  
    <style>
      @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

      body {
        font-family: 'Open Sans', sans-serif;
        background: #f9faff;
        color: #3a3c47;
        line-height: 1.6;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 0;
      }

      h1 {
        margin-top: 48px;
      }

      form {
        background: #fff;
        max-width: 360px;
        width: 100%;
        padding: 58px 44px;
        border: 1px solid ##e1e2f0;
        border-radius: 4px;
        box-shadow: 0 0 5px 0 rgba(42, 45, 48, 0.12);
        transition: all 0.3s ease;
      }

      .row {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
      }

      .row label {
        font-size: 13px;
        color: #8086a9;
      }

      .row input {
        flex: 1;
        padding: 13px;
        border: 1px solid #d6d8e6;
        border-radius: 4px;
        font-size: 16px;
        transition: all 0.2s ease-out;
      }

      .row input:focus {
        outline: none;
        box-shadow: inset 2px 2px 5px 0 rgba(42, 45, 48, 0.12);
      }

      .row input::placeholder {
        color: #C8CDDF;
      }

      button {
        width: 100%;
        padding: 12px;
        font-size: 18px;
        background: #15C39A;
        color: #fff;
        border: none;
        border-radius: 100px;
        cursor: pointer;
        font-family: 'Open Sans', sans-serif;
        margin-top: 15px;
        transition: background 0.2s ease-out;
      }

      button:hover {
        background: #55D3AC;
      }

      .form-judul  {
        color:transparent;
        text-shadow: 1px 1px 0px #333;
        text-decoration: unset; 
      }

      @media(max-width: 458px) {
        
        body {
          margin: 0 18px;
        }
        
        form {
          background: #f9faff;
          border: none;
          box-shadow: none;
          padding: 20px 0;
        }

      }
    </style>
  </head>
  <body>
    
    <h1>
      <a class="form-judul" href="<?php echo base_url('home'); ?>"><b>PKMPAGBAR</b></a>
    </h1>
      <!-- Error Message -->
      <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      <?php echo validation_errors() ;?>
                  
      <!-- Form Login -->
      <!--<form action="<?php echo base_url(); ?>/adminlte/index2.html" method="post">-->
      <?php echo form_open('auth/cheklogin'); ?>
        <div class="row">
          <label for="email">Email</label>
          <input class="input100" type="email" name="email" placeholder="Email">
        </div>
        <div class="row">
          <label for="password">Password</label>
          <input class="input100" type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="login100-form-btn" aria-hidden="true">Login</button>
      </form>

  </body>
</html>
