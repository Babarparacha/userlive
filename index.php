<?php
if(isset($_POST['submit'])){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.ipgeolocation.io/ipgeo?apiKey=64727d27c2cd49ca969f4f187ae76b61");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $result = json_decode($result);

    if(isset($result->latitude) && isset($result->longitude)){
        ?>
        <iframe id="mapFrame" width="100%" height="500" src="https://www.google.com/maps?q=<?php echo $result->latitude; ?>,<?php echo $result->longitude; ?>&output=embed"></iframe>
        <?php
    }
    elseif (isset($_POST['desire'])) {
        $desire = $_POST['desire'];
        echo $desire;
        ?>
        <iframe id="mapFrame" width="100%" height="500" src="https://www.google.com/maps/q=<?php echo $desire; ?>&output=embed"></iframe>
        <?php
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body>
    <div class='container'>
        <form action="" method="post">
            <input type="submit" value='Submit' name="submit">   
        </form>
      
    </div>
</body>
<style>
    .container{
        display: flex;
        margin-top: 30px;
        background: aliceblue;
        height: 200px;
        width: 500px;
        justify-content: center;
        align-items: center;
        position: absolute;
        left: 300px;
    }
    
   
</style>
<script>
    function updateLocation(e) {
        e.preventDefault();
        var mapFrame = document.getElementById("mapFrame");
        mapFrame.src = mapFrame.src; // Refreshes the iframe content
    }

    setInterval(updateLocation, 3000); // Update every 3 seconds
</script>
</html>
