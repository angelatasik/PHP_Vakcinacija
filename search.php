<?php
session_start();
// ako ne postoi username vrati odma na index page, extra security layer
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <style>
            .container{
                min-height: 100vh;
            }
        </style>
    <title>iVaccines - Vacines Forum</title>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'database/connect_to_database.php'; ?>

    <!-- search result -->
    <div class="container my-3">
             <h1>Search results for <em>"<?php echo $_GET['search']?>"</em></h1>
        
             <?php 
             $noresults = true;
             $query = $_GET["search"];
             //$_GET["search"]
             $sql = "select * from threads where match (thread_title, thread_description) against ('$query')";
             $result = mysqli_query($con, $sql);
             while ($row = mysqli_fetch_assoc($result)) {
                $threadTitle = $row['thread_title'];
                $threadDesc = $row['thread_description'];
                $thread_id= $row['thread_id'];
                $url = "single_thread.php?threadid=". $thread_id;
                $noresults = false;
        //Display the search result
                echo '<div class="result">
                    <h3> <a href=" '. $url.' " class="text-dark">'. $threadTitle. '</a></h3>
                    <p>'. $threadDesc.'</p>
                    </div>';
                }

                if ($noresults){
                    echo '<div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <p class="display-4">No Result Found</p>
                                <p class="lead"> Suggestions: <ul>

                                                    <li>Make sure that all words are spelled correctly.</li>
                                                    <li>Try different keywords.</li>
                                                    <li>Try more general keywords.</li> </ul>
                                </p>
                            </div>
                            </div>';
                }
            ?>
        
    </div>



    <?php include 'partials/_footer.php'; ?>

</body>

</html>