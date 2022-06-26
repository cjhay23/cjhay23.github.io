<!DOCTYPE html>
<html>
<head>
<style>
.error { color: #FF0001;}

.form{
    text-align: center;

}
</style>
</head>
<body>
<?php


$nameErr = $emailErr = $genderErr =$numbererr = $websiteErr = ""  ;
$name = $email = $gender = $website = $number = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Please enter a valid name";
    }
    else {
        $name = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z-']*$/",$name)){
            $nameErr = "";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    if(empty($_POST["number"])) {
        $numbererr = "please enter valid number";
    }
    else {
        $number = test_input($_POST["number"]);

        }
    
}
if(empty($_POST["email"])) {
    $emailErr = "";
    }
else {
    $email = test_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "The email address is incorrect";
    }
}

if(empty($_POST["website"])) {
    $website = "";
}
else {
    $website = test_input($_POST["website"]);
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+8@#\/%?=~_|!:,.;]*[-a-z0-9+8@#\/%=~_|]/i", $website)) {
        $websiteErr = "Enter a valid Website URL";
    }
}

if(empty($_POST["comment"])) {
    $comment = "";
}
else {
    $comment = test_input($_POST["comment"]);
}

if (empty($_POST["gender"])) {
    $genderErr = "";
}
else {
    $gender = test_input($_POST["gender"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2 style="text-align: center;"> PHP Form Validation Example </h2>

<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<p> <span class="Error">* required field </span> </p>

    Name: <input type="text" name="name"> 
    <span class="error">* <?php echo $nameErr;?></span>
    <br> <br>
    E-mail Address: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br> <br>
    Website: <input type="text" name="website">
    <span class="error">* <?php echo $websiteErr;?></span>
    <br> <br>
    Phone Number: <input type="number" name="number">
    <span class="error">* <?php echo $numbererr;?></span>
    <br> <br>
    Comment: <textarea name="comment" rows="4" cols="30"></textarea>
    <br> <br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
        <span class="error">* <?php echo $genderErr;?></span>
    <br> <br>
    <input type="submit" name="submit" value="submit">

    <?php


    echo "<h2> Your Input: </h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $number;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
?>
</tr>
</table>
</form>



</body>
</html>