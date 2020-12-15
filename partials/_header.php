<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/My-Forum">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/My-Forum">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Top-Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

            $sql = "SELECT Category_name, Category_id FROM `categories` LIMIT 5";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<a class="dropdown-item" href="thread_list.php?catid=' .$row['Category_id']. '">' .$row['Category_name']. '</a>';
            }
            echo '</div>
        <li class="nav-item">
            <a class="nav-link" href="contacts.php">Contact</a>
        </li>
    </ul>
    <div class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){
        echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
        <p class="text-light my-0 mx-2"> Welcome ' .$_SESSION['useremail']. '</p>
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Log-out</a>
        </form>';
    }
    else{
        echo '<form class="form-inline my-2  my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginMondal">Log-in</div>
        <div class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupMondal">Signup</div>';
    }

    echo '</div>

</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
    <strong>Success</strong> You are successfully done the signup process. Now you can login.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}