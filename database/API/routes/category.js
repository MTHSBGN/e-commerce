const express = require('express');
const database = require('../database');

const router = express.Router();

// Returns all the categories of the database
router.get('/', (req, res) => {
  database.queryAll('Category', (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

// Returns the specific category matching productID
router.get('/:categoryID', (req, res) => {
  database.queryID('Category', req.params.categoryID, (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
