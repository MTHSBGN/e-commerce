const express = require('express');
const database = require('../database');

const router = express.Router();

router.get('/', (req, res) => {
  database.queryAll('Sku', (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

router.get('/:skuID', (req, res) => {
  database.queryID('Sku', req.params.skuID, (err, rows) => {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
