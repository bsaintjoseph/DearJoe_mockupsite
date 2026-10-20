<?php
echo'<header id="home">
<div class="navbar-fixed ">   
  <nav class="nav-wrapper highlight  brown darken-1">      
    <div class="container">
    <a href="index.php?test" class="brand-logo">
    <img src=".\assets\logo dear joe white.png" alt="Logo">
    
    </a>
      <a href="index.php?test" class="logo-text scrollspy">DEAR JOE</a>
      <a href="" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons">menu</i></a>
      
      <ul id="dropdown1" class="dropdown-content ">
  
      
      <li><a href="index.php?test">All</a></li>
      <li class="divider"></li>
  <li><a href="index.php?beverage2">Beverages</a></li>
  <li class="divider"></li>
  <li><a href="index.php?meal2">Meals</a></li>

  
  
</ul>

      <ul class="right hide-on-med-and-down logo-text">
      <li><a href="/DearJoeFinal2"><i class="material-icons left">home</i>Home</a></li>
   
      <li><a href="#about"><i class="material-icons left">info</i>About</a></li>
      <li><a href="index.php?contact"><i class="material-icons left">phone</i>Contact</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
        <a class="waves-effect waves-light btn-large btn-flat cart tooltipped" data-position="bottom" data-tooltip="Cart" href="index.php?cart">
        <i class="material-icons">shopping_cart</i>
    <sup></sup>&nbsp;
    
</a>
<button data-target="modal1" class="btn modal-trigger btn-large btn-flat  tooltipped" data-position="bottom" data-tooltip="How to Order"><span class="material-icons">
help_outline
</span></button>
       
      </ul>
      
    </div>     
  </nav>
  

</header>';
?>
