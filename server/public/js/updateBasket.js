// Add an item to the basket
let basketButton = document.getElementById('add-basket');
if (basketButton) {
  basketButton.onclick = function() {
    let req = new XMLHttpRequest();
    let sku_id = this.closest('.product__info').children[0].innerHTML;
    let quantityInput = document.getElementById('quantity');

    req.open('POST', `http://localhost:3000/basket/${sku_id}`, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send(`quantity=${quantityInput.value}`);
  };
}

// Delete an item form the basket
let removeButtons = document.getElementsByClassName('basket-product__cancel');
for (element of removeButtons) {
  element.onclick = function() {
    let product = this.closest('.basket-product');
    let id = product.children[0].innerHTML;

    let req = new XMLHttpRequest();
    req.open('DELETE', `http://localhost:3000/basket/${id}`, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send();
    req.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.location.reload();
      }
    };
  };
}

// Update an item from the basket
let quantityUpdate = document.getElementById('quantity-update');
if (quantityUpdate) {
  quantityUpdate.onchange = function() {
    let product = this.closest('.basket-product');
    let id = product.children[0].innerHTML;
    let req = new XMLHttpRequest();
    req.open('PUT', `http://localhost:3000/basket/${id}`, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send(`quantity=${this.value}`);
    req.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.location.reload();
      }
    };
  };
}
