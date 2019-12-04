<?php
include_once 'db_connect.php';
?>
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show</title>
    <style>
        
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
</head>
<body>
    
    <div>
        <a href="index.html">
            <img src="logo.png" class="Logo" style="width: 150px;height: 150px;margin-top: 3.5px;margin-left: 3.5px;">
        </a>
    </div>
    <div class="bgimg-2">
    <div class="swiper-container">
    <div class="swiper-wrapper">
        
        
        <?php
        $val = $_GET['search'];

        $sql = "SELECT c.Company_name,ct.Email,ct.Phone,a.address,a.Postal_Code,a.City,a.Province,ct.Webiste,ct.Name
                from company c ,address a, contact ct WHERE c.Company_name LIKE '%$val%'" ;
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
                                                   <p><span class="property">Email: </span>'.$row['Email'].'</p>
                                                    <p><span class="property">Phone Number: </span>'.$row['Phone'].'</p>
                                                    <p><span class="property">Location: </span>'.$row['address'] .", " .$row['Postal_Code'] .", " .$row['City'] .", " .$row['Province'].'</p>
                                                    <p><span class="property">Website: </span>'.$row['Webiste'].'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                        ';
            }
        }
        ?>
    </div>
</div>
</div>
<?php mysqli_close($connection); ?>

</body>
</html>