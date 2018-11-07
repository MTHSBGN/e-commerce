const express = require('express');
const database = require('../database');

const router = express.Router();

// Returns all the products of the database
router.get('/', (req, res) => {
  connection.query(
    'SELECT * FROM Product INNER JOIN Sku ON Product.product_id=Sku.product_id INNER JOIN Variant ON Sku.sku_id=Variant.sku_id WHERE Variant.attribute = "images" GROUP BY Product.product_id',
    (err, rows) => {
      if (err) throw err;

      res.send(rows);
    }
  );
});

// Returns the specific product matching productID
router.get('/:productID', (req, res) => {
  database.queryID('Product', req.params.productID, (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
