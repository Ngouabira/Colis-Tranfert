<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./assets/node_modules/mdi/css/materialdesignicons.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./assets/images/favicon.png" />
</head>

<body>
  <div class="body-wrapper">
    <div class="page-wrapper">
      <main class="content-wrapper auth-screen">
        <div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
							<div class="mdc-card">
								<section class="mdc-card__primary bg-white">

                <!-- action="http://localhost/livraison/?view=user&action=login" -->
                  <form  method="POST">
                    <div class="mdc-layout-grid">
            					<div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="email" name="email" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Email</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="password" name="password" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Password</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <button id="login" name="login" class="mdc-button mdc-button--raised w-100" data-mdc-auto-init="MDCRipple">
                            Login
                          </button>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                        <a href="http://localhost/livraison/?view=register">Register</a>
                          </div>
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 d-flex align-item-center justify-content-end">
                            <a href="http://localhost/livraison/?view=forgotPassword">Forgot Password</a>
                          </div>
            					</div>
            				</div>
                  </form>
								</section>
							</div>
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
					</div>
				</div>
      </main>
    </div>
  </div>

  <script>

    $(document).ready(function(){


      $("#login").click(function (e) { 
        e.preventDefault();

      $.post("http://localhost/livraison/?action=login",
      {
        email: "ngouabira@gmail.com",
        password: "1234"
      },
      // function(data, status){

      //   if(data=="ok") {

      //     location.href="http://localhost/livraison/?view=user"
          
      //   } else {

      //     alert("Data: " + data + "\nStatus: " + status);
      //   }
        
      // }

      ).done((data,status)=> 
      
      
      {
       

  if(data.trim()=="ok") {

    location.href="http://localhost/livraison/?view=user"
    
  } else {

    alert("Data: " + data + "\nStatus: " + status);
  }
  
}
      
      
      
      )
      ;
        
      });

    })

  </script>

  <!-- body wrapper -->
   <!-- plugins:js -->
  <script src="./assets/node_modules/material-components-web/dist/material-components-web.min.js"></script>
  <script src="./assets/node_modules/jquery/dist/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="./assets/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/node_modules/progressbar.js/dist/progressbar.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="./assets/js/misc.js"></script>
  <script src="./assets/js/material.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>