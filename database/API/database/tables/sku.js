const Sequelize = require('sequelize');
const database = require('../connection');
const Product = require('./product');

const Sku = database.define(
  'Sku',
  {
    id: { type: Sequelize.STRING, primaryKey: true, allowNull: false },
    description: { type: Sequelize.TEXT, allowNull: false },
    price: { type: Sequelize.FLOAT, allowNull: false },
    stock: { type: Sequelize.INTEGER, allowNull: false, validate: { min: 0 } },
    sold: { type: Sequelize.INTEGER, allowNull: false, validate: { min: 0 } }
  },
  { freezeTableName: true, underscored: true }
);

Sku.belongsTo(Product);
Product.hasMany(Sku);

module.exports = Sku;
