<?php
    require "db_connect.php";
?>
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>advancedSearch</title>
</head>
<body>
    <div class="bgimg-2">
    <div >
        <a href="index.html">
        	<img class="Logo" style="width: 150px;height: 150px;margin-top: 3.5px;margin-left: 3.5px;" src="logo.png">
        </a>
    </div>
   
<fieldset>
    
    <table>
        <form action="search.php" method="post">

        <tr>
            <td><span>Region</span></td>
            <td>
                <select name="region" id="region">
                    <option value=""></option>
                  <?php
                  //select the current region in the database and input  to the dropbox 
                        $sql="select Region from address";
                        $r=mysqli_query($connection,$sql);
                        while ($row=mysqli_fetch_array($r)){
                            echo "<option value=".$row['Region'].">".$row['Region']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><span>Industry</span></td>
            <td>
                <select name="industry" id="">
                    <option value=""></option>
                    <option value="Retail Trade">Retail Trade</option>
                    <option value="Arts">Arts</option>
                    <option value="Contruction">Contruction</option>
                    <option value="Information">Information</option>
                    <option value="Health Care and Social Assistance">Health Care and Social Assistance</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Apply</button>
            </td>
        </tr>
        </form>
    </table>
    
</fieldset>
    </div>
</body>
</html>