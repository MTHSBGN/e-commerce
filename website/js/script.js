var http = new XMLHttpRequest();
var url = 'http://localhost:3000/product/';
var num_element = 8;
var image_path = "images/"

http.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    products = JSON.parse(this.responseText);
    products = _.shuffle(products);

    container = document.getElementById('cards-container');
    for (product of products) {
      product.value = JSON.parse(product.value);
      container.appendChild(createCard(product));
    }
  }
};

http.open('GET', url, true);
http.send();

// Creates a single card
function createCard(product) {
  var cardDiv = document.createElement('div');
  cardDiv.classList.add('card');

  // Load image of the product
  var image = document.createElement('img');
  image.src = image_path + product.value.images[0];

  // Set title and price
  var dataDiv = document.createElement('div');
  dataDiv.classList.add('card-info');
  var title = createParagraph(_.startCase(product.name));
  var price = createParagraph(product.price.toString() + '€');

  dataDiv.appendChild(price);
  dataDiv.appendChild(title);

  cardDiv.appendChild(image);
  cardDiv.appendChild(dataDiv);

  return cardDiv;
}

function createParagraph(text) {
  var p = document.createElement('p');

  p.innerText = text;

  return p;
}
