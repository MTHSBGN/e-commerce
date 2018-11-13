const Sequelize = require('sequelize');
const database = require('../connection');

const Product = database.define(
  'Product',
  {
    product_id: { type: Sequelize.INTEGER, primaryKey: true, allowNull: false },
    name: { type: Sequelize.STRING, allowNull: false }
  },
  { freezeTableName: true }
);

module.exports = Product;
