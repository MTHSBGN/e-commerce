const mysql = require('mysql');
const fs = require('fs');

connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'group15'
});

function query(query) {
  return new Promise((resolve, reject) => {
    connection.query(query, (err, rows) => {
      if (err) {
        reject(err);
      } else {
        resolve(rows);
      }
    });
  });
}

module.exports = query;
