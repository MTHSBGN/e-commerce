const express = require('express');
const database = require('../database');

const router = express.Router();

router.get('/', function(req, res) {
  database.connection.query(
    'SELECT * FROM Product INNER JOIN Sku ON Product.product_id=Sku.product_id INNER JOIN Variant ON Sku.sku_id=Variant.sku_id WHERE Variant.attribute = "images" GROUP BY Product.product_id',
    (err, rows) => {
      if (err) throw err;
      for (product of rows) {
        // console.log(JSON.parse(product.value));
        product.image = JSON.parse(product.value).images[0];
      }
      console.log(rows[0]);
      res.render('home', {
        products: rows
      });
    }
  );
});

module.exports = router;
