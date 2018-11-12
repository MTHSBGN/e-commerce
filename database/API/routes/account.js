const express = require('express');
const database = require('../lib/database');
const credentials = require('../lib/credentials');

const router = express.Router();

router.get('/login', (req, res) => {
  res.render('login', { error: false });
});

router.post('/login', (req, res) => {
  let login = req.body.login;
  let queryString = 'SELECT * FROM Customer WHERE ';
  let email = true;
  if (login.includes('@')) {
    queryString += `Customer.email = "${login}"`;
  } else {
    email = false;
    queryString += `Customer.username = "${login}"`;
  }

  database
    .query(queryString)
    .then(rows => {
      out = {
        error: true,
        errorMessage: ''
      };

      if (rows.length == 0) {
        let message = email ? 'Cette adresse email' : "Ce nom d'utilisateur";
        out.errorMessage = message + " n'existe pas";
        res.render('login', out);
      } else if (credentials.compare(req.body.password, rows[0].password)) {
        req.session.login = true;
        res.redirect('/');
      } else {
        out.errorMessage = "Le mot de passe n'est pas valide";
        res.render('login', out);
      }
    })
    .catch(err => {
      console.log(err);
    });
});

router.get('/logout', (req, res) => {
  req.session.login = false;
  res.redirect('/');
});

router.get('/signup', (req, res) => {
  res.render('signup');
});

router.post('/signup', (req, res) => {
  let client_id = 0;
  let email = req.body.email;
  let username = req.body.username;
  let password = credentials.hash(req.body.password);
  let firstname = req.body.firstname;
  let lastname = req.body.lastname;
  let delivery_address = req.body.delivery_address;
  let type = req.body.type;
  let cookie_id = req.sessionID;

  database
    .query('SELECT Customer.client_id FROM Customer')
    .then(rows => {
      client_id = firstFreeId(rows);

      return database.query(
        `SELECT * FROM Customer WHERE Customer.username = "${username}"`
      );
    })
    .then(rows => {
      if (rows.length != 0) {
        res.render('signup', {
          error: true,
          errorMessage: "Ce nom d'utilisateur est déjà pris"
        });

        return Promise.reject();
      }

      return database.query(
        `SELECT * FROM Customer WHERE Customer.email = "${email}"`
      );
    })
    .then(rows => {
      if (rows.length != 0) {
        res.render('signup', {
          error: true,
          errorMessage: 'Cette adresse email est déjà prise'
        });

        return Promise.reject();
      }

      values = `(${client_id}, "${email}", "${username}", "${password}", "${firstname}", "${lastname}", "${delivery_address}", "${type}", "${cookie_id}")`;

      return database.query(`INSERT INTO Customer VALUES ${values}`);
    })
    .then(() => {
      res.redirect('/');
    })
    .catch(err => {
      if (err) {
        console.log(err);
      }
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
