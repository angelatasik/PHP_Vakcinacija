<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./css/threads.css?v=<?=time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>iVaccines - Vacines Forum</title>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'database/connect_to_database.php'; ?>
    <?php include 'partials/_footer.php'; ?>

    <?php
    $vaccine_id = $_GET['vaccineId'];
    $sql = "SELECT * FROM `covid_vaccines` WHERE vaccine_id = $vaccine_id";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $vaccineName = $row['vaccine_name'];
        $vaccineDesc = $row['vaccine_description'];
    }
    ?>

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST'){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $username = $_POST['username'];
        $sql = "INSERT INTO `threads` (`thread_vaccine_id`, `thread_title`, `thread_description`, `thread_user_id`, `timestamp`) VALUES ('$vaccine_id', '$th_title', '$th_desc', '$username', current_timestamp())";
        $result = mysqli_query($con, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            ';
        }
    }
?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 text-center">Welcome to <?php echo $vaccineName ?> forum!</h1>
            <p class="lead text-center">This forum is to share your thoughts about the vaccine. Please contribute and
                share
                your knowledge or experience.</p>
            <hr class="my-4">

            <p class="text-center">Please follow a few simple rules for everyone's benefit. This is a peer to peer
                forum.
                No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other
                members at all times</p>

        </div>

    </div>

    <hr>


    <div class="container">
        <h1>Browse Questions</h1>
        <br>

        <?php
        $vaccine_id = $_GET['vaccineId'];
        $sql = "SELECT * FROM `threads` WHERE thread_vaccine_id=$vaccine_id ORDER BY `timestamp` DESC";
        $result = mysqli_query($con, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $threadTitle = $row['thread_title'];
            $threadDesc = $row['thread_description'];
            $threadId = $row['thread_id'];
            $thread_time = $row['timestamp'];
            $th_user = $row['thread_user_id'];


            echo '<div class="media my-3">
            <img src="images/user_default.jpg" width="54px" class="mr-3" alt="...">
            <div class="media-body">
            
                <h5 class="my-0"><a class = "text-dark" href="single_thread.php?threadid='.$threadId.'">'.$threadTitle .'</a></h5>
                '.$threadDesc.'
            </div>'.'<div class = "font-weight-bold my-0"> Asked by: '.$th_user.' at '.$thread_time.'</div>
        </div>';
        }

        if ($noResult){
           echo 
           '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4 text-center">No Results Found</h1>
                  <p class="lead text-center">Be the first person to ask a question </p>
                </div>
            </div>';
          
        }
        ?>

        

    </div>

    <hr>
    <div class="container ask">
        <h1 class="margin" >Ask a question</h1>


        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" style="color:white" >Question or Discussion</label>
                <input class="form-control" id="title" name="title" placeholder=" ">
                <small id="emailHelp" class="form-text" style="color:azure">Keep you title as clear as you can so others can find
                    it more easily.</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextArea1" style="color:white">Elaborate Your Problem or Experience</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder=" "></textarea>
                <input type="hidden" name="username" value="' .$_SESSION['username']. '">
            </div>
            <button type="submit" class="btn btn-primary submit">Submit</button>
        </form>
    </div>

</body>