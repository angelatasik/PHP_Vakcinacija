<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>iVaccines - Vacines Forum</title>
  <style>
      .container{
          min-height: 80vh;
      }
  </style>
</head>

<body>
    
  <?php include 'partials/_header.php'; ?>
  <?php include 'database/connect_to_database.php'; ?>

<div class ="container">
<h1 class="text-center">Send email for more informations about vaccines</h1>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="eHelthMK@gmail.com">
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Put your questions here</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button class="btn btn-success">Submit</button>
</div>


  <?php include 'partials/_footer.php'; ?>

</body>

</html>