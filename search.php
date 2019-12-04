<?php
include_once 'db_connect.php';
?>
<!DOCTYPE html >
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>SEARCH PAGE</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }

        @import 'https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300';


        * {
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .container {
            perspective: 800px;

            /* Styling */
            color: #fff;
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
            letter-spacing: 4px;

            /* Center it */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card {
            /* Styling */
            width: 525px;
            height: 300px;
            background: rgb(20, 20, 20);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);

            /* Card flipping effects */
            transform-style: preserve-3d;
            transition: 0.6s;
        }

        .side {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            /* Fix Chrome rendering bug */
            transform: rotate(0deg) translateZ(1px);
        }

        /* Flip the card on hover */
        .container:hover .card,
        .back {
            transform: rotateY(-180deg) translateZ(1px);
        }

        /* Front styling */
        .front {
            /* Center the name + outline (almost) */
            line-height: 390px; /* Height - some (because visual center is a little higher than actual center) */
            text-align: center;
        }

        .logo {
            outline: 1px solid #19F6E8;
            display: inline-block;
            padding: 15px 40px;

            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            font-size: 1.4em;
            font-weight: normal;
            line-height: 32px;
            letter-spacing: 8px;
        }

        /* Back styling */
        .back {
            background: #15CCC0;
            padding: 30px;
        }

        .name {
            color: #3B3B3B;
            margin-bottom: 0;
        }

        p {
            margin: 0.8em 0.8em;
        }

        .info {
            position: absolute;
            bottom: 30px;
            left: 30px;
            color: #3b3b3b;
        }

        .property {
            color: #fff;
        }

        .swiper-container {
            height: 420px;
        }

        /* Make semi-responsive */
        @media (max-width: 700px) {
            .card {
                transform: scale(.5);
            }

            .container:hover .card {
                transform: scale(.5) rotateY(-180deg) translateZ(1px);
            }
        }

    </style>
    <link rel="stylesheet" href="swiper.min.css" type="text/css">
    <script src="swiper.min.js" type="text/javascript"></script>
    <script src="jquery-3.4.0.min.js"></script>
    <script src="swiper.js" type="text/javascript"></script>
</head>
<body id="body_bg">
    <div class="bgimg-2">
    <div class="wrapper">
        <div>
            <a href="index.html">
                <img src="logo.png" class="Logo" style="width: 150px;height: 150px;margin-top: 3.5px;margin-left: 3.5px;">
            </a>
        </div>
    </div>
<div align="center">

    <h1 style="background-color:powderblue;">SEARCH PAGE</h1>
    
    <form method="GET" action="show.php">
        <input type="text" name="search" placeholder="Search.." id="search" maxlength="<?php if(!empty($_POST["len"])){
            echo $_POST["len"];}?>">
   
    <div style="margin-top: 5px;" id="box">
        <ul style="list-style-type: none;text-align: left;margin:0;padding: 0;">
            <li><a href="show.php" class="result"></a></li>
            <li><a href="show.php" class="result"></a></li>
            <li><a href="show.php" class="result"></a></li>
            <li><a href="show.php" class="result"></a></li>
            <li><a href="show.php" class="result"></a></li>
        </ul>
    </div>
    </form>
    <script>
        //Send Ajax request to get information on input
        $(function () {
            $("#search").keyup(function () {
                if($("#search").val()!=""){
                    $.ajax({
                        url:"getResult.php",
                        post:"get",
                        data:{
                            "val":$("#search").val()
                            <?php
                            if(!empty($_POST["region"])){
                                echo ",'region':'".$_POST["region"]."'";
                            }
                            if(!empty($_POST["industry"])){
                                echo ",'industry':'".$_POST["industry"]."'";
                            }
                            ?>
                        },
                        dataType:"json",
                        success:function (data) {

                            if(data.length!=0){
                                
                                for (var i=0;i<data.length;i++){
                                    $(".result:eq("+i+")").text(data[i].Company_name);
                                }
                            }
                        },
                        error:function () {
                            alert("The airwaves can't reach");
                        }
                    })
                }

            });
            
        })
    </script>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        
        <?php
        // display the information  in the  card 
         $sql = "SELECT c.Company_name,ct.Email,ct.Phone,a.address,a.Postal_Code,a.City,a.Province,ct.Webiste,ct.Name
                from company c ,address a, contact ct" ;
        $result = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '
                            <div class="swiper-slide">
                                    <div class="container">
                                        <div class="card">
                                            <div class="front side">
                                                <h1 class="logo">' . $row['Company_name'] . '</h1>
                                            </div>
                                            <div class="back side">
                                                <h3 class="name"><span class="property">Name: </span>' . $row['Name'] . '</h3>
                                               
                                                <div class="info">
                                                    <p><span class="property">Email: </span>'. $row['Email'] .'</p>
                                                    <p><span class="property">Phone Number: </span>'. $row['Phone'] .'</p>
                                                    <p><span class="property">Location: </span>'. $row['address'] .", " . $row['Postal_Code'] .", " . $row['City'] .", " . $row['Province'].'</p>
                                                    <p><span class="property">Website: </span>'. $row['Webiste'] .'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                        ';
            }

        }
                    mysqli_free_result($result);
        ?>
    </div>
</div>
<?php mysqli_close($connection); ?>

</div>
<footer style="margin-top: 300px;">
    <div  style="text-align: center;" >
    <a href="advancedSearch.php" style="text-align: center"><b><font size="5">settings</font></b></a>
    </div>
    <p style="font-weight:bold">DevilDucks</p>
    <p>K2J 5W8 Ottawa - ON</p>
    <p><a href="">gurby1@yahoo.com</a></p>
    <p><a href="www.ebizcardsearch.com">www.ebizcardsearch.com</a></p>
    <p>&copy; Consultent Theme</p>
</footer>
</body>
</html>