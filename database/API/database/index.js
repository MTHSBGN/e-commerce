const sequelize = require('./connection');

const Customer = require('./tables/customer');
const Product = require('./tables/product');
const Sku = require('./tables/sku');
const Image = require('./tables/image');

sequelize
  .sync()
  .then(() => console.log('Tables created'))
  .catch(err => {
    console.log(err);
  });

module.exports = {
  Customer: Customer,
  Product: Product,
  Sku: Sku,
  Image: Image
};
