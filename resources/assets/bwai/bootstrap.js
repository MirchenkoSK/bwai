window._ = require('lodash');
window.moment = require('moment');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Проверяем есть ли в локальном хранилище настройки темы
// и если их нет ставим светлую тему по умолчанию
if (!('theme' in localStorage)) {
    localStorage.theme = 'light'
}
// Добавляем или удаляем класс "dark" к элементу html
if (localStorage.theme === 'dark') {
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}