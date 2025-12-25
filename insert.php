<html>
    <body>
        <h3>USER FORM</h3>
        <form method ="POST">
            Name:<br>
            <input type ="text" id ="name" name="name"><br><br>
            Mobile:<br>
            <input type ="text" id ="mobile" name ="mobile"><br><br>
            Email:<br>
            <input type ="email" id ="email" name="email"><br><br>
            DOB:<br>
            <input type ="date" id ="dob" name="dob"><br><br>
            country:<br>
            <label for="country">Choose a country:</label>
            <select name="country" id="country">
                <option>select</option>
                <option>INDIA</option>
                <option>USAt</option>
                <option>UK</option>
                <option>AUTRALIA</option>
            pincord:<br>
            <input type ="text" id="pincode" name ="pincode"><br><br>
            Adress:<br><br>
            <input type ="text" id="adress" name ="adress"><br><br>
             <input type ="submit" name ="submit" value ="submit"><br><br>
        </form>
    </body>
</html>
<?php


$conn = mysqli_connect("localhost","root","","testdb");
if(!$conn){
    die("Connection failed");
}

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $address = $_POST['adress'];

    $sql = "INSERT INTO user_details
    (name,mobile,email,dob,country,pincode,address)
    VALUES
    ('$name','$mobile','$email','$dob','$country','$pincode','$address')";

    if(mysqli_query($conn,$sql)){
        echo "Inserted";
       
    } else {
        echo mysqli_error($conn);
    }
}
?>
