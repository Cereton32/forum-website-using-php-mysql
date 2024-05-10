<?php
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"> DiscussWidAbhishek </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> </span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="component/about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="threadlist.php?catid=1">Pyhton</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="threadlist.php?catid=2">Javascript</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="threadlist.php?catid=3">PHP</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="threadlist.php?catid=4">Ruby</a>
          
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="component/contact.php">Contact</a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-success ml-2 " data-toggle="modal" data-target="#loginModal" >Login</button>
    <button class="btn btn-success mx-2 " data-toggle="modal" data-target="#signupModal" >Signup</button>
  </div>
</nav>


';
 include 'loginModal.php';
 include 'signupModal.php';
?>