<?php session_start(); ?>
<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['account_type'] !== 'admin') {
    echo "Access denied. Admins only.";
    exit();
}
?>
<?php include 'functions.php'; ?>
<?php addAssets(); ?>
<?php $sqlDisplay = displayAssets(); ?>
<?php
require_once 'functions.php';
updateAsset(); // Call the update function
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="dashboard">
  <aside class="sidebar">
    <h2>Admin Panel</h2>
    <nav>
      <ul>
        <li><a href="#" onclick="showSection('assets')">Assets Inventory</a></li>
        <li><a href="#" onclick="showSection('ticketing')">Ticketing System</a></li>
        <li><a href="#" onclick="showSection('profile')">Profile Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </aside>

  <main class="main-content">
  <header class="header-banner">
    <div class="section-header">
        <img src="./assets/header.png" alt="Header Logo" class="header-logo">
  </div>
    <h1>Welcome, Admin <?php echo ucwords(htmlspecialchars($_SESSION['username'])); ?></h1>

  </header>

  <!-- Assets Inventory Section -->
  <section id="assets" class="content-section">
    <h3>Assets Inventory</h3>
    <div class="info-box">
    <p>ITI - FOR BRANCH USER</p>
    <p>ITD - FOR IT DATA CENTER / SERVER USE</p>
    <p>ITR - FOR PARTS REPLACEMENT</p>
    <p>ITR - 00X-YYYY-MM-DD0X-(LAST 8 DIGIT CODE OF MAIN UNIT)</p>
    <!--MODAL-->
<!-- Action Bar -->
<div class="action-bar">
  <div class="search-group">
    <input type="text" placeholder="Search assets...">
    <button class="search-btn">Search</button>
    <button class="add-btn" onclick="openModal()">Add Assets</button>
  </div>
</div>

<!-- Modal Structure -->
<!-- Add Assets Modal -->
<div id="assetModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>Add New Asset</h3>
    <form action="admin.php" method="POST" id="assetForm"  >

      <label>Code:</label>
      <input type="text" name="code" required>

      <label>Asset Code:</label>
      <input type="text" name="asset_code" required>

      <label>Item Name:</label>
      <input type="text" name="item_name" required>

      <label>Brand / Model:</label>
      <input type="text" name="brand_model">

      <label>Description / Specification:</label>
      <textarea name="description" rows="2"></textarea>

      <label>Inclusions / Accessories:</label>
      <textarea name="inclusions" rows="2"></textarea>

      <label>Product ID:</label>
      <input type="text" name="product_id">

      <label>Serial No.:</label>
      <input type="text" name="serial_number">

      <label>EMEI:</label>
      <input type="text" name="imei">

      <label>Supplier:</label>
      <input type="text" name="supplier">

      <label>Received Date:</label>
      <input type="date" name="received_date">

      <label>Price:</label>
      <input type="number" name="price" step="0.01">

      <label>Release To:</label>
      <input type="text" name="release_to">

      <label>Branch:</label>
      <input type="text" name="branch_add">

      <label>Release Date:</label>
      <input type="date" name="release_date">

      <label>Purpose:</label>
      <textarea name="purpose" rows="2"></textarea>

      <!-- Action Buttons -->
      <div class="form-actions">
        <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
        <button type="submit" class="confirm-btn" name="add">Confirm</button>
      </div>
    </form>
  </div>
</div>



    <!--END OF MODAL-->
  </div>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>CODE</th>
            <th>ASSET CODE</th>
            <th>ITEM NAME</th>
            <th>BRAND / MODEL</th>
            <th>DESCRIPTION / SPECIFICATION</th>
            <th>INCLUSIONS / ACCESSORIES</th>
            <th>PRODUCT ID</th>
            <th>SERIAL NO.</th>
            <th>EMEI</th>
            <th>SUPPLIER</th>
            <th>RECEIVED DATE</th>
            <th>PRICE</th>
            <th>RELEASE TO</th>
            <th>BRANCH</th>
            <th>RELEASE DATE</th>
            <th>PURPOSE</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while($results = mysqli_fetch_assoc($sqlDisplay)){ ?>
          <tr>
            <td><?php echo $results['code']?></td>
            <td><?php echo $results['asset_code']?></td>
            <td><?php echo $results['item_name']?></td>
            <td><?php echo $results['brand_model']?></td>
            <td><?php echo $results['description']?></td>
            <td><?php echo $results['inclusions']?></td>
            <td><?php echo $results['product_id']?></td>
            <td><?php echo $results['serial_number']?></td>
            <td><?php echo $results['imei']?></td>
            <td><?php echo $results['supplier']?></td>
            <td><?php echo $results['received_date']?></td>
            <td><?php echo $results['price']?></td>
            <td><?php echo $results['release_to']?></td>
            <td><?php echo $results['branch_add']?></td>
            <td><?php echo $results['release_date']?></td>
            <td><?php echo $results['purpose']?></td>
            <td>
              <button class="edit-btn" onclick="openEditModal
              ('<?php echo $results['code']?>', 
              '<?php echo $results['asset_code']?>', 
              '<?php echo $results['item_name']?>', 
              '<?php echo $results['brand_model']?>', 
              '<?php echo $results['description']?>', 
              '<?php echo $results['inclusions']?>', 
              '<?php echo $results['product_id']?>', 
              '<?php echo $results['serial_number']?>', 
              '<?php echo $results['imei']?>', 
              '<?php echo $results['supplier']?>', 
              '<?php echo $results['received_date']?>', 
              '<?php echo $results['price']?>', 
              '<?php echo $results['release_to']?>', 
              '<?php echo $results['branch_add']?>', 
              '<?php echo $results['release_date']?>', 
              '<?php echo $results['purpose']?>')">    
              Update Assets</button> 
              
              <button class="delete-btn">Delete</button>
            </td>
          </tr>
        </tbody>
        <?php }?>
      </table>
    </div>
  </section>

<!-- Edit Asset Modal -->
<div id="editAssetModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>Edit Asset</h3>
    <form id="editAssetForm" method="POST">
      <input type="hidden" name="code" id="editCode">

      <label>Asset Code:</label>
      <input type="hidden" name="asset_code" id="editAssetCode" value="<?php echo $results['asset_code']?>" required>

      <label>Item Name:</label>
      <input type="hidden" name="item_name" id="editItemName" value="<?php echo $results['item_name']?>" required>

      <label>Brand / Model:</label>
      <input type="hidden" name="brand_model" id="editBrandModel" value="<?php echo $results['brand_model']?>">

      <label>Description / Specification:</label>
      <textarea name="description" type="hidden" rows="2" id="editDescription" value="<?php echo $results['description']?>"></textarea>

      <label>Inclusions / Accessories:</label>
      <textarea name="inclusions" type="hidden" rows="2" id="editInclusions" value="<?php echo $results['inclusions']?>"></textarea>

      <label>Product ID:</label>
      <input type="hidden" name="product_id" id="editProductId" value="<?php echo $results['product_id']?>">

      <label>Serial No.:</label>
      <input type="hidden" name="serial_number" id="editSerialNumber" value="<?php echo $results['serial_number']?>">

      <label>EMEI:</label>
      <input type="hidden" name="imei" id="editImei" value="<?php echo $results['imei']?>">

      <label>Supplier:</label>
      <input type="hidden" name="supplier" id="editSupplier" value="<?php echo $results['supplier']?>">

      <label>Received Date:</label>
      <input type="hidden" name="received_date" id="editReceivedDate" value="<?php echo $results['received_date']?>">

      <label>Price:</label>
      <input type="hidden" name="price" step="0.01" id="editPrice" value="<?php echo $results['price']?>">

      <label>Release To:</label>
      <input type="hidden" name="release_to" id="ReleaseTo" value="<?php echo $results['release_to']?>">

      <label>Branch:</label>
      <input type="hidden" name="branch_add" id="editBranchAdd" value="<?php echo $results['branch_add']?>">

      <label>Release Date:</label>
      <input type="hidden" name="release_date" id="editReleaseDate" value="<?php echo $results['release_date']?>">

      <label>Purpose:</label>
      <textarea name="purpose" type="hidden" rows="2" id="editPurpose" value="<?php echo $results['purpose']?>"></textarea>

      <!-- Add other fields as necessary -->
      <button type="submit" name="edit">Update</button>
    </form>
  </div>
</div>
      
  <!-- Ticketing System Section -->
  <section id="ticketing" class="content-section" style="display:none">
    <h3>Ticketing System</h3>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Ticket ID</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Created Date</th>
            <th>Assigned To</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>TCK-101</td>
            <td>Printer Issue</td>
            <td>Office printer not working</td>
            <td>Open</td>
            <td>High</td>
            <td>2025-05-15</td>
            <td>Jane Smith</td>
            <td>
              <button class="edit-btn">Edit</button>
              <button class="delete-btn">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
 <!-- Profile Settings -->
<section id="profile" class="content-section" style="display:none">
  <h3 style="text-align:center; margin-bottom: 20px;">Profile Settings</h3>

  <div class="button-group">
    <button onclick="toggleForm('nameForm')">Change Name</button>
    <button onclick="toggleForm('passwordForm')">Change Password</button>
  </div>

  <form id="nameForm" class="profile-form" style="display:none; margin-top: 20px;">
    <label for="adminName">New Name:</label>
    <input type="text" id="adminName" name="adminName" placeholder="Enter new name" required>
    <button type="submit">Save Name</button>
  </form>

  <form id="passwordForm" class="profile-form" style="display:none; margin-top: 20px;">
    <label for="adminPassword">New Password:</label>
    <input type="password" id="adminPassword" name="adminPassword" placeholder="Enter new password" required>
    <label for="confirmPassword" style="margin-top: 10px;">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password" required>
    <button type="submit">Save Password</button>
  </form>
</section>


</div>
  <script src="./javascript/index.js"></script>
</body>
</html>
