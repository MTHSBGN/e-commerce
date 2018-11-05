const mysql = require('mysql');

connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'group15'
});

function queryAll(table, callback) {
  connection.query(`SELECT * FROM ${table}`, callback);
}

function queryID(table, ID, callback) {
  if (typeof ID === 'string') {
    ID = `"${ID}"`;
  }

  table_id = table.toLowerCase() + '_id';
  connection.query(
    `SELECT * FROM ${table} WHERE ${table_id} = ${ID}`,
    callback
  );
}

module.exports = { queryAll: queryAll, queryID: queryID };
