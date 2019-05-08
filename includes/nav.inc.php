<header>
  <button class="hamburger">&#9776;</button>
  <button class="cross">&#735;</button>
   <a class="logoSmall" xhref="index.php">CleanSpace</a>
</header>
<div class="menu">
  <ul>
    <a href="#"><li>Home</li></a>
    <a href="#"><li>My Locations</li></a>
    <a href="#"><li>Profile</li></a>
    <a href="#"><li>Terms</li></a>
    <a href="#"><li>Settings</li></a>
    <a href="#"><li class="menu__logout">Logout</li></a>
  </ul>
</div> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $( document ).ready(function() {

      $( ".cross" ).hide();
      $( ".menu" ).hide();
      $( ".hamburger" ).click(function() {
          $( ".menu" ).slideToggle( "slow", function() {
              $( ".hamburger" ).hide();
              $( ".cross" ).show();
          });
      });
      
      $( ".cross" ).click(function() {
          $( ".menu" ).slideToggle( "slow", function() {
              $( ".cross" ).hide();
              $( ".hamburger" ).show();
          });
      });
      
  });
</script>