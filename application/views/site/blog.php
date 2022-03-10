<?php include ("include/header.php") ?>
<?php

$servername = "localhost";
$username = "u775928650_ekwikdigital";
$password = "Admin007@#digital";
$database = "u775928650_kajuwalebhaiya";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("sorry we failed to connect".mysqli_connect_error());
}	
// else {
// echo("connected");
// }

if(isset($_POST['submit'])){
 
    $blogheading = $_POST['blogheading'];
    $blogdesc = $_FILES['blogdesc'];
    $blogheading = $_POST['blogheading'];
}
$sql = "SELECT * FROM `blogs`";
$result = mysqli_query($conn,$sql);

// echo mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Blog</title>
    <style>

        .banner{
            /* border: 2px solid red; */
            height: 400px;
            background:no-repeat center center/cover url(images/fresh2.png) ;
        }
        .main-section {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 450px);
            column-gap: 20px;
            row-gap: 20px;
            padding: 40px;
            /* border: 2px solid red; */
        }
        .main-section-div {
            height: 350px;
            width:400px;
            /* border: 2px solid red; */
            display: flex;
            justify-content: center;
            align-items: center;
           
        }
        .content {
            padding: 20px;
            margin: 10px;

        }
        .sub-main h2 {

            padding-left:30px;
        }
        .sub-main {
            border-radius: 15px;
            padding: 20px;
            margin: 5px;
            background-color: white;
            transition: all 0.5s ease;
        }
        .sub-main:hover {
            transform: scale(1.02);
            box-shadow: 0px 0px 10px black;
        }
        .image{
            background: url(images/whiteleave.jpeg);
            transition: all 0.5s ease;
        }
        .image:hover{
            background: no-repeat center center/cover url(images/banner1.jpg);
        }

        @media  (max-width:700px){
            .banner {
                height: 200px;
            }
            .main-section{
                /* border: 2px solid red; */
                grid-template-columns: repeat(1, 350px);
                padding: 25px;
            }
            .sub-main{
                overflow: hidden;
            }
            .main-section-div {
            height: 350px;
            width:300px;
        }
        }

    </style>
</head>
<body>
    <section class="banner"></section>
    <section class="main-section">

<?php
while($row = mysqli_fetch_assoc($result)){
    echo 
    "<div class='sub-main'>
    <a href='".base_url('blogpost')."'> <div class='main-section-div image' >" .$row['blog_image']. "</div>
    <h2>".$row['blog_heading'] ."</h2>
    <p class='content'>".$row['blog_desc']."</p>
    </a>
    </div>";
}
?>
    </section>
</body>
</html>
<?php include ("include/footer.php") ?>