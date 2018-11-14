const sequelize = require('./connection');

const Customer = require('./tables/customer');
const Product = require('./tables/product');
const Sku = require('./tables/sku');
const Image = require('./tables/image');
const CustomerOrder = require('./tables/customerOrder');
const OrderDetails = require('./tables/orderDetails');

sequelize.sync().catch(err => {
  console.log(err);
});

module.exports = {
  Customer: Customer,
  Product: Product,
  Sku: Sku,
  Image: Image,
  CustomerOrder: CustomerOrder,
  OrderDetails: OrderDetails
};
