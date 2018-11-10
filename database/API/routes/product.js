const express = require('express');
const query = require('../lib/database');

const router = express.Router();

router.get('/:id', (req, res) => {
  query('', 'sql/product.sql').then(rows => {
    context = rows[0];
    context.login = req.session.login;
    res.render('product', context);
  });
});

module.exports = router;
