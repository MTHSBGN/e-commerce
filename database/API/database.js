const mysql = require('mysql');

connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'group15'
});

module.exports = connection;
