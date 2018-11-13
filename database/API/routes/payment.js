const express = require('express');

const router = express.Router();

router.get('/', (req, res) => {
  let basket = req.session.basket;
  let client_id = 2;

  let sku_idStr = '';
  for (product of basket) {
    sku_idStr += `"${product.id}",`;
  }

  let queryString = `SELECT * FROM Sku
  WHERE Sku.sku_id 
  IN (${sku_idStr.slice(0, sku_idStr.length - 1)})`;

  database.query(queryString).then(sku_rows => {
    for (let i = 0; i < sku_rows.length; i++) {
      sku_rows[i].quantity = basket[i].quantity;
    }

    database
      .beginTransaction()
      .then(() => {
        queryString = `SELECT @orderID := COALESCE(MAX(Client_order.order_id) + 1, 1) FROM Client_order;`;
        return database.query(queryString);
      })
      .then(() => {
        return database.insert(
          'Client_order',
          '(@orderID, ${client_id}, "2015-12-20 10:01:00", 10, "")'
        );
      })
      .then(() => {
        queryString = `INSERT INTO Order_details VALUES `;
        for (product of sku_rows) {
          queryString += `(@orderID,`;
          queryString += `"${product.sku_id}",`;
          queryString += `${product.quantity},`;
          queryString += `${product.price}),`;
        }

        return database.query(queryString.replace(/.$/, ';'));
      })
      .then(() => {
        database.commit();
      })
      .then(() => {
        res.send();
      })
      .catch(err => {
        console.log(err);
      });
  });
});

module.exports = router;
