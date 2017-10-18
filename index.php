<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="subway-2-bg">
<div class="row subway-2">
    <div class="col-xs-10 bg-success col-xs-offset-1 subway-1-bg">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 container">
                <div class="jumbotron">
                    <h1><span class="subway-1">Subway</span> <span class="subway-2">Roulette</span></h1>
                </div>
            </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1 bg-warning content">
<?php
$breads = array("9-Grain Wheat", "Multi-grain Flat", "Italian", "Italian Herbs and cheese", "Flat");
$sauces = array("Chipotle Southwest", "Light Mayo", "Mayo", "Ranch",
    "Oil", "Subway Vinaigrette", "Mustard", "Vinegar", "Sweet Onion",
    "BBQ", "Creamy italian", "Golden italian", "Honey Mustard", "Savory Caesar" , "Sriracha", "Tzatziki Cucumber");
$veggies = array("Cucumbers", "Green Peppers", "Lettuce", "Red Onions", "Spinach", "Tomatoes", "Banana Peppers", "Jalapenos", "Black Olives", "Pickles");
$sandwiches = array("Black Forest Ham", "Chicken and Bacon Ranch Melt", "Cold Cut Combo", "Italian BMT", "Meatball Marinara", "Oven Roasted Chicken",
    "Roast Beef", "Rotisserie-Style Chicken", "Spicy Italian", "Steak and Cheese", "Subway Club", "Sweet Onion Chicken Teriyaki",
    "Classic Tuna", "Turkey Breast");

if (!isset($_GET['numSauce'])) {
    echo '<form action="?" method="get">
            <label for="numSauce">Number of Sauces: </label>
            <input type="number" value="1" min="0" max="17" name="numSauce" /><br />
            
            <label for="numVeggies">Number of Veggies: </label>
            <input type="number" value="1" min="0" max="10" name="numVeggies" /><br />
            
            <label for="random">Randomize: </label>
            <input type="checkbox" name="random"><br />
            <input type="submit" value="Roll"/>
</form>';

} else {
    if (isset($_GET['random'])) {
        $_GET['numSauce'] = rand(0, count($sauces));
        $_GET['numVeggies'] = rand(0, count($veggies));
    }
    $sandwichChoice = $sandwiches[rand(0, count($sandwiches) - 1)];
    $breadChoice = $breads[rand(0, 4)];
    $sauceChoices = array_fill(0, $_GET['numSauce'], "");
    $veggieChoices = array_fill(0, $_GET['numVeggies'], "");

    for ($i = 0; $i < $_GET['numSauce']; $i++) {
        $addSauce = $sauces[rand(0, 15)];
        while (in_array($addSauce, $sauceChoices)) {
            $addSauce = $sauces[rand(0, 15)];
        }
        $sauceChoices[$i] = $addSauce;
    }

    for ($i = 0; $i < $_GET['numVeggies']; $i++) {
        $addVeggie = $veggies[rand(0, 9)];
        while (in_array($addVeggie, $veggieChoices)) {
            $addVeggie = $veggies[rand(0, 9)];
        }
        $veggieChoices[$i] = $addVeggie;
    }
    echo "
    <h1>Result:</h1>
    <h2>$sandwichChoice sandwich with:</h2>
    <ul>
    ";

    if (0 == count($veggieChoices)) {
        echo "No Veggies<br />";
    }

    foreach ($veggieChoices as $veg) {
        echo "<li>$veg</li>";
    }

    if (0 != count($sauceChoices)) {
            echo "
            </ul>
            <p>With these sauces: </p>
            <ul>
            ";
    } else {
        echo "And no sauces.";
    }
    foreach ($sauceChoices as $s) {
        echo "<li>$s</li>";
    }
}
?>
        </div>
    </div>
</div>
</body>
</html>


