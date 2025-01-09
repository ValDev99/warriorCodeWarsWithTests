<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Warrior\Warrior;

    $bruce_lee = new Warrior();

    $bruce_lee->getLevel();

    echo "Level: " . $bruce_lee->getLevel() . "<br>";
    echo "Experience: " . $bruce_lee->getExperience() . "<br>";
    echo "Rank: " . $bruce_lee->getRank() . "<br>";

    ?>
</body>

</html>