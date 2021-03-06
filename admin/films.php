<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Netflox.it Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link href="../bs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    // start a session
    session_start();
    if (isset($_SESSION['admin'])) {
    ?>

        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Netflox.it Admin</h3>
                    <strong>NF</strong>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="members.php">
                            <i class="fas fa-users"></i>
                            Members
                        </a>
                    </li>
                    <li>
                        <a href="films.php">
                            <i class="fas fa-film"></i>
                            Movies
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="../index.php" class="article">Back to site</a>
                    </li>
                </ul>
            </nav>


            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        </div>
                    </div>
                </nav>

                <h2>Movies</h2>

                <?php
                if (isset($_POST['submit'])) {
                    $idfilm = $_POST['idfilm'];
                    $handle = curl_init();
                    $url = "http://www.omdbapi.com/?apikey=7f5af071&i=$idfilm";

                    // Set the url
                    curl_setopt($handle, CURLOPT_URL, $url);

                    // Set the result output to be a string
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                    $output = curl_exec($handle);
                    curl_close($handle);

                    $obj = json_decode($output, true);
                    $title = $obj["Title"];
                    $year = $obj["Year"];
                    $genre = $obj["Genre"];

                    include '../dbcon.php';
                    $query = "INSERT INTO Films (idfilm,title,year,genre) VALUES ('$idfilm','$title','$year','$genre')";

                    if (mysqli_query($connection, $query)) {
                        header("Refresh:5; url=films.php", true, 303);
                        printf("\n <div class=\"alert alert-success\" role=\"alert\"><h3>
        Movie added successfully. </h3></div> ");
                    } else {
                        header("Refresh:5; url=films.php", true, 303);
                        printf("\n <div class=\"alert alert-warning\" role=\"alert\"><h3>
        Ops, something went wrong! </h3></div> ");
                    }
                }
                ?>

                <br />
                <form class="d-flex" action="films.php" method="post">
                    <input type="search" id="idfilm" placeholder="Insert Movie ID (IMDB)" class="form-control me-2" aria-label="Search" name="idfilm"><br>
                    <input type="submit" class="btn btn-outline-success" name="submit" value="Add">



                </form>
                <br />
                <br />
                <div class="tabella">
                    <table id="members" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>IMDB</th>
                                <th>Title</th>
                                <th>Year</th>
                                <th>Genre</th>
                                <th>#</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#members').DataTable({
                            "ajax": 'filmsdata.php'
                        });
                    });
                </script>

                <div class="line"></div>

            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>

    <?php
    } else
        printf("\n <div class=\"alert alert-warning\" role=\"alert\"><h3> User not authorized.</h3></div> ");
    ?>
</body>
</html>
