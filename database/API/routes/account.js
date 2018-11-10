const express = require('express');
const connection = require('../database');

const router = express.Router();

router.post('/signup', (req, res) => {
  // TODO Verification of input
  client_id = 11; // TODO Select first empty ID
  email = req.body.email;
  username = req.body.username;
  password = req.body.password;
  firstname = req.body.firstname;
  lastname = req.body.lastname;
  delivery_address = req.body.delivery_address;
  type = 1;

  // TODO Cookie ID
  values = `(${client_id}, "${email}", "${username}", "${password}", "${firstname}", "${lastname}", "${delivery_address}", "${type}")`;

  console.log(values);
  connection.query(`INSERT INTO Customer VALUES ${values}`, (err, rows) => {
    if (err) throw err;

    res.send('Success');
  });
});

module.exports = router;
