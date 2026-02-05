function showSection(id) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
      section.style.display = (section.id === id) ? 'block' : 'none';
    });
  }

  function toggleForm(formId) {
  const nameForm = document.getElementById('nameForm');
  const passwordForm = document.getElementById('passwordForm');

  if (formId === 'nameForm') {
    nameForm.style.display = (nameForm.style.display === 'block') ? 'none' : 'block';
    passwordForm.style.display = 'none';
  } else {
    passwordForm.style.display = (passwordForm.style.display === 'block') ? 'none' : 'block';
    nameForm.style.display = 'none';
  }
}


  function openModal() {
    document.getElementById("assetModal").style.display = "block";
  }

  function closeModal() {
    document.getElementById("assetModal").style.display = "none";
  }

  // Optional: Close modal when clicking outside
  window.onclick = function(event) {
    const modal = document.getElementById("assetModal");
    if (event.target === modal) {
      closeModal();
    }
  };

  function openModal() {
  document.getElementById("assetModal").style.display = "block";
}

function closeModal() {
  document.getElementById("assetModal").style.display = "none";
}


function openEditModal(button) {
  var modal = document.getElementById('editAssetModal');
  document.getElementById('editAssetId').value = button.getAttribute('data-asset_id');
  document.getElementById('editCode').value = button.getAttribute('data-code');
  document.getElementById('editAssetCode').value = button.getAttribute('data-asset_code');
  document.getElementById('editItemName').value = button.getAttribute('data-item_name');
  document.getElementById('editBrandModel').value = button.getAttribute('data-brand_model');
  document.getElementById('editDescription').value = button.getAttribute('data-description');
  document.getElementById('editInclusions').value = button.getAttribute('data-inclusions');
  document.getElementById('editProductId').value = button.getAttribute('data-product_id');
  document.getElementById('editSerialNumber').value = button.getAttribute('data-serial_number');
  document.getElementById('editImei').value = button.getAttribute('data-imei');
  document.getElementById('editSupplier').value = button.getAttribute('data-supplier');
  document.getElementById('editReceivedDate').value = button.getAttribute('data-received_date');
  document.getElementById('editPrice').value = button.getAttribute('data-price');
  document.getElementById('editReleaseTo').value = button.getAttribute('data-release_to');
  document.getElementById('editBranchAdd').value = button.getAttribute('data-branch_add');
  document.getElementById('editReleaseDate').value = button.getAttribute('data-release_date');
  document.getElementById('editPurpose').value = button.getAttribute('data-purpose');
  modal.style.display = 'block';
}

function closeModal() {
  document.getElementById('editAssetModal').style.display = 'none';
  document.getElementById('assetModal').style.display = 'none';
}

// Optional: Close modal when clicking outside modal-content
window.onclick = function(event) {
  var editModal = document.getElementById('editAssetModal');
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
}


// Function to close any modal
function closeModal() {
    var modals = document.getElementsByClassName('modal');
    for (var i = 0; i < modals.length; i++) {
        modals[i].style.display = 'none';
    }
}

// Optional: Close modal when clicking outside of it
window.onclick = function(event) {
    var modals = document.getElementsByClassName('modal');
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}


