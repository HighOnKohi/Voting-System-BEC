<?php
include "connVote.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

<!--LINKS-->
    <link rel="stylesheet" href="../../css/links.css">
    <link rel="icon" href="../../res/BEC Logo.png">

<!-- LOAD ANIMATION -->
<script>
    window.onload = function() {
        document.body.classList.add('loaded');
    };
</script>

    <title>ADD</title>

</head>

<body>
    
    <!--Navigation-->
    <nav class="navigation">
        <div class="IMS">
            <div class="Logo">
                <a href="https://bec.edu.ph/"><img src="../../res/BEC Logo.png" alt="BEC Logo"></a>
            </div>
            <div class="title"></div>
        </div>
            <div class="nav_links">
                <ul>
                    <li><a href="../../html/ADMIN/home.html">Home</a></li>
                </ul>
            </div>
    </nav>

    <!--Add Form-->
    <div class="main">
        <div class="main-container">
        <div class="form-container">

        <h2>Do you really want to clear all the votes?</h2>

        
            <div class="add_btn">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="confirm" value="yes">
                        <button id="btn-add" type="submit">Yes</button>
                    </form>
            </div>

            
            <a href="./Edit.php">
                <div class="add_btn">
                    <h3 id="btn-add">NO</h3>
                </div>
            </a>

            </div>
        </div>
    </div>
    <?php
// Check if form is submitted
if (isset($_POST['confirm'])) {
    // If user confirms, delete all data in the table
    $sql = "TRUNCATE TABLE votes";
    if (mysqli_query($conn, $sql)) {
      echo "cleared successfully";
      // Redirect to another page
      header("Location: ../../html/ADMIN/home.html");
      exit();
    } else {
      echo "Error clearing table: " . mysqli_error($conn);
    }
  }
  
  // Close the connection
  mysqli_close($conn);
  
?>

    <div class="overlay"></div>

</body>

</html>

