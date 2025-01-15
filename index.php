<?php
include("config.php");
include("connectie.php");
include("reactions.php");

/*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo " - New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    */

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";
if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => "Ieniminie",
        'email' => "ieniminie@sesamstraat.nl",
        'message' => "Geweldig dit"
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Puppeteer by Jorge Rivera-Herrans & Gigi </title>
</head>
<body>
<iframe width="1534" height="804" src="https://www.youtube.com/embed/tso8nSWnENM" title="Puppeteer | EPIC: The Musical ANIMATIC" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

<h2>Hieronder komen reacties</h2>
    <p>Maak hier je eigen pagina van aan de hand van de opdracht</p>
</body>
</html>

<?php
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // hier komt de code als er gegevens zijn
} else {
    echo "0 results";
}

while ($row = $result->fetch_assoc()) {
    // hier komen de gegevens van elke rij (record)
    echo $row["firstname"]. " " . $row["lastname"]. ":". "<br>";
}

$conn->close();
$con->close();
?>