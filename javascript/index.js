function openModal() {
  document.getElementById("assetModal").style.display = "block";
  //document.getElementById("updateModal").style.display = "block";
}

function closeModal() {
  const a = document.getElementById('assetModal');
  const e = document.getElementById('editAssetModal');
  if (a) a.style.display = 'none';
  if (e) e.style.display = 'none';
}

window.openEditModalFromButton = function(btn) {
    const m = document.getElementById('editAssetModal');
    if (!m) return;

    function set(id, val) {
        const el = document.getElementById(id);
        if (el) el.value = val ?? '';
    }

    set('editCode', btn.dataset.code);
    set('editAssetCode', btn.dataset.asset_code);
    set('editItemName', btn.dataset.item_name);
    set('editBrandModel', btn.dataset.brand_model);
    document.getElementById('editDescription').value = btn.dataset.description || '';
    document.getElementById('editInclusions').value = btn.dataset.inclusions || '';
    set('editProductId', btn.dataset.product_id);
    set('editSerialNumber', btn.dataset.serial_number);
    set('editImei', btn.dataset.imei);
    set('editSupplier', btn.dataset.supplier);
    set('editReceivedDate', btn.dataset.received_date);
    set('editPrice', btn.dataset.price);
    set('editReleaseTo', btn.dataset.release_to);
    set('editBranchAdd', btn.dataset.branch_add);
    set('editReleaseDate', btn.dataset.release_date);
    document.getElementById('editPurpose').value = btn.dataset.purpose || '';

    m.style.display = 'block';
};



