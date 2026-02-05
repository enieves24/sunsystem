<?php
// ...existing code...
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
-              <button class="edit-btn" onclick="openEditModal
-              ('<?php echo $results['code']?>', 
-              '<?php echo $results['asset_code']?>', 
-              '<?php echo $results['item_name']?>', 
-              '<?php echo $results['brand_model']?>', 
-              '<?php echo $results['description']?>', 
-              '<?php echo $results['inclusions']?>', 
-              '<?php echo $results['product_id']?>', 
-              '<?php echo $results['serial_number']?>', 
-              '<?php echo $results['imei']?>', 
-              '<?php echo $results['supplier']?>', 
-              '<?php echo $results['received_date']?>', 
-              '<?php echo $results['price']?>', 
-              '<?php echo $results['release_to']?>', 
-              '<?php echo $results['branch_add']?>', 
-              '<?php echo $results['release_date']?>', 
-              '<?php echo $results['purpose']?>')">    
-              Update Assets</button> 
+              <button
+                class="edit-btn"
+                type="button"
+                onclick="openEditModalFromButton(this)"
+                data-code="<?php echo htmlspecialchars($results['code'], ENT_QUOTES)?>"
+                data-asset_code="<?php echo htmlspecialchars($results['asset_code'], ENT_QUOTES)?>"
+                data-item_name="<?php echo htmlspecialchars($results['item_name'], ENT_QUOTES)?>"
+                data-brand_model="<?php echo htmlspecialchars($results['brand_model'], ENT_QUOTES)?>"
+                data-description="<?php echo htmlspecialchars($results['description'], ENT_QUOTES)?>"
+                data-inclusions="<?php echo htmlspecialchars($results['inclusions'], ENT_QUOTES)?>"
+                data-product_id="<?php echo htmlspecialchars($results['product_id'], ENT_QUOTES)?>"
+                data-serial_number="<?php echo htmlspecialchars($results['serial_number'], ENT_QUOTES)?>"
+                data-imei="<?php echo htmlspecialchars($results['imei'], ENT_QUOTES)?>"
+                data-supplier="<?php echo htmlspecialchars($results['supplier'], ENT_QUOTES)?>"
+                data-received_date="<?php echo htmlspecialchars($results['received_date'], ENT_QUOTES)?>"
+                data-price="<?php echo htmlspecialchars($results['price'], ENT_QUOTES)?>"
+                data-release_to="<?php echo htmlspecialchars($results['release_to'], ENT_QUOTES)?>"
+                data-branch_add="<?php echo htmlspecialchars($results['branch_add'], ENT_QUOTES)?>"
+                data-release_date="<?php echo htmlspecialchars($results['release_date'], ENT_QUOTES)?>"
+                data-purpose="<?php echo htmlspecialchars($results['purpose'], ENT_QUOTES)?>"
+              >
+                Update Assets
+              </button>
               
               <button class="delete-btn">Delete</button>
             </td>
           </tr>
         </tbody>
         <?php }?> 
// ...existing code...

<!-- Edit Asset Modal -->
<div id="editAssetModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>Edit Asset</h3>
    <form id="editAssetForm" method="POST">
-      <input type="hidden" name="code" id="editCode">
-
-      <label>Asset Code:</label>
-      <input type="hidden" name="asset_code" id="editAssetCode" value="<?php echo $results['asset_code']?>" required>
-
-      <label>Item Name:</label>
-      <input type="hidden" name="item_name" id="editItemName" value="<?php echo $results['item_name']?>" required>
-
-      <label>Brand / Model:</label>
-      <input type="hidden" name="brand_model" id="editBrandModel" value="<?php echo $results['brand_model']?>">
-
-      <label>Description / Specification:</label>
-      <textarea name="description" type="hidden" rows="2" id="editDescription" value="<?php echo $results['description']?>"></textarea>
-
-      <label>Inclusions / Accessories:</label>
-      <textarea name="inclusions" type="hidden" rows="2" id="editInclusions" value="<?php echo $results['inclusions']?>"></textarea>
-
-      <label>Product ID:</label>
-      <input type="hidden" name="product_id" id="editProductId" value="<?php echo $results['product_id']?>">
-
-      <label>Serial No.:</label>
-      <input type="hidden" name="serial_number" id="editSerialNumber" value="<?php echo $results['serial_number']?>">
-
-      <label>EMEI:</label>
-      <input type="hidden" name="imei" id="editImei" value="<?php echo $results['imei']?>">
-
-      <label>Supplier:</label>
-      <input type="hidden" name="supplier" id="editSupplier" value="<?php echo $results['supplier']?>">
-
-      <label>Received Date:</label>
-      <input type="hidden" name="received_date" id="editReceivedDate" value="<?php echo $results['received_date']?>">
-
-      <label>Price:</label>
-      <input type="hidden" name="price" step="0.01" id="editPrice" value="<?php echo $results['price']?>">
-
-      <label>Release To:</label>
-      <input type="hidden" name="release_to" id="ReleaseTo" value="<?php echo $results['release_to']?>">
-
-      <label>Branch:</label>
-      <input type="hidden" name="branch_add" id="editBranchAdd" value="<?php echo $results['branch_add']?>">
-
-      <label>Release Date:</label>
-      <input type="hidden" name="release_date" id="editReleaseDate" value="<?php echo $results['release_date']?>">
-
-      <label>Purpose:</label>
-      <textarea name="purpose" type="hidden" rows="2" id="editPurpose" value="<?php echo $results['purpose']?>"></textarea>
+      <input type="hidden" name="code" id="editCode">
+
+      <label>Asset Code:</label>
+      <input type="text" name="asset_code" id="editAssetCode" required>
+
+      <label>Item Name:</label>
+      <input type="text" name="item_name" id="editItemName" required>
+
+      <label>Brand / Model:</label>
+      <input type="text" name="brand_model" id="editBrandModel">
+
+      <label>Description / Specification:</label>
+      <textarea name="description" rows="2" id="editDescription"></textarea>
+
+      <label>Inclusions / Accessories:</label>
+      <textarea name="inclusions" rows="2" id="editInclusions"></textarea>
+
+      <label>Product ID:</label>
+      <input type="text" name="product_id" id="editProductId">
+
+      <label>Serial No.:</label>
+      <input type="text" name="serial_number" id="editSerialNumber">
+
+      <label>EMEI:</label>
+      <input type="text" name="imei" id="editImei">
+
+      <label>Supplier:</label>
+      <input type="text" name="supplier" id="editSupplier">
+
+      <label>Received Date:</label>
+      <input type="date" name="received_date" id="editReceivedDate">
+
+      <label>Price:</label>
+      <input type="number" name="price" step="0.01" id="editPrice">
+
+      <label>Release To:</label>
+      <input type="text" name="release_to" id="editReleaseTo">
+
+      <label>Branch:</label>
+      <input type="text" name="branch_add" id="editBranchAdd">
+
+      <label>Release Date:</label>
+      <input type="date" name="release_date" id="editReleaseDate">
+
+      <label>Purpose:</label>
+      <textarea name="purpose" rows="2" id="editPurpose"></textarea>
 
       <!-- Add other fields as necessary -->
       <button type="submit" name="edit">Update</button>
     </form>
   </div>
 </div>
       
// ...existing code...

  <script src="./javascript/index.js"></script>
+  <script>
+    // safe close that hides both modals
+    function closeModal() {
+      const a = document.getElementById('assetModal');
+      const e = document.getElementById('editAssetModal');
+      if (a) a.style.display = 'none';
+      if (e) e.style.display = 'none';
+    }
+
+    // Open edit modal and populate fields from data-* attributes
+    function openEditModalFromButton(btn) {
+      const m = document.getElementById('editAssetModal');
+      if (!m) return;
+
+      // helper to set value if element exists
+      function set(id, val) {
+        const el = document.getElementById(id);
+        if (!el) return;
+        el.value = val ?? '';
+      }
+
+      set('editCode', btn.dataset.code);
+      set('editAssetCode', btn.dataset.asset_code);
+      set('editItemName', btn.dataset.item_name);
+      set('editBrandModel', btn.dataset.brand_model);
+      // textareas
+      document.getElementById('editDescription').value = btn.dataset.description || '';
+      document.getElementById('editInclusions').value = btn.dataset.inclusions || '';
+      set('editProductId', btn.dataset.product_id);
+      set('editSerialNumber', btn.dataset.serial_number);
+      set('editImei', btn.dataset.imei);
+      set('editSupplier', btn.dataset.supplier);
+      set('editReceivedDate', btn.dataset.received_date);
+      set('editPrice', btn.dataset.price);
+      set('editReleaseTo', btn.dataset.release_to);
+      set('editBranchAdd', btn.dataset.branch_add);
+      set('editReleaseDate', btn.dataset.release_date);
+      document.getElementById('editPurpose').value = btn.dataset.purpose || '';
+
+      m.style.display = 'block';
+      // focus first input
+      const first = document.getElementById('editAssetCode');
+      if (first) first.focus();
+    }
+  </script>
 </body>
 </html>
```// filepath: d:\xampp\htdocs\sunsystem\admin.php
// ...existing code...
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
-              <button class="edit-btn" onclick="openEditModal
-              ('<?php echo $results['code']?>', 
-              '<?php echo $results['asset_code']?>', 
-              '<?php echo $results['item_name']?>', 
-              '<?php echo $results['brand_model']?>', 
-              '<?php echo $results['description']?>', 
-              '<?php echo $results['inclusions']?>', 
-              '<?php echo $results['product_id']?>', 
-              '<?php echo $results['serial_number']?>', 
-              '<?php echo $results['imei']?>', 
-              '<?php echo $results['supplier']?>', 
-              '<?php echo $results['received_date']?>', 
-              '<?php echo $results['price']?>', 
-              '<?php echo $results['release_to']?>', 
-              '<?php echo $results['branch_add']?>', 
-              '<?php echo $results['release_date']?>', 
-              '<?php echo $results['purpose']?>')">    
-              Update Assets</button> 
+              <button
+                class="edit-btn"
+                type="button"
+                onclick="openEditModalFromButton(this)"
+                data-code="<?php echo htmlspecialchars($results['code'], ENT_QUOTES)?>"
+                data-asset_code="<?php echo htmlspecialchars($results['asset_code'], ENT_QUOTES)?>"
+                data-item_name="<?php echo htmlspecialchars($results['item_name'], ENT_QUOTES)?>"
+                data-brand_model="<?php echo htmlspecialchars($results['brand_model'], ENT_QUOTES)?>"
+                data-description="<?php echo htmlspecialchars($results['description'], ENT_QUOTES)?>"
+                data-inclusions="<?php echo htmlspecialchars($results['inclusions'], ENT_QUOTES)?>"
+                data-product_id="<?php echo htmlspecialchars($results['product_id'], ENT_QUOTES)?>"
+                data-serial_number="<?php echo htmlspecialchars($results['serial_number'], ENT_QUOTES)?>"
+                data-imei="<?php echo htmlspecialchars($results['imei'], ENT_QUOTES)?>"
+                data-supplier="<?php echo htmlspecialchars($results['supplier'], ENT_QUOTES)?>"
+                data-received_date="<?php echo htmlspecialchars($results['received_date'], ENT_QUOTES)?>"
+                data-price="<?php echo htmlspecialchars($results['price'], ENT_QUOTES)?>"
+                data-release_to="<?php echo htmlspecialchars($results['release_to'], ENT_QUOTES)?>"
+                data-branch_add="<?php echo htmlspecialchars($results['branch_add'], ENT_QUOTES)?>"
+                data-release_date="<?php echo htmlspecialchars($results['release_date'], ENT_QUOTES)?>"
+                data-purpose="<?php echo htmlspecialchars($results['purpose'], ENT_QUOTES)?>"
+              >
+                Update Assets
+              </button>
               
               <button class="delete-btn">Delete</button>
             </td>
           </tr>
         </tbody>
         <?php }?> 
// ...existing code...

<!-- Edit Asset Modal -->
<div id="editAssetModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>Edit Asset</h3>
    <form id="editAssetForm" method="POST">
-      <input type="hidden" name="code" id="editCode">
-
-      <label>Asset Code:</label>
-      <input type="hidden" name="asset_code" id="editAssetCode" value="<?php echo $results['asset_code']?>" required>
-
-      <label>Item Name:</label>
-      <input type="hidden" name="item_name" id="editItemName" value="<?php echo $results['item_name']?>" required>
-
-      <label>Brand / Model:</label>
-      <input type="hidden" name="brand_model" id="editBrandModel" value="<?php echo $results['brand_model']?>">
-
-      <label>Description / Specification:</label>
-      <textarea name="description" type="hidden" rows="2" id="editDescription" value="<?php echo $results['description']?>"></textarea>
-
-      <label>Inclusions / Accessories:</label>
-      <textarea name="inclusions" type="hidden" rows="2" id="editInclusions" value="<?php echo $results['inclusions']?>"></textarea>
-
-      <label>Product ID:</label>
-      <input type="hidden" name="product_id" id="editProductId" value="<?php echo $results['product_id']?>">
-
-      <label>Serial No.:</label>
-      <input type="hidden" name="serial_number" id="editSerialNumber" value="<?php echo $results['serial_number']?>">
-
-      <label>EMEI:</label>
-      <input type="hidden" name="imei" id="editImei" value="<?php echo $results['imei']?>">
-
-      <label>Supplier:</label>
-      <input type="hidden" name="supplier" id="editSupplier" value="<?php echo $results['supplier']?>">
-
-      <label>Received Date:</label>
-      <input type="hidden" name="received_date" id="editReceivedDate" value="<?php echo $results['received_date']?>">
-
-      <label>Price:</label>
-      <input type="hidden" name="price" step="0.01" id="editPrice" value="<?php echo $results['price']?>">
-
-      <label>Release To:</label>
-      <input type="hidden" name="release_to" id="ReleaseTo" value="<?php echo $results['release_to']?>">
-
-      <label>Branch:</label>
-      <input type="hidden" name="branch_add" id="editBranchAdd" value="<?php echo $results['branch_add']?>">
-
-      <label>Release Date:</label>
-      <input type="hidden" name="release_date" id="editReleaseDate" value="<?php echo $results['release_date']?>">
-
-      <label>Purpose:</label>
-      <textarea name="purpose" type="hidden" rows="2" id="editPurpose" value="<?php echo $results['purpose']?>"></textarea>
+      <input type="hidden" name="code" id="editCode">
+
+      <label>Asset Code:</label>
+      <input type="text" name="asset_code" id="editAssetCode" required>
+
+      <label>Item Name:</label>
+      <input type="text" name="item_name" id="editItemName" required>
+
+      <label>Brand / Model:</label>
+      <input type="text" name="brand_model" id="editBrandModel">
+
+      <label>Description / Specification:</label>
+      <textarea name="description" rows="2" id="editDescription"></textarea>
+
+      <label>Inclusions / Accessories:</label>
+      <textarea name="inclusions" rows="2" id="editInclusions"></textarea>
+
+      <label>Product ID:</label>
+      <input type="text" name="product_id" id="editProductId">
+
+      <label>Serial No.:</label>
+      <input type="text" name="serial_number" id="editSerialNumber">
+
+      <label>EMEI:</label>
+      <input type="text" name="imei" id="editImei">
+
+      <label>Supplier:</label>
+      <input type="text" name="supplier" id="editSupplier">
+
+      <label>Received Date:</label>
+      <input type="date" name="received_date" id="editReceivedDate">
+
+      <label>Price:</label>
+      <input type="number" name="price" step="0.01" id="editPrice">
+
+      <label>Release To:</label>
+      <input type="text" name="release_to" id="editReleaseTo">
+
+      <label>Branch:</label>
+      <input type="text" name="branch_add" id="editBranchAdd">
+
+      <label>Release Date:</label>
+      <input type="date" name="release_date" id="editReleaseDate">
+
+      <label>Purpose:</label>
+      <textarea name="purpose" rows="2" id="editPurpose"></textarea>
 
       <!-- Add other fields as necessary -->
       <button type="submit" name="edit">Update</button>
     </form>
   </div>
 </div>
       
// ...existing code...

  <script src="./javascript/index.js"></script>
+  <script>
+    // safe close that hides both modals
+    function closeModal() {
+      const a = document.getElementById('assetModal');
+      const e = document.getElementById('editAssetModal');
+      if (a) a.style.display = 'none';
+      if (e) e.style.display = 'none';
+    }
+
+    // Open edit modal and populate fields from data-* attributes
+    function openEditModalFromButton(btn) {
+      const m = document.getElementById('editAssetModal');
+      if (!m) return;
+
+      // helper to set value if element exists
+      function set(id, val) {
+        const el = document.getElementById(id);
+        if (!el) return;
+        el.value = val ?? '';
+      }
+
+      set('editCode', btn.dataset.code);
+      set('editAssetCode', btn.dataset.asset_code);
+      set('editItemName', btn.dataset.item_name);
+      set('editBrandModel', btn.dataset.brand_model);
+      // textareas
+      document.getElementById('editDescription').value = btn.dataset.description || '';
+      document.getElementById('editInclusions').value = btn.dataset.inclusions || '';
+      set('editProductId', btn.dataset.product_id);
+      set('editSerialNumber', btn.dataset.serial_number);
+      set('editImei', btn.dataset.imei);
+      set('editSupplier', btn.dataset.supplier);
+      set('editReceivedDate', btn.dataset.received_date);
+      set('editPrice', btn.dataset.price);
+      set('editReleaseTo', btn.dataset.release_to);
+      set('editBranchAdd', btn.dataset.branch_add);
+      set('editReleaseDate', btn.dataset.release_date);
+      document.getElementById('editPurpose').value = btn.dataset.purpose || '';
+
+      m.style.display = 'block';
+      // focus first input
+      const first = document.getElementById('editAssetCode');
+      if (first) first.focus();
+    }
+  </script>
 </body>
 </html>