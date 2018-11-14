const Sequelize = require('sequelize');
const database = require('../connection');
const Sku = require('./sku');

const Image = database.define(
  'Image',
  {
    id: { type: Sequelize.INTEGER, primaryKey: true, allowNull: false, autoIncrement: true },
    filename: { type: Sequelize.STRING, allowNull: false }
  },
  { freezeTableName: true, underscored: true }
);

Image.belongsTo(Sku);
Sku.hasMany(Image);

module.exports = Image;
