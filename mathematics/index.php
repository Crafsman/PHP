<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>不愁出题</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>

<?php  

//echo $_SESSION["maxNumber"]."...".$_SESSION["inputNumber"];
//print_r($_SESSION);

if(isset($_POST['SubmitButton'])){ //check if form was submitted

    if(!empty($_POST['maxNumber']))
    {
        $_SESSION["maxNumber"] = $_POST['maxNumber'];
    }
    if(!empty($_POST['inputNumber']))
    {
        $_SESSION["inputNumber"] = $_POST['inputNumber'];
    }
  $message = $_SESSION["maxNumber"].".... <br/>".$_SESSION["inputNumber"];
  //echo $message;
}    

?>

<div>
<form action="" method="post">
    <label for="fname">请输多少以内加减法：</label>
    <input type="text" id="fname" name="maxNumber" placeholder="<?php echo $_SESSION["maxNumber"]?>">
    <label for="lname">请输入出题的个数：</label>
    <input type="text" id="lname" name="inputNumber" placeholder="<?php echo $_SESSION["inputNumber"]?>">
    <input type="submit" name="SubmitButton" value="出题"/>
  </form>
</div>

<br>
<div>

<?php
$number = (int)$_SESSION["inputNumber"];
$currentValue = 0;
for ($i=0; $i <$number ; $i++) { 
    $currentValue = $i;
    $value1 = rand(0, $_SESSION["maxNumber"]);
    $value2 = rand(0, $_SESSION["maxNumber"]);
    $operator = generateOperation();
    $answer = -1;

    // Make sure answer is not negative
    if($value1< $value2)
    {
        $another = $value1;
        $value1 = $value2;
        $value2 = $another;
    }

    if ($operator == "+") 
        $answer = $value1 + $value2;
    else
        $answer = $value1 - $value2;

    echo $value1." ";
    echo $operator." ".$value2." = "; ?> 
    <span class="myclass" style="display:none">
    <?php echo $answer; ?>
    </span>
    
     <?php 
    echo "<br>";
}

function generateOperation() {
    $randomOperation = rand(1, 10);
    if($randomOperation%2==0)
    return "+";
    else
    return "-";
}

?>
</div>
<br>
<div>

<input style="width:200px" type="submit" onclick="myFunction()" value="显示答案"/>
</div>

<script>
function myFunction() {
  
        var name = "myclass";
        var x = document.getElementsByClassName(name);
        for (let index = 0; index < x.length; index++) {
           
            if (x[index].style.display === "none") {
    x[index].style.display = "inline";
    //x[index].style.display = "inline";
  } else {
    x[index].style.display = "none";
    //x[index].style.display = "inline";
  }
        }

}
</script>

</body>
</html>






















