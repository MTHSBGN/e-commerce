num_sku = 0;

function getSkuId(sku_id) {
  const id = document.getElementById(`sku_${sku_id}_id`).value;
  const price = document.getElementById(`sku_${sku_id}_price`).value;
  const stock = document.getElementById(`sku_${sku_id}_stock`).value;
  const description = document.getElementById(`sku_${sku_id}_description`).value;
  const images = [];
  for (image of document.getElementById(`sku_${sku_id}_images`).files) {
    images.push(image.name);
  }

  return { sku_id: id, price: price, stock: stock, description: description, images: images };
}

function addSKU() {
  num_sku++;
  let sku_id = num_sku.toString();
  let div = document.getElementById('sku_container');
  div.innerHTML += `<fieldset class="sku">
  <legend>SKU ${sku_id}</legend>

  <label for="sku_${sku_id}_id" class="form__label">ID</label>
  <input type="text" id="sku_${sku_id}_id" class="form__input" required>

  <label for="sku_${sku_id}_price" class="form__label">Prix</label>
  <input type="number" id="sku_${sku_id}_price" min="0" class="form__input" required>

  <label for="sku_${sku_id}_stock" class="form__label">Stock</label>
  <input type="number" id="sku_${sku_id}_stock" min="0" class="form__input" required>

  <label for="sku_${sku_id}_description" class="form__label">Description</label>
  <textarea rows="2" id="sku_${sku_id}_description" class="form__input" required></textarea>

  <label for="sku_${sku_id}_images" class="form__label">Images</label>
  <input type="file" multiple="multiple" id="sku_${sku_id}_images" class="form__input" required>
</fieldset>`;
}

const addSKUButton = document.getElementById('add_sku_button');
addSKUButton.onclick = function() {
  addSKU();
};

const button = document.getElementById('confirm_button');
button.onclick = function() {
  skus = [];
  for (let i = 1; i <= num_sku; i++) {
    skus.push(getSkuId(i));
  }

  let req = new XMLHttpRequest();
  let name = document.getElementById('product_name').value;
  req.open('POST', 'http://localhost:3000/admin/add/product', true);
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  req.send(`name=${name}&sku_ids=${JSON.stringify(skus)}`);
  document.location.reload();
};

addSKU();
