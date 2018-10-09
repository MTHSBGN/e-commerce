const express = require('express');
const router = express.Router();

router.get('/:productId', (req, res) => {
  const user = {
    userId: req.params['productId'],
    name: 'T-Shirt',
    price: 100
  };

  res.json(user);
});

module.exports = router;
