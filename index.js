require('bootstrap/dist/css/bootstrap.min.css');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('gijgo/css/gijgo.css');
require('./assets/css/style.css');
require('./assets/css/print.css');
import * as XLSX from 'xlsx'; 


const $ = require('jquery');
window.$ = window.jQuery = $;
require('bootstrap');
const ToWords = require('to-words').ToWords;
window.ToWords = ToWords;
window.XLSX = XLSX;
const moment = require('moment');
window.moment = moment;
require('gijgo/js/gijgo');