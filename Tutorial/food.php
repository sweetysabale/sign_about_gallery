<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My GHG Savings</title>
    <link rel="stylesheet" href="pract.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Protest+Guerrilla&display=swap" rel="stylesheet">

</head>

<body>
    <header></header>
    <div class="navbar">
        <div class="logo">
            <img src="logo1-Photoroom.png" alt="Logo">
        </div>
        <div class="text">Cool The Globe</div>

        <div class="tabs">
            <a href="http://localhost/Tutorial/home.php">Home</a>
            <a href="http://localhost/Tutorial/temp_my_score.php">My Score</a>
            <a href="http://localhost/Tutorial/gallary.php">Gallery</a>
            <a href="http://localhost/Tutorial/about.php">About</a>
        </div>
        <div class="dropdown">
            <button><img id="menu" src="iconimage/menu.png"></button>
            <div class="dropdown-content">
                <a href="http://localhost/Tutorial/log_sign.php">Login</a>
                <a href="http://localhost/Tutorial/logout.php">Logout</a>
                
            </div>
        </div>
    </div>
    
    <main>
        <section class="savings-section">
            <h2>Garbage Collection</h2>
            <div class="savings">
            <p>Date: <span id="currentDate"></span></p>
            <input type="hidden" id="hiddenDisplayDateInput">
            <input type="hidden" id="hiddenDbDateInput">
            <span>Meta Count of CO2: <input type="text" id="metacount" readonly></span>
            </div>
        </section>

        <section class="appliance-list">
            <ul>
                <li class="list">
                    <div class="appliance-item">
                        <img class="icon" src="iconimage/fruit.png" alt="Fruit_icon">
                    </div>
                    <span class="Appliance_name">Fruits</span>
                    <div class="appliance-row">
                        <!-- Label and text input for working hours -->
                        <label class="labeloption" for="workingHours">Select an option:</label>
                            <input id="inputvalue1" class="textbox" type="text" name="workingHours" placeholder="Enter kg" oninput="calculate(this.value, 'result1')">

                            <!-- Checkbox for not used option -->
                            <input class="cbcheck" type="checkbox" name="notUsed" id="notUsed1" onclick="clearField('inputvalue1', 'result1')">
                            <label for="notUsed">Not Used</label>
                    </div>


                    <div class="saveco2">
                        <label for="saving">CO2 emit(kg):</label>
                        <input class="co2" name="saving" id="result1" readonly>
                    </div>

                    
                </li>

                <li class="list">
                    <div class="appliance-item">
                        <img class="icon" src="iconimage/dairyProduct.png" alt="dairy_icon">
                    </div>
                    <span class="Appliance_name">Dairy Products</span>
                    <div class="appliance-row">
                        <!-- Label and text input for working hours -->
                        <label class="labeloption" for="workingHours">Select an option:</label>
                            <input id="inputvalue2" class="textbox" type="text" name="workingHours" placeholder="Enter kg" oninput="calculate(this.value, 'result2')">

                            <!-- Checkbox for not used option -->
                            <input class="cbcheck" type="checkbox" name="notUsed" id="notUsed2" onclick="clearField('inputvalue2', 'result2')">
                            <label for="notUsed">Not Used</label>
                    </div>
                    <div class="saveco2">
                        <label for="saving">CO2 emit(kg):</label>
                        <input class="co2" name="saving" id="result2" readonly>
                    </div>
                </li>

                

                <li class="list">
                        <div class="appliance-item">
                            <img class="icon" src="iconimage/nonveg.png" alt="nonveg_icon">
                        </div>
                        <span class="Appliance_name">Non-Veg</span>

                        <!-- Container to hold all elements in a single row -->
                        <div class="appliance-row">
                            <!-- Label and text input for working hours -->
                            <label class="labeloption" for="workingHours">Select an option:</label>
                            <input class = "textbox" id="inputvalue3"type="text" name="workingHours" placeholder="Enter kg"  oninput="calculate(this.value, 'result3')">

                            <!-- Checkbox for not used option -->
                            <input  class="cbcheck" type="checkbox" name="notUsed" id="notUsed3"  onclick="clearField('inputvalue3', 'result3')">
                            <label for="notUsed">Not Used</label>
                        </div>

                        <!-- Textarea for showing CO2 saving -->
                        <div class="saveco2">
                            <label for="saving">CO2 emit(kg):</label>
                            <input class="co2" name="saving" rows="2" cols="15" id="result3" readonly>
                        </div>
                    </li>




                    <li class="list">
                        <div class="appliance-item">
                            <img class="icon" src="iconimage/processedfood.png" alt="processedfood_icon">
                        </div>
                        <span class="Appliance_name">Processed Food</span>

                        <!-- Container to hold all elements in a single row -->
                        <div class="appliance-row">
                            <!-- Label and text input for working hours -->
                            <label class="labeloption" for="workingHours">Select an option:</label>
                            <input   class = "textbox" id="inputvalue4" type="text" name="workingHours" placeholder="Enter kg" oninput="calculate(this.value, 'result4')">

                            <!-- Checkbox for not used option -->
                            <input  class="cbcheck" type="checkbox" name="notUsed" id="notUsed4"  onclick="clearField('inputvalue4', 'result4')">
                            <label for="notUsed">Not Used</label>
                        </div>

                        <!-- Textarea for showing CO2 saving -->
                        <div class="saveco2">
                            <label for="saving">CO2 emit(kg):</label>
                            <input class="co2" name="saving" rows="2" cols="15" id="result4" readonly>

                        </div>
</li>

            </ul>
        </section>
        <input type="button" value="Save Record" class="save-record-btn" onclick="submitData()">
</main>
    <script>
        // Function to handle the form submission without a form tag
        function submitData() {
            // Gather the data from input fields
            const metacount = document.getElementById('metacount').value;
            const currentDate = document.getElementById('hiddenDbDateInput').value;

            // Prepare the data to be sent to the server
            const formData = new FormData();
            formData.append('metacnt', metacount);
            formData.append('dbDate', currentDate);

            // Use fetch API to send data via POST request
            fetch('', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text()) // Get response as text
            .then(data => {
                //console.log(data); // Handle success
                alert("Data submitted: ");
            })
            .catch(error => {
                console.error("Error:", error); // Handle errors
                alert("Submission failed: " + error);
            });
        }

        // Your existing date code for current date
        const today = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = today.toLocaleDateString('en-US', options);

        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed, so add 1
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDbDate = `${year}-${month}-${day}`;

        document.getElementById('currentDate').textContent = formattedDate;
        document.getElementById('hiddenDisplayDateInput').value = formattedDate;
        document.getElementById('hiddenDbDateInput').value = formattedDbDate;
        function calculate(inputValue, resultFieldId) {
            const parsedValue = parseFloat(inputValue);
            if (isNaN(parsedValue)) {
                document.getElementById(resultFieldId).value = '';
                getmetacount(); // Update meta count when clearing
                return;
            }

            let result = 0;
            if (resultFieldId === 'result1') {
                result = (parsedValue * 0).toFixed(2);  
            } else if (resultFieldId === 'result2') {
                result = (parsedValue * 0.21).toFixed(2);  
            }else if (resultFieldId === 'result3') {
                result = (parsedValue * 0.03904).toFixed(2);  
            }else if (resultFieldId === 'result4') {
                result = (parsedValue *  0.17994).toFixed(2);  //car
            
            } else{
                 result = ""
                document.getElementById(resultFieldId).value = result;
            } 
            // Additional logic for other result fields can go here

            document.getElementById(resultFieldId).value = result;
            getmetacount(); // Automatically update meta count after calculating
        }

        // Updated clearField function to clear both input field and result field
        function clearField(inputFieldId, resultFieldId) {
            document.getElementById(inputFieldId).value = '';  // Clear the input field
            document.getElementById(resultFieldId).value = '';  // Clear the result field
            getmetacount();  // Update meta count after clearing fields
        }

        function getmetacount() {
            const result1 = parseFloat(document.getElementById('result1').value) || 0;
            const result2 = parseFloat(document.getElementById('result2').value) || 0;
            const result3 = parseFloat(document.getElementById('result3').value) || 0;
            const result4 = parseFloat(document.getElementById('result4').value) || 0;
        
           

            // Sum all results
            const totalMetaCount = result1 + result2+result3+result4;
            document.getElementById('metacount').value = totalMetaCount.toFixed(2);
        }

    </script>
    <?php

// Database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "globe_login";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// $q="CREATE TABLE Food (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     User_Id VARCHAR(10), 
//     Datea DATE, -- This is the foreign key
//     food_meta_count DECIMAL(10,2) 
   
// )";

// Check if the data was sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    
    // Fetch the data
    $metacount = isset($_POST['metacnt']) ? floatval($_POST['metacnt']) : null;
    $currentDate = isset($_POST['dbDate']) ? $_POST['dbDate'] : null;

    if ($metacount === null || $currentDate === null) {
        echo "Missing meta count or date.";
        exit;
    }

    // Check if the record for the current date exists
    $checkQuery = "SELECT food_meta_count FROM food WHERE User_Id = ? AND Datea = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $email ,$currentDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Record exists, fetch the current meta count
        $row = $result->fetch_assoc();
        $existingMetaCount = floatval($row['food_meta_count']);

        // Only update if the form's metacount differs from the existing one
        if ($metacount != $existingMetaCount) {
            // Add the new meta count to the existing one
            $newMetaCount = $existingMetaCount + $metacount;

            // Update the record with the new meta count
            $updateQuery = "UPDATE food SET food_meta_count = ? WHERE User_Id= ? AND Datea = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("dss",$newMetaCount,$email, $currentDate);
            if ($updateStmt->execute()) {
                echo "Data updated successfully.";
            } else {
                echo "Error: " . $updateStmt->error;
            }
        } else {
            echo "No update needed, metacount remains the same.";
        }
    } else {
        // Insert new record if it doesn't exist
        $insertQuery = "INSERT INTO food (User_Id,Datea, food_meta_count) VALUES (?, ?,?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ssd",$email, $currentDate, $metacount);

        if ($insertStmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $insertStmt->error;
        }
    }
    
    
}
mysqli_close($conn);
?>

</body>
</html>