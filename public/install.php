<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Install fleet</title>

    <!-- Bootstrap core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
          /* Space out content a bit */
      body {
        padding-top: 20px;
        padding-bottom: 20px;
      }

      /* Everything but the jumbotron gets side spacing for mobile first views */
      .header,
      .marketing,
      .footer {
        padding-right: 15px;
        padding-left: 15px;
      }

      /* Custom page header */
      .header {
        border-bottom: 1px solid #e5e5e5;
      }
      /* Make the masthead heading the same height as the navigation */
      .header h3 {
        padding-bottom: 19px;
        margin-top: 0;
        margin-bottom: 0;
        line-height: 40px;
      }

      /* Custom page footer */
      .footer {
        padding-top: 19px;
        color: #777;
        border-top: 1px solid #e5e5e5;
      }

      /* Customize container */
      @media (min-width: 768px) {
        .container {
          max-width: 730px;
        }
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        text-align: center;
        border-bottom: 1px solid #e5e5e5;
      }
      .jumbotron .btn {
        padding: 14px 24px;
        font-size: 21px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 40px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }

      /* Responsive: Portrait tablets and up */
      @media screen and (min-width: 768px) {
        /* Remove the padding we set earlier */
        .header,
        .marketing,
        .footer {
          padding-right: 0;
          padding-left: 0;
        }
        /* Space out the masthead */
        .header {
          margin-bottom: 30px;
        }
        /* Remove the bottom border on the jumbotron for visual effect */
        .jumbotron {
          border-bottom: 0;
        }
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="../">Test page</a></li>
            <li role="presentation"><a href="#help">Help</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Fleet</h3>
      </div>
      <?php
      if (isset($_GET['success'])) :
      ?>
        <div class="alert alert-success" role="alert">Installation performed successfully! 😎 Go to the <a href="../">test page</a> to see your app live.</div>
      <?php endif; ?>
      <?php
      if (isset($_GET['error'])) :
      ?>
        <div class="alert alert-danger" role="alert">Error occurred during installation! See <a href="#help">here</a>.</div>
      <?php endif; ?>
      <?php
        $ROOT = dirname(dirname(__FILE__));
        if(!is_writeable($ROOT)) :
      ?>
        <div class="alert alert-danger" role="alert">Your app directory is not writeable. See <a href="#help">here</a>.</div>
      <?php endif; ?>
      <div class="jumbotron">
        <h1>Install Fleet, now, here...</h1>
        <p class="lead">Fill up this form and your installation of fleet will be ready in seconds...</p>
        <form id="installForm" action="installer.php" role="form" method="POST">
          <div class="form-group">
            <label for="appName">App name</label>
            <input name="appName" type="text" class="form-control" id="appName" placeholder="John's mega app">
          </div>

          <div class="form-group">
            <label for="authorName">Author name</label>
            <input name="authorName" type="text" class="form-control" id="authorName" placeholder="John Doe">
          </div>

          <div class="form-group">
            <label for="appURL">App URL</label>
            <input name="appURL" type="text" class="form-control" id="appURL" placeholder="http://youfleetapp.com">
          </div>

          <div class="form-group">
              <div class="checkbox">
                <label>
                  <input name="needsDBMS" id="needsDBMS" type="checkbox"> My app needs DBMS
                </label>
              </div>
          </div>
          <div id="DBMSPanel" style="display: none;">
            <div class="form-group">
              <label for="dbType">DBMS type</label>
              <input name="dbType" type="text" class="form-control" id="dbType" placeholder="mysql">
            </div>
            <div class="form-group">
              <label for="dbHost">DBMS host</label>
              <input name="dbHost" type="text" class="form-control" id="dbHost" placeholder="127.0.0.1">
            </div>
            <div class="form-group">
              <label for="dbUser">DBMS username</label>
              <input name="dbUser" type="text" class="form-control" id="dbUser" placeholder="root">
            </div>
            <div class="form-group">
              <label for="dbPass">DBMS password</label>
              <input name="dbPass" type="password" class="form-control" id="dbPass" placeholder="asljfa-af787-sadjfa">
            </div>
            <div class="form-group">
              <label for="dbName">Database name</label>
              <input name="dbName" type="text" class="form-control" id="dbName" placeholder="myappdbname">
            </div>
          </div>
          <p><button class="btn btn-lg btn-success" role="button" type="submit">Install</button></p>
        </form>
      </div>

      <div id="help" class="row marketing">
        <div class="col-lg-6">
          <h4>+w</h4>
          <p>In order to be able to write into your app directory you must set ownership of this directory to the user who's running apache.</p>

          <h4>Tip</h4>
          <p>I usually add my user to the same group of apache's user. Doing this I can modify any file belonging to apache easily and without sudo.</p>

        </div>

        <div class="col-lg-6">
          <h4>0775</h4>
          <p>It is useful to set permission to 775 in order to avoid writing with sudo and stupid alerts popping up.</p>


          <h4>What this page does</h4>
          <p>This page simply writes for you the app.ini file. This file is used by fleet as a configuration file. You can edit app.ini file using this page or any other text editor.</p>

        </div>
      </div>

      <footer class="footer">
        <p>All rights reserved &copy; Matteo Merola 2014</p>
      </footer>

      <script>
        var errorClass = " has-error";
        var needsDBMS = document.getElementById("needsDBMS");
        var DBMSPanel = document.getElementById("DBMSPanel");
        needsDBMS.onchange = function() {
          if(needsDBMS.checked==true) {
            DBMSPanel.style.display = "block";
          } else {
            DBMSPanel.style.display = "none";
          }
        };
        var installForm = document.getElementById("installForm");
        var appName = installForm.appName;
        var authorName = installForm.authorName;
        var appURL = installForm.appURL;
        var dbType = installForm.dbType;
        var dbHost = installForm.dbHost;
        var dbUser = installForm.dbUser;
        var dbPass = installForm.dbPass;
        var dbName = installForm.dbName;
        installForm.onsubmit = function() { return checkFields(); };
        var inputs = document.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
          if(inputs[i].type=="text" || inputs[i].type=="password") {

            inputs[i].onkeypress = function() {
                this.parentNode.className = this.parentNode.className.replace(errorClass, "");
              };
          }
        }

        function checkFields() {
          var valid = true;
          if (appName.value.length < 1) {
            appName.parentNode.className += errorClass;
            valid = false;
          }
          if (authorName.value.length < 1) {
            authorName.parentNode.className += errorClass;
            valid = false;
          }
          if (!isValidUrl(appURL.value)) {
            appURL.parentNode.className += errorClass;
            valid = false;
          }
          if(needsDBMS.checked==false)
            return valid;
          if (dbType.value.toUpperCase()!="MYSQL") {
            dbType.parentNode.className += errorClass;
            valid = false;
          }
          ValidIpAddressRegex = "^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$";
          ValidHostnameRegex = "^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$";
          if (!dbHost.value.match(ValidIpAddressRegex) && !dbHost.value.match(ValidHostnameRegex)) {
            dbHost.parentNode.className += errorClass;
            valid = false;
          }
          if (dbUser.value.length < 1) {
            dbUser.parentNode.className += errorClass;
            valid = false;
          }
          if (dbPass.value.length < 1) {
            dbPass.parentNode.className += errorClass;
            valid = false;
          }
          if (dbName.value.length < 1) {
            dbName.parentNode.className += errorClass;
            valid = false;
          }
          return valid;
        }

        function isValidUrl(url) {
          return url.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
        }
      </script>
    </div> <!-- /container -->
  </body>
</html>
