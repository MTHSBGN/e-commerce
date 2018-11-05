const express = require('express');
const database = require('../database');

const router = express.Router();

// Returns all the products of the database
router.get('/', (req, res) => {
  database.queryAll('Product', (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

// Returns the specific product matching productID
router.get('/:productID', (req, res) => {
  database.queryID('Product', req.params.productID, (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
