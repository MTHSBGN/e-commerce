const Sequelize = require('sequelize');
const database = require('../connection');
const Sku = require('./sku');

const Image = database.define(
  'Image',
  {
    image_id: { type: Sequelize.INTEGER, primaryKey: true, allowNull: false, autoIncrement: true },
    sku_id: {
      type: Sequelize.STRING,
      allowNull: false,
      references: { model: Sku, key: 'sku_id' }
    },
    filename: { type: Sequelize.STRING, allowNull: false }
  },
  { freezeTableName: true }
);

module.exports = Image;
