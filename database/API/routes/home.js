const express = require('express');
const database = require('../database');

const router = express.Router();

router.get('/', function(req, res) {
  database.connection.query(
    'SELECT Product.name, Product.main_image, Sku.price FROM Product INNER JOIN Sku ON Product.product_id = Sku.product_id',
    (err, rows) => {
      if (err) throw err;
      res.render('home', {
        products: rows
      });
    }
  );
});

module.exports = router;
