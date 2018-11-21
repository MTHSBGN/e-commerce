const express = require('express');
const models = require('../database/index');
const router = express.Router();

router.get('/:id', (req, res) => {
  models.Sku.findOne({
    include: [{ model: models.Product, where: { id: req.params.id } }, { model: models.Image }]
  }).then(sku => {
    console.log(sku);
    let p = sku.dataValues.Product;
    let images = sku.dataValues.Images;
    let product = {
      sku_id: sku.dataValues.id,
      name: p.dataValues.name,
      description: sku.dataValues.description,
      price: sku.dataValues.price,
      filename: images[0].dataValues.filename,
      stock: sku.dataValues.stock
    };

    if (product.stock == 0) {
      product.empty = true;
    }

    res.render('product', { user: req.session.user, product: product });
  });
});

router.post('/add/:id', (req, res) => {
  if (!req.session.basket) {
    req.session.basket = [];
  }

  let found = false;
  for (product of req.session.basket) {
    if (product.id == req.params.id) {
      product.quantity += req.body.quantity;
      found = true;
      break;
    }
  }

  if (!found) {
    req.session.basket.push({
      id: req.params.id,
      quantity: req.body.quantity
    });
  }

  res.sendStatus(200);
});

module.exports = router;
