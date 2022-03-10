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

$sql = "SELECT * FROM `blogs`";
$result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <style>
        .banner{
            position: sticky;
            z-index: -1;
            top: 20px;
            width: 100%;
            padding: 50px;
            /* border: 2px solid red; */
            height: 400px;
            background:no-repeat center center/cover url(images/fresh.png) ;
        }
        .banner h2 {
            font-size: 100px;
            color: white;
        }
        .blog-content {
            z-index: 9999999;
            margin-top: 0px;
            padding: 50px;
            background-color: white;
        }
        @media  (max-width:700px){
            .banner {
                height: 300px;
            }
            .banner h2 {
                margin-top: 80px;
                font-size: 30px;
        }
        }
    </style>
</head>
<body>
<section class="banner">
    <h2>Banner Heading it is the best</h2>
</section>
<section class="blog-content">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque soluta aliquid fuga dolor vel expedita sint esse, similique cupiditate officia.</p>
</section>

</body>
</html>
<?php include ("include/footer.php") ?>
