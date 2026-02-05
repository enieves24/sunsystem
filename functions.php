<?php include 'db.php'?>
<?php

//register user
function register(){
    global $connection;
    
    if(isset($_POST['register'])){
        $username   = trim($_POST['username']);
        $email      = trim($_POST['email']);
        $password   = trim($_POST['password']);
        $repassword = trim($_POST['repassword']);

        $username   = mysqli_real_escape_string($connection, $username);
        $email      = mysqli_real_escape_string($connection, $email);
        $password   = mysqli_real_escape_string($connection, $password);
        $repassword = mysqli_real_escape_string($connection, $repassword);

        if($password !== $repassword) {
            echo "Passwords do not match.";
            return;
        }

        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $password)) {
            echo "Password must be at least 8 characters long and include uppercase<br> lowercase, number, and special character.";
            echo '<script>alert("Password must containt alpha numeric and special character");</script>';
            return;
        }


        if(empty($username) || empty($email) || empty($password)) {
            echo "Please fill in all fields.";
            return;
        }

        // Check if email already exists
        $queryCheckEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultEmail = mysqli_query($connection, $queryCheckEmail);
        if(mysqli_num_rows($resultEmail) > 0){
            echo "Email is already registered.";
            return;
        }

        // ✅ Check if username already exists
        $queryCheckUsername = "SELECT * FROM users WHERE username = '$username'";
        $resultUsername = mysqli_query($connection, $queryCheckUsername);
        if(mysqli_num_rows($resultUsername) > 0){
            echo "Username is already taken.";
            return;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $queryRegister = "INSERT INTO users (username, email, password) 
                          VALUES ('$username', '$email', '$hashedPassword')";
        $sqlRegister = mysqli_query($connection, $queryRegister);

        if($sqlRegister){
            echo '<script>alert("Registration successful!");</script>';
            echo '<script>location.href="login.php"</script>';
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}

function login(){
    global $connection;

    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

    // Escape input
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // Check if user exists by username or email
    $queryLogin = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $queryLogin);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // ✅ Verify password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['account_type'] = $row['account_type'];

            if ($row['account_type'] === 'admin') {
                echo "<script>alert('Welcome ${username}')</script>";
                echo "<script>location.href='admin.php';</script>";
            } else {
                echo "<script>alert('Welcome ${username}')</script>";
                echo "<script>location.href='employee.php';</script>";
            }
            
        } else {
            echo "<script>alert('Invalid Username or Password!')</script>";
        }
    } else {
        echo "<script>alert('Username not Found!')</script>";
    }
}
}

/*
SUBMIT TICKET

<?php
session_start();
include 'db_connection.php'; // Adjust this to your actual DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_name = mysqli_real_escape_string($connection, $_POST['request_name']);
    $approver = mysqli_real_escape_string($connection, $_POST['approver']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);
    $branch = mysqli_real_escape_string($connection, $_POST['branch']);
    $time_issue = mysqli_real_escape_string($connection, $_POST['time_issue']);
    $date_issue = mysqli_real_escape_string($connection, $_POST['date_issue']);
    $issue_type = mysqli_real_escape_string($connection, $_POST['issue_type']);
    $priority = mysqli_real_escape_string($connection, $_POST['priority']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $troubleshooting = isset($_POST['troubleshooting']) ? $_POST['troubleshooting'] : 'No';
    $troubleshooting_steps = isset($_POST['troubleshooting_steps']) ? mysqli_real_escape_string($connection, $_POST['troubleshooting_steps']) : '';
    $expected_outcome = mysqli_real_escape_string($connection, $_POST['expected_outcome']);
    $notes = mysqli_real_escape_string($connection, $_POST['notes']);

    // Handle file upload
    $attachment_path = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $filename = basename($_FILES["attachment"]["name"]);
        $target_file = $target_dir . time() . "_" . $filename;

        if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
            $attachment_path = $target_file;
        } else {
            echo "<script>alert('Failed to upload file.'); window.history.back();</script>";
            exit;
        }
    }

    $query = "INSERT INTO tickets (
                request_name, approver, name, department, branch, time_issue, date_issue,
                issue_type, priority, description, troubleshooting, troubleshooting_steps,
                expected_outcome, notes, attachment_path
              ) VALUES (
                '$request_name', '$approver', '$name', '$department', '$branch', '$time_issue', '$date_issue',
                '$issue_type', '$priority', '$description', '$troubleshooting', '$troubleshooting_steps',
                '$expected_outcome', '$notes', '$attachment_path'
              )";

    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Ticket submitted successfully!'); location.href='employee.php';</script>";
    } else {
        echo "<script>alert('Error submitting ticket.'); window.history.back();</script>";
    }
}
?>


*/

//ADD ASSETS FUNCTION


// ...existing code...
function addAssets() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form data
        $code = mysqli_real_escape_string($connection, trim($_POST['code']));
        $asset_code = mysqli_real_escape_string($connection, trim($_POST['asset_code']));
        $item_name = mysqli_real_escape_string($connection, trim($_POST['item_name']));
        $brand_model = mysqli_real_escape_string($connection, trim($_POST['brand_model']));
        $description = mysqli_real_escape_string($connection, trim($_POST['description'] ?? ''));
        $inclusions = mysqli_real_escape_string($connection, trim($_POST['inclusions'] ?? ''));
        $product_id = mysqli_real_escape_string($connection, trim($_POST['product_id']));
        $serial_number = mysqli_real_escape_string($connection, trim($_POST['serial_number']));
        $imei = mysqli_real_escape_string($connection, trim($_POST['imei']));
        $supplier = mysqli_real_escape_string($connection, trim($_POST['supplier']));
        $received_date = mysqli_real_escape_string($connection, trim($_POST['received_date']));
        $price = mysqli_real_escape_string($connection, trim($_POST['price']));
        $release_to = mysqli_real_escape_string($connection, trim($_POST['release_to']));
        $branch_add = mysqli_real_escape_string($connection, trim($_POST['branch_add']));
        $release_date = mysqli_real_escape_string($connection, trim($_POST['release_date']));
        $purpose = mysqli_real_escape_string($connection, trim($_POST['purpose']));

        // SQL query
        $queryAddAssets = "INSERT INTO assets_inventory (
            code, asset_code, item_name, brand_model, description, inclusions,
            product_id, serial_number, imei, supplier, received_date, price,
            release_to, branch_add, release_date, purpose
        ) VALUES (
            '$code', '$asset_code', '$item_name', '$brand_model', '$description', '$inclusions',
            '$product_id', '$serial_number', '$imei', '$supplier', '$received_date', '$price',
            '$release_to', '$branch_add', '$release_date', '$purpose'
        )";

        // Execute query and show alert on success/failure
        $sqlAddAssets = mysqli_query($connection, $queryAddAssets);
        if ($sqlAddAssets) {
            echo "<script>alert('Add successful'); window.location.href = 'admin.php';</script>";
            exit;
        } else {
            $err = mysqli_real_escape_string($connection, mysqli_error($connection));
            echo "<script>alert('Error adding asset: {$err}'); window.history.back();</script>";
            exit;
        }
    }
    
// ...existing code...
function displayAssets(){
    global $connection;

    $queryDisplayAssets = "SELECT code, asset_code, item_name, brand_model, description, inclusions, product_id, serial_number, imei, supplier, received_date, price, release_to, branch_add, release_date, purpose FROM assets_inventory";
    $sqlDisplayAssets = mysqli_query($connection, $queryDisplayAssets);

    return $sqlDisplayAssets;
}
}

// ...existing code...
/*
function addAssets() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form data
        $code = mysqli_real_escape_string($connection, trim($_POST['code']));
        $asset_code = mysqli_real_escape_string($connection, trim($_POST['asset_code']));
        $item_name = mysqli_real_escape_string($connection, trim($_POST['item_name']));
        $brand_model = mysqli_real_escape_string($connection, trim($_POST['brand_model']));
        $description = mysqli_real_escape_string($connection, trim($_POST['description'] ?? ''));
        $inclusions = mysqli_real_escape_string($connection, trim($_POST['inclusions'] ?? ''));
        $product_id = mysqli_real_escape_string($connection, trim($_POST['product_id']));
        $serial_number = mysqli_real_escape_string($connection, trim($_POST['serial_number']));
        $imei = mysqli_real_escape_string($connection, trim($_POST['imei']));
        $supplier = mysqli_real_escape_string($connection, trim($_POST['supplier']));
        $received_date = mysqli_real_escape_string($connection, trim($_POST['received_date']));
        $price = mysqli_real_escape_string($connection, trim($_POST['price']));
        $release_to = mysqli_real_escape_string($connection, trim($_POST['release_to']));
        $branch_add = mysqli_real_escape_string($connection, trim($_POST['branch_add']));
        $release_date = mysqli_real_escape_string($connection, trim($_POST['release_date']));
        $purpose = mysqli_real_escape_string($connection, trim($_POST['purpose']));

        // SQL query
        $queryAddAssets = "INSERT INTO assets_inventory (
            code, asset_code, item_name, brand_model, description, inclusions,
            product_id, serial_number, imei, supplier, received_date, price,
            release_to, branch_add, release_date, purpose
        ) VALUES (
            '$code', '$asset_code', '$item_name', '$brand_model', '$description', '$inclusions',
            '$product_id', '$serial_number', '$imei', '$supplier', '$received_date', '$price',
            '$release_to', '$branch_add', '$release_date', '$purpose'
        )";

        // Execute query and redirect
        if (mysqli_query($connection, $queryAddAssets)) {
            // Redirect to the same page to prevent resubmission
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
        }
    




        if (mysqli_query($connection, $queryAddAssets)) {
            echo "<script>alert('Add successful'); window.location.href = 'admin.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
        }
    
        // $queryAddAssets = "
        //                 INSERT INTO assets_inventory (
        //                     code, asset_code, item_name, brand_model, description, inclusions,
        //                     product_id, serial_number, imei, supplier, received_date, price,
        //                     release_to, branch_add, release_date, purpose
        //                 ) VALUES (
        //                     '$code', '$asset_code', '$item_name', '$brand_model', '$description', '$inclusions',
        //                     '$product_id', '$serial_no', '$serial_no', '$imei', '$supplier', '$received_date', '$price',
        //                     '$release_to', '$branch_add', '$release_date', '$purpose'
        //                 )
        //             ";
        // $sqlAddAssets = mysqli_query($connection, $queryAddAssets);


    }

    //DISPLAY ASSETS

     function displayAssets(){
            global $connection;

            $queryDisplayAssets = "SELECT  code, asset_code, item_name, brand_model, description, inclusions, product_id, serial_number, imei, supplier, received_date, price, release_to, branch_add, release_date, purpose FROM assets_inventory";
            $sqlDisplayAssets = mysqli_query($connection, $queryDisplayAssets);

            return $sqlDisplayAssets;
        }

}
*/


//UPDATE ASSETS
    function updateAsset() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form data
        $code = mysqli_real_escape_string($connection, trim($_POST['code']));
        $asset_code = mysqli_real_escape_string($connection, trim($_POST['asset_code']));
        $item_name = mysqli_real_escape_string($connection, trim($_POST['item_name']));
        $brand_model = mysqli_real_escape_string($connection, trim($_POST['brand_model']));
        $description = mysqli_real_escape_string($connection, trim($_POST['description'] ?? ''));
        $inclusions = mysqli_real_escape_string($connection, trim($_POST['inclusions'] ?? ''));
        $product_id = mysqli_real_escape_string($connection, trim($_POST['product_id']));
        $serial_number = mysqli_real_escape_string($connection, trim($_POST['serial_number']));
        $imei = mysqli_real_escape_string($connection, trim($_POST['imei']));
        $supplier = mysqli_real_escape_string($connection, trim($_POST['supplier']));
        $received_date = mysqli_real_escape_string($connection, trim($_POST['received_date']));
        $price = mysqli_real_escape_string($connection, trim($_POST['price']));
        $release_to = mysqli_real_escape_string($connection, trim($_POST['release_to']));
        $branch_add = mysqli_real_escape_string($connection, trim($_POST['branch_add']));
        $release_date = mysqli_real_escape_string($connection, trim($_POST['release_date']));
        $purpose = mysqli_real_escape_string($connection, trim($_POST['purpose']));

        $queryUpdate = "UPDATE assets_inventory SET ";
                $queryUpdate .= "code = '$code', ";
                $queryUpdate .= "asset_code = '$asset_code', ";
                $queryUpdate .= "item_name = '$item_name', ";
                $queryUpdate .= "brand_model = '$brand_model', ";
                $queryUpdate .= "description = '$description', ";
                $queryUpdate .= "inclusions = '$inclusions' ";
                $queryUpdate .= "product_id = '$product_id' ";
                $queryUpdate .= "serial_number = '$serial_number' ";
                $queryUpdate .= "imei = '$imei' ";
                $queryUpdate .= "supplier = '$supplier' ";
                $queryUpdate .= "received_date = '$received_date' ";
                $queryUpdate .= "price = '$price' ";
                $queryUpdate .= "release_to = '$release_to' ";
                $queryUpdate .= "release_date = '$release_date' ";
                $queryUpdate .= "purpose = '$purpose' ";
                $queryUpdate .= "WHERE id = '$updateId'";

                $sqlUpdate = mysqli_query($connection, $queryUpdate);
                if(!$sqlUpdate) {
                    echo "Error updating record: " . mysqli_error($connection);
                } else {
                    echo "Record updated successfully";
                }
    }
}

//UPDATE ASSETS

function editAsset() {
    global $connection;

    if (isset($_GET['edit-btn'])) {
        // Process the form data
        $code = mysqli_real_escape_string($connection, trim($_POST['code']));
        $asset_code = mysqli_real_escape_string($connection, trim($_POST['asset_code']));
        $item_name = mysqli_real_escape_string($connection, trim($_POST['item_name']));
        $brand_model = mysqli_real_escape_string($connection, trim($_POST['brand_model']));
        $description = mysqli_real_escape_string($connection, trim($_POST['description'] ?? ''));
        $inclusions = mysqli_real_escape_string($connection, trim($_POST['inclusions'] ?? ''));
        $product_id = mysqli_real_escape_string($connection, trim($_POST['product_id']));
        $serial_number = mysqli_real_escape_string($connection, trim($_POST['serial_number']));
        $imei = mysqli_real_escape_string($connection, trim($_POST['imei']));
        $supplier = mysqli_real_escape_string($connection, trim($_POST['supplier']));
        $received_date = mysqli_real_escape_string($connection, trim($_POST['received_date']));
        $price = mysqli_real_escape_string($connection, trim($_POST['price']));
        $release_to = mysqli_real_escape_string($connection, trim($_POST['release_to']));
        $branch_add = mysqli_real_escape_string($connection, trim($_POST['branch_add']));
        $release_date = mysqli_real_escape_string($connection, trim($_POST['release_date']));
        $purpose = mysqli_real_escape_string($connection, trim($_POST['purpose']));

        $queryUpdate = "UPDATE assets_inventory SET ";
                $queryUpdate .= "code = '$code', ";
                $queryUpdate .= "asset_code = '$asset_code', ";
                $queryUpdate .= "item_name = '$item_name', ";
                $queryUpdate .= "brand_model = '$brand_model', ";
                $queryUpdate .= "description = '$description', ";
                $queryUpdate .= "inclusions = '$inclusions' ";
                $queryUpdate .= "product_id = '$product_id' ";
                $queryUpdate .= "serial_number = '$serial_number' ";
                $queryUpdate .= "imei = '$imei' ";
                $queryUpdate .= "supplier = '$supplier' ";
                $queryUpdate .= "received_date = '$received_date' ";
                $queryUpdate .= "price = '$price' ";
                $queryUpdate .= "release_to = '$release_to' ";
                $queryUpdate .= "release_date = '$release_date' ";
                $queryUpdate .= "purpose = '$purpose' ";
                $queryUpdate .= "WHERE id = '$updateId'";

                $sqlUpdate = mysqli_query($connection, $queryUpdate);
                if(!$sqlUpdate) {
                    echo "Error updating record: " . mysqli_error($connection);
                } else {
                    echo "Record updated successfully";
                }
    }
}
