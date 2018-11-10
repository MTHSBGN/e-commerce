const crypto = require('crypto');
crypto.DEFAULT_ENCODING = 'hex';

function hash(password) {
  let salt = crypto.randomBytes(16).toString('base64');
  let iteration = 10000;
  let hash = crypto
    .pbkdf2Sync(password, salt, iteration, 64, 'sha512')
    .slice(0, 64);

  return `${iteration}$${salt}$${hash}`;
}

function compare(attempt, password) {
  password = password.split('$');

  let iteration = parseInt(password[0]);
  let salt = password[1];
  let hash = password[2];

  return (
    hash ===
    crypto.pbkdf2Sync(attempt, salt, iteration, 64, 'sha512').slice(0, 64)
  );
}

module.exports = {
  hash: hash,
  compare: compare
};
