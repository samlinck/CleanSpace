<header>
  <div id="navToggle">
    <span></span>
    <span></span>
    <span></span>
  </div>
   <a class="logoSmall" xhref="index.php">CleanSpace</a>
</header>
<div class="menu">
  <ul>
    <a href="./index.php"><li>Home</li></a>
    <a href="./locations.php"><li>My Locations</li></a>
    <a href="#"><li>Profile</li></a>
    <a href="#"><li>Terms</li></a>
    <a href="#"><li>Settings</li></a>
    <a href="./logout.php"><li class="menu__logout">Logout</li></a>
  </ul>
</div> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    $( "#navToggle" ).click(function() {
      $(this).toggleClass('open');
      $( ".menu" ).slideToggle( "slow");
    });
});</script>