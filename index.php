<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
    <div class="col-xs-10 bg-success col-xs-offset-1">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <h1>Subway Roulette</h1>
            </div>
        </div>
<?php
$breads = array("9-Grain Wheat", "Multi-grain Flatbread", "Italian", "Italian Herbs and cheese", "Flatbread");
$sauces = array("Chipotle Southwest", "Light Mayo", "Mayo", "Ranch",
    "Oil", "Subway Vinaigrette", "Mustard", "Vinegar", "Sweet Onion",
    "BBQ", "Creamy italian", "Golden italian", "Honey Mustard", "Savory Caesar" , "Sriracha", "Tzatziki Cucumber");
$veggies = array("Cucumbers", "Green Peppers", "Lettuce", "Red Onions", "Spinach", "Tomatoes", "Banana Peppers", "Jalapenos", "Black Olives", "Pickles");

if (!isset($_GET['numSauce'])) {
    echo '<form action="?" method="get">
    # Sauces:<input type="number" value="1" min="0" max="17" name="numSauce" /><br />
    # Veggies:<input type="number" value="1" min="0" max="10" name="numVeggies" /><br />
    <input type="submit" value="Roll"/>
</form>';

} else {
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
        while (in_array($addVeggie, $sauceChoices)) {
            $addVeggie = $veggies[rand(0, 9)];
        }
        $veggieChoices[$i] = $addVeggie;
    }
    echo "Your Subway sandwich will have: <br />";
    echo "$breadChoice bread,<br />";
    var_dump($sauceChoices);
    var_dump($veggieChoices);
}
?>
    </div>
</div>
</body>
</html>


