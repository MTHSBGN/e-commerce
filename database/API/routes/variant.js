const express = require('express');
const database = require('../database');

const router = express.Router();


router.get('/', (req, res) => {
  database.queryAll('Variant', (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});


router.get('/:variantID', (req, res) => {
  database.queryID('Variant', req.params.variantID, (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
