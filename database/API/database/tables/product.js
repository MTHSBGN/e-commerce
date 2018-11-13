const Sequelize = require('sequelize');
const database = require('../connection');

const Product = database.define(
  'Product',
  {
    id: {
      type: Sequelize.INTEGER,
      primaryKey: true,
      allowNull: false,
      autoIncrement: true
    },
    name: { type: Sequelize.STRING, allowNull: false }
  },
  { freezeTableName: true, underscored: true }
);

module.exports = Product;
