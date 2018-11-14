const Sequelize = require('sequelize');
const database = require('../connection');
const Sku = require('./sku');
const CustomerOrder = require('./customerOrder');

const OrderDetails = database.define(
  'OrderDetails',
  {
    id: { type: Sequelize.INTEGER, primaryKey: true, allowNull: false, autoIncrement: true },
    quantity: { type: Sequelize.INTEGER, allowNull: false, validate: { min: 0 } },
    price: { type: Sequelize.FLOAT, allowNull: false, validate: { min: 0 } }
  },
  { freezeTableName: true, underscored: true }
);

CustomerOrder.hasMany(OrderDetails);
OrderDetails.belongsTo(Sku);

module.exports = OrderDetails;
