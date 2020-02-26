<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>ExpenseAnalyzer |Contact</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><a href="landingPage.php"><img src="logo-3.png" alt="ExpenseAnalyzer" width="50" height="50"></a></h1>
        </div>
        <div id="branding">
          <h1><span class="highlight">Expense</span>Analyzer</h1>
        </div>
        <nav>
          <ul>
            <li><a href="landingPage.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="loginPage.php">Login</a></li>
            <li><a href="registerPage.php">Signup</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section id="main">
      <div class="col-1 container1">
          <center><h1 class="page-title">CONTACT US</h1></center>
          <div class="contact">
              <form class="" action="contactustomail.php" method="post">
                  <table>
                        <tr>
                            <td>
                                Full Name:
                            </td>
                            <td>
                                <input type="text" placeholder="Name" id="name" name="name" value"" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Mobile No.:
                            </td>
                            <td>
                                <input type="text" placeholder="Mobile No" id="mobno"name="mobno" value"" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               Email Id:
                            </td>
                            <td>
                                <input type="email" placeholder="xyz@gmail.com" id="email "name="email" value"" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Subject:
                            </td>
                            <td>
                              <input type="textarea" placeholder="Subject" id="subject" cols="50" rows="30" name="subject" value"" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Message:
                            </td>
                            <td>
                              <textarea id="body" placeholder="Type Your Message here"name="body" rows="4" cols="35"></textarea>
                            </td>
                        </tr>
                  </table>
                        <button class="btn" type="submit" name="submit">Submit</button>
                        <button class="btn" type="reset" name="reset">Reset</button>
              </form>
              <span style="color:white;"><?php if(isset($_SESSION['response'])){ echo $_SESSION['response'];} ?></span>
              <span style="color:white;"><?php if(isset($_SESSION['successMsg3'])){ echo $_SESSION['successMsg'];unset($_SESSION['successMsg3']);} ?></span>
          </div>
          <script src="http://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
          <script type="text/javascript">
                  function sendEmail(){

                    var name = $("#name");
                    var email = $("#email");
                    var subject = $("#subject");
                    var body = $("#body");
                    if(isNotEmpty(name)&& isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
                      $.ajax({
                        url:'contactustomail.php',
                        method:'post',
                        dataType:'json',
                        data:{
                          nmae:name.val(),
                          email:email.val(),
                          subject:subject.val(),
                          body:body.val()
                        },success:function(response){
                            console.log(response);
                        }
                      })
                    }
                }
                function isNotEmpty(caller){
                  if(caller.val()==''){
                    caller.css('border','1px solid red');
                    return false;
                  } else
                    caller.css('border' ,'');
                  return true;
                }
          </script>
      </div>
    </section>

    <footer>
      <p style="padding:20px;color:#ffffff;background-color:#006666;text-align: center;">ExpenseAnalyzer, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
