const express = require('express');
const models = require('../database/index');

const router = express.Router();

router.get('/', (req, res) => {
  if (!req.session.basket || req.session.basket.length == 0) {
    res.render('basket', {
      user: req.session.user,
      empty: true
    });

    return;
  }

  let ids = [];
  for (item of req.session.basket) {
    ids.push(item.id);
  }

  models.Sku.findAll({
    include: [{ model: models.Product }, { model: models.Image }],
    where: {
      id: ids
    }
  }).then(skus => {
    let products = [];
    let total = 0;
    for (let i = 0; i < skus.length; i++) {
      let sku = skus[i];
      let product = sku.dataValues.Product;
      let images = sku.dataValues.Images;

      let total_price = sku.dataValues.price * req.session.basket[i].quantity;
      total += total_price;

      products.push({
        sku_id: sku.dataValues.id,
        name: product.dataValues.name,
        price: sku.dataValues.price,
        filename: images[0].dataValues.filename,
        quantity: req.session.basket[i].quantity,
        total_price: total_price.toFixed(2)
      });
    }

    res.render('basket', {
      user: req.session.user,
      products: products,
      total: total.toFixed(2),
      empty: false
    });
  });
});

router.post('/:id', (req, res) => {
  let basket = req.session.basket;
  let existed = false;

  let size = 0;
  if (basket) {
    size = basket.length;
  }

  // Update the product if it is already in the basket
  for (let i = 0; i < size; i++) {
    if (basket[i].id == req.params.id) {
      basket[i].quantity += req.params.quantity;
      existed = true;
      break;
    }
  }

  // Creates it if it is not in the basket
  if (!existed) {
    let product = {
      id: req.params.id,
      quantity: req.body.quantity
    };

    // In case the basket has not been created yet
    if (size == 0) {
      req.session.basket = [product];
    } else {
      for (let i = 0; i < size; i++) {
        if (req.session.basket[i].id > req.params.id) {
          req.session.basket.splice(i, 0, product);
          break;
        } else if (i == size - 1) {
          req.session.basket.push(product);
        }
      }
    }
  }

  res.sendStatus(200);
});

router.put('/:id', (req, res) => {
  let basket = req.session.basket;
  for (let i = 0; i < basket.length; i++) {
    if (basket[i].id == req.params.id) {
      basket[i].quantity = req.body.quantity;
      break;
    }
  }

  res.sendStatus(200);
});

router.delete('/:id', (req, res) => {
  let basket = req.session.basket;
  for (let i = 0; i < basket.length; i++) {
    if (basket[i].id == req.params.id) {
      basket.splice(i, 1);
      break;
    }
  }

  res.sendStatus(200);
});

module.exports = router;
