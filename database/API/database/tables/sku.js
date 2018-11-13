const Sequelize = require('sequelize');
const database = require('../connection');
const Product = require('./product');

const Sku = database.define(
  'Sku',
  {
    sku_id: { type: Sequelize.STRING, primaryKey: true, allowNull: false },
    product_id: {
      type: Sequelize.INTEGER,
      allowNull: false,
      references: { model: Product, key: 'product_id' }
    },
    price: { type: Sequelize.FLOAT, allowNull: false },
    stock: { type: Sequelize.INTEGER, allowNull: false, validate: { min: 0 } }
  },
  { freezeTableName: true }
);

module.exports = Sku;
