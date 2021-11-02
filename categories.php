<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>iVaccines - Vacines Forum</title>
</head>

<body>

  <?php include 'partials/_header.php'; ?>

  <?php include 'database/connect_to_database.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


   <!--categories are here-->
   <div class="container my-3">
        <h2 class="text-center my-3">iVaccines - Browse Categories</h2>
        <h3 class="text-center my-3">Most Popular</h2>
            <hr>
            <div class="row">
              <!-- use a for loop to iterate through categories-->
              <!--show top 3 according to numbr of comments-->
              <?php 
              $sql = "SELECT * FROM `covid_vaccines` ORDER BY `num_comments` DESC;"; 
              $result = mysqli_query($con, $sql);
              $num_rows = mysqli_num_rows($result);
              for($i=0; $i<$num_rows; $i++){
                  $row = mysqli_fetch_assoc($result);
                  $vaccineName = $row['vaccine_name'];
                  $vaccineId = $row['vaccine_id'];
                  $image = $row['image_id'];
                  $vaccineDesc= $row['vaccine_description'];

                  echo  ' <div class="col-md-4 my-2">
                            <div class="card" style="width: 18rem;">
                              <img src='.$image.' class="card-img-top" alt="...">
                              <div class = "card-body">
                                <h5 class="card-title"> '.$vaccineName.'</h5>
                                <p class="card-text">'.substr($vaccineDesc, 0, 120).'... </p>
                                <a href="threads.php?vaccineId='.$vaccineId.'" class="btn btn-primary btn-center">View Threads</a>
                              </div>
                            </div>
                          </div>
                  ';
                }   
              ?>
                <div class="col-md-4 my-2">

                </div>
            </div>

    </div>



  <?php include 'partials/_footer.php'; ?>

</body>

</html>