const express = require('express');

const models = require('../database/index');
const sequelize = require('../database/connection');

const router = express.Router();

router.get('/', (req, res) => {
  models.Customer.findByPk(req.session.user.id).then(customer => {
    if (!customer || customer.dataValues.type != 0) {
      res.redirect('/');
    } else {
      res.render('admin', {
        name: req.session.user.name
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
