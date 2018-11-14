const express = require('express');
const credentials = require('../lib/credentials');
const models = require('../database/index');

const Sequelize = require('sequelize');

const router = express.Router();

router.get('/login', (req, res) => {
  res.render('login', { error: false });
});

router.post('/login', (req, res) => {
  let email = req.body.login.includes('@');
  models.Customer.findOne({
    where: {
      [Sequelize.Op.or]: [{ username: req.body.login }, { email: req.body.login }]
    }
  })
    .then(customer => {
      if (!customer) {
        err = email ? 'Cette adresse email' : "Ce nom d'utilisateur";
        return Promise.reject(err + " n'existe pas");
      }

      if (credentials.compare(req.body.password, customer.dataValues.password)) {
        req.session.user = {
          name: customer.dataValues.firstname,
          delivery_address: customer.dataValues.delivery_address,
          admin: customer.dataValues.type == 0,
          id: customer.dataValues.id
        };
        res.redirect('/');
      } else {
        return Promise.reject("Le mot de passe n'est pas valide");
      }
    })
    .catch(err => {
      res.render('login', {
        error: true,
        errorMessage: err
      });
    });
});

router.get('/logout', (req, res) => {
  req.session.user = null;
  res.redirect('/');
});

router.get('/signup', (req, res) => {
  res.render('signup');
});

router.post('/signup', (req, res) => {
  models.Customer.findOne({ where: { username: req.body.username } })
    .then(customer => {
      if (customer) {
        return Promise.reject("Ce nom d'utilisateur est déjà pris");
      }

      return models.Customer.findOne({ where: { email: req.body.email } });
    })
    .then(customer => {
      if (customer) {
        return Promise.reject('Cette adresse email est déjà prise');
      }

      return models.Customer.create({
        email: req.body.email,
        username: req.body.username,
        password: credentials.hash(req.body.password),
        firstname: req.body.firstname,
        lastname: req.body.lastname,
        delivery_address: req.body.delivery_address,
        type: req.body.type,
        session_id: req.sessionID
      });
    })
    .then(customer => {
      req.session.user = {
        name: customer.dataValues.firstname,
        delivery_address: customer.dataValues.delivery_address,
        admin: customer.dataValues.type == 0,
        id: customer.dataValues.id
      };

      res.redirect('/');
    })
    .catch(err => {
      res.render('signup', {
        error: true,
        errorMessage: err
      });
    });
});

module.exports = router;
