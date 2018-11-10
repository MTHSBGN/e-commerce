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

router.post('/add/:id', (req, res) => {
  if (req.session.basket) {
    req.session.basket.push(req.params.id);
  } else {
    req.session.basket = [req.params.id];
  }

  res.sendStatus(200);
});

module.exports = router;
