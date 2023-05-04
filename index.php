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

$parking = $_GET['parking'];
$vote = $_GET['vote'];

if ($vote == '') {
    $vote = 0;
} elseif ($vote > 5) {
    $vote = 5;
} else {
    $vote = ceil($vote);
}

var_dump($parking);
var_dump($vote);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <header>
        <h1 class="text-center py-5">Hotel finder</h1>

        <div class="container pb-5 text-end">
            <form action="" method="get">
                <label class="btn btn-primary p-2">
                    <input type="checkbox" class="me-2" name="parking" id="parking" autocomplete="off"> Parking
                </label>

                <label for="vote" class="btn btn-primary">
                    <input type="number" class="me-2" name="vote" id="vote" placeholder="Add 1 to 5" min="0" max="5">
                    Vote
                </label>
                <button type="submit" class="btn btn-warning">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </header>

    <main>
        <div class="container">

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center in km</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($hotels as $index => $hotel) : ?>
                        <?php if (($parking == 'on' && $hotel["parking"] === false) && ($hotel["vote"] < $vote)) {
                            echo '<tr class="d-none">';
                        } elseif (($parking == 'on' && $hotel["parking"] === false) || ($hotel["vote"] < $vote)) {
                            echo '<tr class="d-none">';
                        } else {
                            echo "<tr>";
                        } ?>

                        <th scope="row"> <?php echo $index + 1 ?> </th>

                        <?php foreach ($hotel as $key => $value) : ?>
                            <td>
                                <?php
                                /* if for checking parking. If value === true parking exist, === false don't exist. For other case print the value. */
                                if ($value === true) {
                                    echo 'Free parking';
                                } elseif ($value === false) {
                                    echo 'Not avaible';
                                } else {
                                    echo $value;
                                }
                                ?>
                            </td>
                        <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

        </div>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/disjs/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>