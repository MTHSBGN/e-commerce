const express = require('express');
const query = require('../lib/database');

const router = express.Router();

router.get('/:id', (req, res) => {
  queryString = `SELECT * FROM Product
  INNER JOIN Sku
  ON Product.product_id = Sku.product_id
  INNER JOIN Description
  ON Product.description_id = Description.description_id
  INNER JOIN Image
  ON Sku.sku_id = Image.sku_id
  WHERE Product.product_id = ${req.params.id}`;

  query(queryString)
    .then(rows => {
      context = {
        product: rows[0],
        login: req.session.login
      };
      res.render('product', context);
    })
    .catch(err => {
      console.log(err);
    });
});

router.post('/add/:id', (req, res) => {
  if (!req.session.basket) {
    req.session.basket = [];
  }

  let found = false;
  for (product of req.session.basket) {
    if (product.id == req.params.id) {
      product.quantity += req.body.quantity;
      found = true;
      break;
    }
  }

  if (!found) {
    req.session.basket.push({
      id: req.params.id,
      quantity: req.body.quantity
    });
  }

  res.sendStatus(200);
});

module.exports = router;
