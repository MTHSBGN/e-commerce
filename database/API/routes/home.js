const express = require('express');
const Sequelize = require('sequelize');
const models = require('../database/index');

const router = express.Router();

router.get('/', function(req, res) {
  models.Sku.findAll({
    include: [{ model: models.Product }, { model: models.Image }]
  }).then(skus => {
    let displayProduct = [];
    for (sku of skus) {
      let product = sku.dataValues.Product.dataValues;
      let images = sku.dataValues.Images;
      displayProduct.push({
        id: product.id,
        name: product.name,
        price: sku.dataValues.price,
        filename: images[0].dataValues.filename
      });
    }

    res.render('home', {
      user: req.session.user,
      products: displayProduct
    });
  });
});

module.exports = router;
