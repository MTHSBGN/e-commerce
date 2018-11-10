const express = require('express');
const query = require('../lib/database');
const credentials = require('../lib/credentials');

const router = express.Router();

router.get('/login', (req, res) => {
  res.render('login', { error: false });
});

router.post('/login', (req, res) => {
  let email = req.body.email;

  query(`SELECT * FROM Customer WHERE Customer.email = "${email}"`)
    .then(rows => {
      out = {
        error: true,
        errorMessage: ''
      };

      if (rows.length == 0) {
        out.errorMessage = 'This email does not exist';
        res.render('login', out);
      } else if (credentials.compare(req.body.password, rows[0].password)) {
        req.session.login = true;
        res.redirect('/');
      } else {
        out.errorMessage = 'Invalid password';
        res.render('login', out);
      }
    })
    .catch(err => {
      console.log(err);
    });
});

router.get('/signup', (req, res) => {
  res.render('signup');
});

router.post('/signup', (req, res) => {
  query('SELECT Customer.client_id FROM Customer')
    .then(rows => {
      let client_id = firstFreeId(rows);
      let email = req.body.email;
      let username = req.body.username;
      let password = credentials.hash(req.body.password);
      let firstname = req.body.firstname;
      let lastname = req.body.lastname;
      let delivery_address = req.body.delivery_address;
      let type = req.body.type;
      let cookie_id = req.sessionID;

      values = `(${client_id}, "${email}", "${username}", "${password}", "${firstname}", "${lastname}", "${delivery_address}", "${type}", "${cookie_id}")`;

      return query(`INSERT INTO Customer VALUES ${values}`);
    })
    .then(() => {
      res.redirect('/');
    })
    .catch(err => {
      console.log(err);
    });
});

module.exports = router;

// TODO Check multiple emails / USERNAME

function firstFreeId(rows) {
  let last = 0;

  for (row of rows) {
    if (last + 1 != row.client_id) {
      break;
    }

    last = row.client_id;
  }

  return last + 1;
}
