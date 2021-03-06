const express = require('express');

const models = require('../database/index');
const sequelize = require('../database/connection');
const json2csv = require('json2csv').parse;

const router = express.Router();

router.get('/', (req, res) => {
  models.Customer.findByPk(req.session.user.id).then(customer => {
    if (!customer || customer.dataValues.type != 0) {
      res.redirect('/');
    } else {
      return models.Sku.findAll({
        include: [{ model: models.Product }, { model: models.Image }]
      }).then(skus => {
        let products = [];
        for (sku of skus) {
          let product = sku.dataValues.Product.dataValues;
          let images = sku.dataValues.Images;
          products.push({
            name: product.name,
            price: sku.dataValues.price,
            quantity: sku.dataValues.stock,
            filename: images[0].dataValues.filename
          });
        }
        res.render('admin', {
          name: req.session.user.name,
          products: products
        });
      });
    }
  });
});

router.get('/product', (req, res) => {
  models.Customer.findByPk(req.session.user.id).then(customer => {
    if (!customer || customer.dataValues.type != 0) {
      res.redirect('/');
    } else {
      res.render('adminProduct', {
        name: req.session.user.name
      });
    }
  });
});

router.get('/export', (req, res) => {
  models.Customer.findByPk(req.session.user.id).then(customer => {
    if (!customer || customer.dataValues.type != 0) {
      res.redirect('/');
    } else {
      return models.Sku.findAll({
        include: [{ model: models.Product }, { model: models.Image }]
      }).then(skus => {
        let products = [];
        for (sku of skus) {
          let product = sku.dataValues.Product.dataValues;
          let images = sku.dataValues.Images;
          products.push({
            name: product.name,
            price: sku.dataValues.price,
            quantity: sku.dataValues.stock
          });
        }
        res.set('Cache-Control', 'max-age=0, no-cache, must-revalidate, proxy-revalidate');
        res.set('Content-Type', 'application/force-download');
        res.set('Content-Type', 'application/octet-stream');
        res.set('Content-Type', 'application/download');
        res.set('Content-Disposition', 'attachment;filename=userList.csv');
        res.set('Content-Transfer-Encoding', 'binary');
        res.send(json2csv(products, ['name', 'price', 'quantity']));
      });
    }
  });
});

router.post('/add/product/', (req, res) => {
  let sku_ids = JSON.parse(req.body.sku_ids);
  sequelize
    .transaction(t => {
      return models.Product.create({ name: req.body.name }, { transaction: t })
        .then(product => {
          let promises = [];
          for (sku of sku_ids) {
            promises.push(
              models.Sku.create(
                {
                  id: sku.sku_id,
                  product_id: product.dataValues.id,
                  description: sku.description,
                  price: sku.price,
                  stock: sku.stock,
                  sold: 0
                },
                { transaction: t }
              )
            );
          }

          return Promise.all(promises);
        })
        .then(() => {
          let promises = [];
          for (sku of sku_ids) {
            for (image of sku.images) {
              promises.push(
                models.Image.create(
                  {
                    sku_id: sku.sku_id,
                    filename: image
                  },
                  { transaction: t }
                )
              );
            }
          }

          return Promise.all(promises);
        });
    })
    .then(() => {
      res.send('done');
    })
    .catch(err => {
      console.log(err);
    });
});

module.exports = router;
