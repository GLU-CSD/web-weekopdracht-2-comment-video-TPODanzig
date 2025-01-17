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
<?php
    //$conn = mysqli_connect("localhost", "root", "mydb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $comment = $_POST["comment"];
        $date = date('F d Y');
        $reply_id = $_POST["reply_id"];

        $query = "INSERT INTO myguests VALUES('', '$name', '$email', '$comment', '$reply_id')";
        // $query = "INSERT INTO tb_data (name, email, comment, date, reply_id) VALUES('$name', '$email', '$comment', '$date', '$reply_id')";

        // mysqli_query($conn, $query);

    }
    ?>
    
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

<form action = "" method = "post">
        <h3 id = "title">Leave a comment </h3>
        <input type="hidden" name = "reply_id" id= "reply_id">
        <div>
            <input type="text" name = "name" placeholder= "Your name" required>
        </div>
        <div>
            <input type="text" name = "email" placeholder= "Your email" required>
        </div>

        <div>
            <textarea name="comment"  placeholder="Your comment" required cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit" name= "submit" class= "submit">Submit</button>
        </div>


    </form>



<h2>Comments:</h2>

<?php
//only select comment, not included reply 
    $datas = mysqli_query($conn, "SELECT * FROM myguests");
    foreach($datas as $data){
        require 'comment.php';
    }
?>



</html>

<?php
$con->close();
?>