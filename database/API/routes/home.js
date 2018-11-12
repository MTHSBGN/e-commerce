const express = require('express');
const query = require('../lib/database');

const router = express.Router();

router.get('/', function(req, res) {
  let queryString = `SELECT * 
  FROM Product
  INNER JOIN Sku
  ON Product.product_id = Sku.product_id
  INNER JOIN Image
  ON Sku.sku_id = Image.sku_id
  GROUP BY Product.product_id`;

  query(queryString).then(rows => {
    res.render('home', {
      products: rows,
      login: req.session.login
    });
  });
});

module.exports = router;
