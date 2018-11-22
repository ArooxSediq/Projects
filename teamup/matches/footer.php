<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

<div style="width:100%;height:10%;"></div>

<div id="footer">
  <div class="navbar-inverse fixed-bottom">
  <div class="row justify-content-center" id="bottomNav">
      <style>
          .btn > img{
              width:25px;
          }
          
          @media only screen and (max-width: 600px) {
                .btn > img{
                      width:20px;
                    }
         
            }

      </style>
      
    <div class="col-3 "><a class="btn btn-outline-light" href="index.php"><img src="../img/home.png"><text class="d-none d-md-block">Feed</text> </a></div>
    <div class="col-3 "><a class="btn btn-outline-light" href="profile.php"><img src="../img/profile.png"><text class="d-none d-md-block">My games</text></a></div>
    <div class="col-3"><a class="btn btn-outline-light" href="create.php"><img src="../img/create.png"><text class="d-none d-md-block">Create</text></a></div>
      <?php 
          if(isset($_SESSION['username']))
            echo "<div class=\"col-xs-3  \"><a class=\"btn btn-outline-light\" href=\"../logout.php\"><img src=\"../img/logout.png\"><text class=\"d-none d-md-block\">Log out</text></a></div>";
          else
            echo "<div class=\"col-xs-3 \"><a class=\"btn btn-outline-light\" href=\"../\"><img src=\"../img/login.png\"><text class=\"d-none d-md-block\">Log in</text></a></div>";
         ?>
  </div>
  </div>
</div>

      
      


	<!--<nav class="site-header sticky-top py-1 droid-arabic-kufi">-->
 <!--     <div class="container  d-block mx-auto center-block text-center " style="padding: 0.5%;">-->
 <!--        <a class="py-2  d-inline-block" href="index"> <h4 class="navtext">	الصفحة الرئيسية	</h4></a>-->
 <!--       <a class="py-2  d-inline-block" href="programs"> <h4 class="navtext">	برامج</h4> </a>-->
 <!--       <a class="py-2  d-inline-block" href="news/all"> <h4 class="navtext">	أخبار		</h4></a>-->
 <!--         <a class="py-2  d-inline-block" href="about"> <h4 class="navtext">	من نحن		</h4></a>-->
        <!--<a class="py-2 d-inline-block" href="#"> <h4 style="font-size: 2vw;">		أراء		</h4></a>-->
        <!-- <a class="py-2 d-none d-md-inline-block" href="#">About us</a> -->
 <!--     </div>-->
 <!--   </nav>-->