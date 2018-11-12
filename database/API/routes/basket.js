const express = require('express');
const database = require('../lib/database');

const router = express.Router();

router.get('/', (req, res) => {
  if (!req.session.basket || req.session.basket.length == 0) {
    res.render('basket', {
      login: req.session.login,
      empty: true
    });

    return;
  }

  let idString = '';
  for (let product of req.session.basket) {
    idString += `"${product.id}",`;
  }

  let queryString = `SELECT * 
  FROM Product
  INNER JOIN Sku
  ON Product.product_id = Sku.product_id
  INNER JOIN Image
  ON Sku.sku_id = Image.sku_id
  WHERE Sku.sku_id 
  IN (${idString.slice(0, idString.length - 1)})
  GROUP BY Sku.sku_id`;

  let total = 0;
  database
    .query(queryString)
    .then(rows => {
      for (let i = 0; i < rows.length; i++) {
        rows[i].quantity = parseInt(req.session.basket[i].quantity);
        rows[i].total_price = rows[i].price * rows[i].quantity;
        total += rows[i].total_price;
      }

      res.render('basket', {
        login: req.session.login,
        products: rows,
        total: total,
        empty: false
      });
    })
    .catch(err => {
      console.log(err);
    });
});

router.post('/:id', (req, res) => {
  let basket = req.session.basket;
  let existed = false;

  let size = 0;
  if (basket) {
    size = basket.length;
  }

  // Update the product if it is already in the basket
  for (let i = 0; i < size; i++) {
    if (basket[i].id == req.params.id) {
      basket[i].quantity += req.params.quantity;
      existed = true;
      break;
    }
  }

  // Creates it if it is not in the basket
  if (!existed) {
    let product = {
      id: req.params.id,
      quantity: req.body.quantity
    };

    // In case the basket has not been created yet
    if (size == 0) {
      req.session.basket = [product];
    } else {
      for (let i = 0; i < size; i++) {
        if (req.session.basket[i].id > req.params.id) {
          req.session.basket.splice(i, 0, product);
          break;
        } else if (i == size - 1) {
          req.session.basket.push(product);
        }
      }
    }
  }

  res.sendStatus(200);
});

router.put('/:id', (req, res) => {
  let basket = req.session.basket;
  for (let i = 0; i < basket.length; i++) {
    if (basket[i].id == req.params.id) {
      basket[i].quantity = req.body.quantity;
      break;
    }
  }

  res.sendStatus(200);
});

router.delete('/:id', (req, res) => {
  let basket = req.session.basket;
  for (let i = 0; i < basket.length; i++) {
    if (basket[i].id == req.params.id) {
      basket.splice(i, 1);
      break;
    }
  }

  res.sendStatus(200);
});

module.exports = router;
