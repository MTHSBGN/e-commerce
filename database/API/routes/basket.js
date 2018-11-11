const express = require('express');
const query = require('../lib/database');

const router = express.Router();

router.get('/', (req, res) => {
  let idString = '';
  for (product of req.session.basket) {
    idString += `${product.id},`;
  }

  queryString = `SELECT * 
  FROM Product
  INNER JOIN Sku
  ON Product.product_id = Sku.product_id
  WHERE Product.product_id IN (${idString.slice(0, idString.length - 1)})`;

  query(queryString)
    .then(rows => {
      let total = 0;
      for (let i = 0; i < rows.length; i++) {
        rows[i].quantity = req.session.basket[i].quantity;
        rows[i].total = rows[i].price * rows[i].quantity;
        total += rows[i].total;
      }

      res.render('basket', { products: rows, total: total });
    })
    .catch(err => {
      console.log(err);
    });
});

module.exports = router;
