<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./css/threads.css?v=<?=time();?>"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>iVaccines - Vacines Forum</title>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'database/connect_to_database.php'; ?>
    <?php include 'partials/_footer.php'; ?>

    <?php
    $threadId = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$threadId";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $threadTitle = $row['thread_title'];
        $threadDesc = $row['thread_description'];
        $th_user = $row['thread_user_id'];
        $thread_time = $row['timestamp'];
        echo '<div class="media my-3">
        <img src="images/user_default.jpg" width="54px" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="my-0"><a class = "text-dark" href="single_thread.php?threadid='.$threadId.'">'.$threadTitle .'</a></h5>
            '.$threadDesc.'
        </div>'.'<div class = "font-weight-bold my-0"> Asked by: '.$th_user.' at '.$thread_time.'</div>
    </div>';
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST'){
        $comment = $_POST['comment'];
        $username = $_POST['username'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`, `comment_user_id`) VALUES ('$comment', '$id', current_timestamp(), '$username');";
        $result = mysqli_query($con, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Success!</strong> Your comment has been added! 
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
            }
        }
    ?>

<hr>
    <div class="container ask">
        <h1 class="margin" >Post a comment</h1>

        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            
            <div class="form-group">
                <label for="exampleFormControlTextArea1" style="color:white">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder=" "></textarea>
                <input type="hidden" name="username" value="' .$_SESSION['username']. '">
            </div>
            <button type="submit" class="btn btn-primary submit">Post comment</button>
        </form>
    </div>

<hr>
    <div class="container">
        <h1 class="margin">Discussions</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($con, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $user = $row['comment_user_id'];
            $comment_time = $row['comment_time'];

            echo '<div class="media my-3">
                <img src="images/user_default.jpg" width="54px" class="mr-3" alt="...">
                <div class="media-body">
                    <p class="font-weight-bold my-0">'.$user.' at '.$comment_time.' </p>'.$content.'
                </div>
            </div>';
        }
        
        if ($noResult){
            echo 
            '<div class="jumbotron jumbotron-fluid">
                 <div class="container">
                   <h1 class="display-4 text-center">No Comments Found</h1>
                   <p class="lead text-center">Be the first person to comment</p>
                 </div>
             </div>';
           
         }

        ?>
    </div>


</body>