<?php

// Array delle strutture
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

$filtered_hotels = $hotels;

// Filtraggio parcheggi
if (isset($_GET['parking']) && $_GET['parking'] != '') {

    // Array temporaneo
    $newHotels = [];

    // Recupero il valore della select
    $parking = $_GET['parking'];

    // Funzione di filter var che converte la stringa in valore booleano
    $parking = filter_var($parking, FILTER_VALIDATE_BOOLEAN);

    // Ciclo l'array degli hotel
    foreach ($filtered_hotels as $hotel) {

        // Applico la condizione agli hotel filtrati
        if ($hotel['parking'] == $parking) {

            // Aggiungo gli oggetti filtrati dentro l'array
            $newHotels[] = $hotel;
        };
    }

    // Ri-popolo l'array degli hotel filtrati con quello temporaneo
    $filtered_hotels = $newHotels;
}

// Filtraggio valutazione
if (isset($_GET['vote']) && $_GET['vote'] != '') {

    // Array temporaneo
    $newHotels = [];

    // Recupero il valore della select
    $vote = $_GET['vote'];

    // Ciclo l'array degli hotel filtrati
    foreach ($filtered_hotels as $hotel) {

        // Applico la condizione agli hotel
        if ($hotel['vote'] >= $vote) {

            // Aggiungo gli oggetti filtrati dentro l'array
            $newHotels[] = $hotel;
        };
    }

    // Ri-popolo l'array degli hotel filtrati con quello temporaneo
    $filtered_hotels = $newHotels;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <!-- Main style -->
    <link rel="stylesheet" href="./style/style.css">
    <!-- Cdn's -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- HEADER -->
    <?php include './header.php' ?>

    <!-- MAIN -->
    <main>
        <div class="container">
            <div class="row">

                <!-- PARKINGFORM -->
                <div class="col-6 mt-4">
                    <form action="./index.php" method="GET">

                        <div>
                            <label for="parking" class=" form-label text-white">Parcheggio:</label>
                            <select class="w-25 form-select " name="parking" id="parking">
                                <option value="">Parcheggio</option>
                                <option value="true">Si</option>
                                <option value="false">No</option>
                            </select>
                        </div>

                        <div class="py-4">
                            <label for="vote" class="form-label text-white">Voto:</label>
                            <select class="w-25 form-select " name="vote" id="vote">
                                <option value="">Valutazione:</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-secondary">Filtra</button>
                        </div>
                    </form>
                </div>

                <!-- HOTEL INFORMATION TABLE -->
                <div class="col-12">
                    <div class="my-5">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Parcheggio</th>
                                    <th>Voto</th>
                                    <th>Distanza dal centro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($filtered_hotels as $hotel) { ?>
                                    <tr>
                                        <td> <?php echo $hotel['name'] ?></td>
                                        <td> <?php echo $hotel['description'] ?></td>
                                        <td> <?php echo $hotel['parking'] == true ? 'Si' : 'No' ?></td>
                                        <td> <?php echo $hotel['vote'] ?></td>
                                        <td> <?php echo $hotel['distance_to_center'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include './footer.php' ?>
</body>

</html>