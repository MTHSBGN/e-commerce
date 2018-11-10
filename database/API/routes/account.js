const express = require('express');
const connection = require('../database');
const credentials = require('../lib/credentials');

const router = express.Router();

router.get('/login', (req, res) => {
  res.render('login', { error: false });
});

router.post('/login', (req, res) => {
  email = req.body.email;

  connection.query(
    `SELECT * FROM Customer WHERE Customer.email = "${email}"`,
    (err, rows) => {
      if (err) throw err;

      if (rows.length == 0) {
        res.render('login', {
          error: true,
          errorMessage: 'This email does not exist'
        });
      } else if (credentials.compare(req.body.password, rows[0].password)) {
        res.redirect('/');
      } else {
        res.render('login', {
          error: true,
          errorMessage: 'Invalid password'
        });
      }
    }
  );
});

router.get('/signup', (req, res) => {
  res.render('signup');
});

router.post('/signup', (req, res) => {
  connection.query('SELECT Customer.client_id FROM Customer', (err, rows) => {
    if (err) throw err;

    let client_id = 0;
    let last = 0;

    for (row of rows) {
      console.log(row);
      if (last + 1 != row.client_id) {
        client_id = last + 1;
      }

      last = row.client_id;
    }

    email = req.body.email;
    username = req.body.username;

    // Hash password
    password = credentials.hash(req.body.password);

    firstname = req.body.firstname;
    lastname = req.body.lastname;
    delivery_address = req.body.delivery_address;
    type = req.body.type;

    // TODO Cookie ID

    values = `(${client_id}, "${email}", "${username}", "${password}", "${firstname}", "${lastname}", "${delivery_address}", "${type}")`;

    connection.query(`INSERT INTO Customer VALUES ${values}`, (err, rows) => {
      if (err) throw err;

      res.redirect('/');
    });
  });
});

module.exports = router;

// TODO Check multiple emails / USERNAME
