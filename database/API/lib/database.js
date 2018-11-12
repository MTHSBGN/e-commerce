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

function beginTransaction() {
  return new Promise((resolve, reject) => {
    connection.beginTransaction(err => {
      if (err) {
        reject(err);
      } else {
        resolve();
      }
    });
  });
}

function commit() {
  return new Promise((resolve, reject) => {
    connection.commit(err => {
      if (err) {
        reject(err);
      } else {
        resolve();
      }
    });
  });
}

module.exports = {
  query: query,
  beginTransaction: beginTransaction,
  commit: commit
};
