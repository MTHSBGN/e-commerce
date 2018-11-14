const Sequelize = require('sequelize');
const database = require('../connection');
const Customer = require('./customer');

const CustomerOrder = database.define(
  'CustomerOrder',
  {
    id: { type: Sequelize.INTEGER, primaryKey: true, allowNull: false, autoIncrement: true },
    shipping_address: { type: Sequelize.STRING, allowNull: false },
    total_price: { type: Sequelize.INTEGER, allowNull: false }
  },
  { freezeTableName: true, underscored: true }
);

CustomerOrder.belongsTo(Customer);
Customer.hasMany(CustomerOrder);

module.exports = CustomerOrder;
