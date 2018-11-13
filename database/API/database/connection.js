const Sequelize = require('sequelize');

const sequelize = new Sequelize('group15-tmp', 'root', null, {
  host: 'localhost',
  dialect: 'mysql'
});

module.exports = sequelize;
