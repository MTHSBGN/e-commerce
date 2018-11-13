const Sequelize = require('sequelize');
const database = require('../connection');

const Customer = database.define(
  'Customer',
  {
    customer_id: {
      type: Sequelize.INTEGER,
      primaryKey: true,
      allowNull: false,
      autoIncrement: true
    },
    email: {
      type: Sequelize.STRING,
      allowNull: false,
      validate: { isEmail: true }
    },
    username: { type: Sequelize.STRING, allowNull: false },
    password: { type: Sequelize.STRING, allowNull: false },
    firstname: { type: Sequelize.STRING, allowNull: false },
    lastname: { type: Sequelize.STRING, allowNull: false },
    delivery_address: { type: Sequelize.STRING, allowNull: false },
    type: {
      type: Sequelize.INTEGER,
      allowNull: false,
      validate: { min: 0, max: 3 }
    },
    session_id: { type: Sequelize.STRING, allowNull: false }
  },
  { freezeTableName: true, underscored: true }
);

module.exports = Customer;
