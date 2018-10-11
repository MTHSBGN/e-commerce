const express = require('express');
const router = express.Router();

router.get('/:userId', (req, res) => {
  const user = {
    userId: req.params['userId'],
    username: 'JD',
    firstName: 'John',
    lastName: 'Doe'
  };

  res.json(user);
});

module.exports = router
