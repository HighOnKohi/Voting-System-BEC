<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

include "connVote.php";

if (isset($_POST['edit_item'])) {
    // Retrieve the ID of the item to be deleted
    $rec_id_e = $_POST["rec_id_e"];
}

$query = "SELECT * FROM candidates WHERE Id = '$rec_id_e'";
$result = mysqli_query($conn, $query);

// Fetch the data and store it in the array
while($row = mysqli_fetch_assoc($result)) {
    $name = $row["Name"];
    $Id = $row["Id"];
    $Pos = $row["Position"];
    $Sec = $row["Section"];
    $Strand = $row['Strand'];

}

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
                    <li><a href="./home.html">Home</a></li>
                </ul>
            </div>
    </nav>

    <!--Add Form-->
    <div class="main">
        <div class="main-container">
        <div class="form-container">
                
                <form action="../../php/ADMIN/AddCandidate.php" class="form-add" method="post" name="AddCandidate">
                    
                    <label for="Name">Name</label>
                    <input type="text" name="Name" id="Name" placeholder="Candidate Name" required value="<?php echo $name; ?>">
                    
                    <label for="Strand">Strand</label>
                    <select name="Strand" id="Strand-dropdown" placeholder="The Student's Strand" required value="<?php echo $Strand; ?>">
                        <optgroup label="Select a Strand">
                            <option selected>Select a Strand</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="ABM">ABM</option>
                            <option value="STEM">STEM</option>
                            <option value="ICT">ICT</option>
                            <option value="HE">HE</option>
                        </optgroup>
                    </select>

                    <label for="Section">Section</label>
                    <input type="text" name="Section" id="Section" placeholder="Candidate Section" required value="<?php echo $Sec; ?>">
                    
                    <label for="Position">Position</label>
                    <select name="Position" id="Position" placeholder="Candidate Position" required value="<?php echo $Pos; ?>">
                        <optgroup label="Select a Position">
                            <option selected>Select a Position</option>
                            <option value="President">President</option>
                            <option value="Vice President">Vice President</option>
                            <option value="Secretary">Secretary</option>
                            <option value="Treasurer">Treasurer</option>
                            <option value="Auditor">Auditor</option>
                            <option value="PIO">PIO</option>
                            <option value="PO">PO</option>
                            <option value="Representative">Representative</option>
                        </optgroup>
                    </select>
                    
                    <div class="add_btn">
                    <form method="post" action="Update.php">
                        <input type="hidden" name="rec_id_e" value="<?php echo $member["Id"]; ?>">
                        <input type="submit" value="Update" id="btn-add" name="update_item">
                    </form>
                </div>

                    <a href="./Edit.php">
                        <div class="add_btn">
                            <h3 id="btn-add">Back</h3>
                        </div></a>
                    </form>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</body>

</html>