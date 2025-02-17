const express = require('express');
const mysql = require('mysql2');
const app = express();
const port = 3306;

// Настройка подключения к MySQL
const db = mysql.createConnection({
  host: 'Filmora',
  user: 'root', // Замените на ваше имя пользователя MySQL
  password: 'root', // Замените на ваш пароль MySQL
  database: 'kino' // Замените на имя вашей базы данных
});

// Подключение к базе данных
db.connect((err) => {
  if (err) {
    console.error('Ошибка подключения к базе данных:', err);
    return;
  }
  console.log('Подключено к базе данных MySQL');
});

// Маршрут для главной страницы
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

// Маршрут для получения данных из базы данных
app.get('/data', (req, res) => {
  db.query('SELECT * FROM your-table', (err, results) => {
    if (err) {
      console.error('Ошибка выполнения запроса:', err);
      res.status(500).send('Ошибка сервера');
      return;
    }
    res.json(results);
  });
});

// Запуск сервера
app.listen(port, () => {
  console.log(`Сервер запущен на http://filmora:${3306}`);
});
