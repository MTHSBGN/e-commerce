const express = require('express');
const connection = require('../database');

const router = express.Router();

router.get('/', (req, res) => {
  connection.query('SELECT * FROM Customer', function(err, rows) {
    if (err) throw err;

    res.send(rows);
  });
});

module.exports = router;
