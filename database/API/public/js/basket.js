const basketButton = document.getElementById('basket-button');

basketButton.onclick = function() {
  let req = new XMLHttpRequest();
  let arr = window.location.pathname.split('/');
  let quantityInput = document.getElementById('input-quantity');

  req.open('POST', 'add/' + arr[arr.length - 1], true);
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  req.send(`quantity=${quantityInput.value}`);
};
