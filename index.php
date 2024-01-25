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

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <!-- Main style -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>

        <?php foreach ($hotels as $hotel) { ?>
            <div>
                <p> <?php echo $hotel['name']?></p>
                <p> <?php echo $hotel['description']?></p>
                <p> <?php echo $hotel['parking']?></p>
                <p> <?php echo $hotel['vote']?></p>
                <p> <?php echo $hotel['distance_to_center']?></p>
            </div>
            
        <?php } ?>
    </main>
</body>
</html>