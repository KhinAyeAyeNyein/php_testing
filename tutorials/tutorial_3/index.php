<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_3</title>
</head>

<body>
    <h1 class='header'> Calculating Age from DoB</h1>
    <div class='body'>
        <form>
            <div class='input'>
            <input type="date" name="dob" value="<?php echo "" .$_GET['dob'];?>">                
            <input type="submit" value="Calculate Age">
            </div>
        </form>
        <?php 
            if (isset($_GET['dob']) && $_GET['dob'] != '') {
                echo getAge($_GET['dob']);
            }
        ?>
    </div>
</body>
</html>

<?php
function getAge($dob){
  $b_day = new DateTime($dob);
  $today = new DateTime(date('d.m.y'));
  if ($b_day > $today){
    return 'You are not born yet.';
  }
  else {
    $age= date_diff($b_day, $today);
    return 'Your age is : '.$age->d.' days, '.$age->m.' month, and '.$age->y.' years.';
  }
}
?>