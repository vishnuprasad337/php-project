<?php
$conn = mysqli_connect("localhost","root","","testdb");


if(isset($_GET['del']))
{
    mysqli_query($conn,"DELETE FROM user_details WHERE id=".$_GET['del']);
}

if(isset($_POST['update']))
{
    mysqli_query($conn,"UPDATE user_details SET
        name='".$_POST['name']."',
        mobile='".$_POST['mobile']."',
        email='".$_POST['email']."',
        country='".$_POST['country']."',
        pincode='".$_POST['pincode']."',
        address='".$_POST['address']."'
        WHERE id=".$_POST['id']
    );
}


$result = mysqli_query($conn,"SELECT * FROM user_details");
$fields = mysqli_fetch_fields($result);
?>

<html>
<body>

<h3>User Details</h3>

<table border="1">

<tr>
<?php

foreach($fields as $field)
{
    if($field->name != 'dob')   
        echo "<th>".$field->name."</th>";
}
echo "<th>age</th><th>action</th>";
?>
</tr>

<?php
while($row = mysqli_fetch_row($result))
{
    $age = date_diff(date_create($row[4]), date_create('today'))->y;
?>
<tr>
<form method="post">
    <td><?php echo $row[0]; ?></td>
    <td><input type="text" name="name" value="<?php echo $row[1]; ?>"></td>
    <td><input type="text" name="mobile" value="<?php echo $row[2]; ?>"></td>
    <td><input type="text" name="email" value="<?php echo $row[3]; ?>"></td>
    <td><input type="text" name="country" value="<?php echo $row[5]; ?>"></td>
    <td><input type="text" name="pincode" value="<?php echo $row[6]; ?>"></td>
    <td><input type="text" name="address" value="<?php echo $row[7]; ?>"></td>
    <td><?php echo $age; ?></td>
    <td>
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
        <input type="submit" name="update" value="Update">
        <a href="view.php?del=<?php echo $row[0]; ?>">Delete</a>
    </td>
</form>
</tr>
<?php } ?>

</table>

</body>
</html>
