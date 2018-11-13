const Sequelize = require('sequelize');

const sequelize = new Sequelize('group15-tmp', 'root', '', {
  host: 'localhost',
  dialect: 'mysql'
});

module.exports = sequelize;
