<?php

// HEROKU :

const DB_NAME = 'heroku_7c9d6d65ab65d8b';
const DB_USER = 'b17bb8fb1a6a05';
const DB_PASS = 'd051faf9';
const HOST = 'eu-cdbr-west-03.cleardb.net';
//const DSN = 'mysql://b17bb8fb1a6a05:d051faf9@eu-cdbr-west-03.cleardb.net/heroku_7c9d6d65ab65d8b?reconnect=true';
const DSN = 'mysql://' . DB_USER . ':' . DB_PASS . '@' . HOST;

// eu-cdbr-west-03.cleardb.net