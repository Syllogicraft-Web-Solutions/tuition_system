<!DOCTYPE html>

<style>

    h4
    {
        font-size: 20px;
        text-shadow: 1px 1px #888888;
        font-family: sans-serif;
        text-decoration: underline;
        color: #CC0000;
        font-weight: bold;
        margin:20px ;
    }

    h5
    {
        font-size: 18px;
        font-family: sans-serif;
        text-decoration: none;
        color: black;
        margin:20px ;
    }

    li
    {
        font-family: sans-serif;
        text-decoration: none;
        color: #CC0000;
        margin:20px ;
        font-weight: bold;

    }

</style>

<html>
<head>
    <title>Profile</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: blanchedalmond">

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    USER PROFILE:
</h2>

<?php
include('session.php');

$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("tuition", $connection) or die(mysql_error());

$username = $login_session;

$sql = "SELECT User_ID FROM users_student WHERE Username = '$username' ";
$id = mysql_query($sql)or die(mysql_error());

$row = mysql_fetch_assoc($id);

if($row)
{
    $userid = $row["User_ID"];
}

/*echo $userid;*/

$sql1 = "SELECT * FROM student WHERE User_ID = $userid ";

$id1 = mysql_query($sql1)or die(mysql_error());

while($row1 = mysql_fetch_array( $id1 ))
{
    $first_name = $row1['First_name'];
    $last_name = $row1['Last_name'];
    $gender = $row1['Gender'];
    $birth_date = $row1['Birthdate'];
    $age = $row1['Age'];
    $phone_number = $row1['Phone_number'];
    $region = $row1['Region'];
    $address = $row1['Address'];
    $curriculum = $row1['Curriculum'];
    $days_week = $row1['Days_per_week'];
    $salary = $row1['Salary_per_subject'];
    $salary_type = $row1['Salary_type'];
    $school = $row1['School_name'];
    $class = $row1['Class'];
    $pre_gender = $row1['Preferred_gender'];
    $pre_inst = $row1['Preferred_institution'];
    $about = $row1['About'];
}

/*echo "\nFetched data successfully\n";*/

echo "<h4>User Name:</h4>";
echo "<h5>";
echo $username;
echo "</h5>";

echo "<h4>Name</h4>";
echo "<h5>";
echo $first_name;
echo "  ";
echo $last_name;
echo "</h5>";

if($gender == 'M')
    $gender = 'Male';
else
    $gender = 'Female';

echo "<h4>Gender:</h4>";
echo "<h5>";
echo $gender;
echo "</h5>";

echo "<h4>Birthday Date:</h4>";
echo "<h5>";
echo $birth_date;
echo "</h5>";


echo "<h4>Age:</h4>";
echo "<h5>";
echo $age;
echo "</h5>";


echo "<h4>Contact Number:</h4>";
echo "<h5>";
echo $phone_number;
echo "</h5>";

echo "<h4>Region:</h4>";
echo "<h5>";
echo $region;
echo "</h5>";


echo "<h4>Address:</h4>";
echo "<h5>";
echo $address;
echo "</h5>";


echo "<h4>Curriculum:</h4>";
echo "<h5>";
echo $curriculum;
echo "</h5>";


echo "<h4>Days to be tutored:</h4>";
echo "<h5>";
echo $days_week;
echo "</h5>";

echo "<h4>Salary:</h4>";
echo "<h5>";
echo "TK ";
echo $salary;
echo "  ";
echo $salary_type;
echo "</h5>";

echo "<h4>School Name:</h4>";
echo "<h5>";
echo $school;
echo "</h5>";

echo "<h4>Studying in Grade:</h4>";
echo "<h5>";
echo $class;
echo "</h5>";

if($pre_gender == 'M')
    $pre_gender = 'Male';
else
    $pre_gender = 'Female';

echo "<h4>Preferred Gender of tutor:</h4>";
echo "<h5>";
echo $pre_gender;
echo "</h5>";

echo "<h4>Preferred Institution of tutor:</h4>";
echo "<h5>";
echo $pre_inst;
echo "</h5>";

echo "<h4>";
echo"About";
echo " $first_name";
echo":";
echo "</h4>";
echo "<h5>";
echo $about;
echo "</h5>";

$sql2 = "SELECT * FROM subjects WHERE User_ID = $userid ";

$id2 = mysql_query($sql2)or die(mysql_error());

echo "<h4>

Assistance required in the following subject(s):

</h4>";


while($row2 = mysql_fetch_array( $id2 ))
{
    echo "<ul>";
    echo "<li>";
    echo $row2['Type'];
    echo "</li>";
    echo "</ul>";
}

//mysql_close($connection);

?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold">Welcome : <i><?php echo $username; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<div class="bottomcorner" id="profile">
    <div id="login_form">
        <form action="tslist.php" method="post">
            <h5>
                Search for prospective teachers:
            </h5>

            <br>

            <input name="submit" type="submit" value=" Search ">
        </form>

        <h5>
            Delete Account:
        </h5>

        <br>

        <form action="delete.php" method="post">
            <?php
            echo "<button name ='submit' type='submit' value = $userid >Delete Account</button>";
            ?>
        </form>


                <h5>
                    Modify Details:
                </h5>

                <br>

                <form action="update.php" method="post">
                    <?php
                    echo "<button name ='submit' type='submit' value = $userid >Update</button>";
                    ?>
                </form>



    </div>

</div>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                    