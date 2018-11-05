const express = require('express');
const connection = require('../database');

const router = express.Router();

// Returns all the products of the database
router.get('/', (req, res) => {
  connection.query('SELECT * FROM Product', function(err, rows) {
    if (err) throw err;

    res.send(rows);
  });
});

// Returns specific product
router.get('/:productID', (req, res) => {
  connection.query(
    `SELECT * FROM Product WHERE product_id = ${req.params.productID}`,
    function(err, rows) {
      if (err) throw err;

      res.send(rows);
    }
  );
});

module.exports = router;
