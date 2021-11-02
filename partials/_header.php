<html>
<head>
  <link rel="stylesheet" type="text/css" href="./css/nav_bar.css?v=<?=time();?>"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<?php


include 'database/connect_to_database.php';

$sql = "SELECT * FROM `covid_vaccines` ORDER BY `num_comments` DESC;"; 
$result = mysqli_query($con, $sql);
            
$nav = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="homepage.php">iVaccines</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About iVaccines</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php" tabindex="-1">Get more infos</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="categories.php">Categories</a>
      </li>
    </ul>
    <form class="d-flex" method="get" action="search.php">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    <a class="btn btn-outline-success" href="logout.php">Log Out </a>
    </div>
</div>
</nav>';

echo $nav;

?>

</html>