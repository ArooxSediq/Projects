
    	
    <nav class="navbar navbar-expand-lg navbar-dark site-header sticky-top" >
      <a class="navbar-brand" href="/">TEAM UP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavAltMarkup" style="margin-right: 5%;">
        <div class="navbar-nav">
          <a class="nav-item nav-link navtext" href="matches/index.php">Home</a>
          <a class="nav-item nav-link navtext" href="mathces/profile.php">My Matches</a>
          <a class="nav-item nav-link navtext" href="matches/create.php">Create A Match</a>
         <?php 
          if(isset($_SESSION['username']))
            echo "<a class=\"nav-item nav-link navtext\" href=\"logout.php\">Logout</a>";
          else
            echo "<a class=\"nav-item nav-link navtext\" href=\"index.php\">Login</a>";
         ?>

          
    
        </div>
      </div>
    </nav>

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