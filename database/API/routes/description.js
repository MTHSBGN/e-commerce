const express = require('express');
const database = require('../database');

const router = express.Router();

// Returns all the products of the database
router.get('/', (req, res) => {
  database.queryAll('Description', (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

// Returns the specific product matching productID
router.get('/:descriptionID', (req, res) => {
  database.queryID('Description', req.params.descriptionID, (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
