<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parking_filter = isset($_GET["parking-filter"]) ? $_GET["parking-filter"] : null;
    var_dump($_GET);

    function has_parking($array) {

        if ($array['parking'] == true) {
            return $array;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-hotel-BONUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <!-- header -->
    <header style="height: 90px; background-color: rgba(0, 0, 0, 0.95)">
        <h2 class="text-center" style="line-height: 90px; color: coral;">BoolNB-BONUS</h2>
    </header>

    <!-- filter bar -->
    <header style="height: 50px; background-color: rgba(0, 0, 0, 0.95); color: coral;">
        <div class="container d-flex justify-content-center align-items-center">

            <h3 class="me-4 fs-5">FILTERS:</h4>
            
            <!-- form -->
            <form action="./bonus.php" method="GET">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="me-1" name="parking-filter" checked>
                    <label for="parking-filter">Parking</label>
                </div>
                <button type="submit" class="btn btn-primary ms-4">Submit</button>
            </form>

        </div>
    </header>

    <!-- start main -->
    <main class="pt-5" style="height: calc(100vh - 90px); background-color: coral;">

        <div class="container">

            <table class="table">

                <thead>
                    <tr>

                        <!-- table head keys -->
                        <?php
                        foreach ($hotels[0] as $key => $value) {
                            ?>
                                <th scope="col"><?php  echo $key; ?></th>
                            <?php
                        }
                        ?>

                    </tr>
                </thead>
                <tbody>

                    <!-- table rows and tds -->
                    <?php
                    foreach ($hotels as $hotel) {
                        ?>

                        <tr>

                            <?php
                            foreach ($hotel as $key => $value) {

                                if (array_filter($hotel, "has_parking")) {

                                    ?>
                                        <td><?php  

                                        if ($key == "parking") {

                                            if ($value == true) {
                                                echo "yes";
                                            } else {
                                                echo "no";
                                            }

                                        }  else {
                                            echo $value; 
                                        }
                                        
                                        ?></td>
                                    <?php
                                    
                                } else {
                                    break;
                                }
                            }
                            ?>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </main>
    <!-- end main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>