const express = require('express');
const query = require('../lib/database');

const router = express.Router();

router.get('/', function(req, res) {
  query(
    'SELECT DISTINCT Product.product_id, Product.name, Product.main_image, Sku.price FROM Product INNER JOIN Sku ON Product.product_id = Sku.product_id'
  ).then(rows => {
    res.render('home', {
      products: rows,
      login: req.session.login
    });
  });
});

module.exports = router;
