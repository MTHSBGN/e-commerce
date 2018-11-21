const express = require('express');
const sequelize = require('../database/connection');
const models = require('../database/index');

const router = express.Router();

router.get('/', (req, res) => {
  let ids = [];
  for (item of req.session.basket) {
    ids.push(item.id);
  }

  models.Sku.findAll({
    include: [{ model: models.Product }],
    where: {
      id: ids
    }
  }).then(skus => {
    let total = 0;
    for (let i = 0; i < skus.length; i++) {
      let sku = skus[i];
      let total_price = sku.dataValues.price * req.session.basket[i].quantity;
      total += total_price;
    }

    sequelize
      .transaction(t => {
        return models.CustomerOrder.create(
          {
            shipping_address: req.session.user.delivery_address,
            total_price: total.toFixed(2),
            customer_id: req.session.user.id
          },
          { transaction: t }
        )
          .then(order => {
            let promises = [];
            for (let i = 0; i < skus.length; i++) {
              let sku = skus[i];
              promises.push(
                models.OrderDetails.create(
                  {
                    sku_id: sku.dataValues.id,
                    quantity: req.session.basket[i].quantity,
                    price: sku.dataValues.price.toFixed(2),
                    customer_order_id: order.dataValues.id
                  },
                  { transaction: t }
                )
              );
            }
            return Promise.all(promises);
          })
          .then(orders => {
            let promises = [];
            for (let i = 0; i < orders.length; i++) {
              promises.push(
                models.Sku.findByPk(orders[i].dataValues.sku_id, { transaction: t }).then(sku => {
                  sku.update(
                    { stock: sku.dataValues.stock - orders[i].dataValues.quantity },
                    { transaction: t }
                  );
                })
              );
            }

            return Promise.all(promises);
          });
      })
      .then(() => {
        req.session.basket = []
        res.send('');
      })
      .catch(err => {
        console.log(err);
      });
  });
});

module.exports = router;
