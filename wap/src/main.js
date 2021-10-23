import {createApp} from 'vue'
import App from './App.vue'
import router from './router'

import '@/assets/css/app.less'
import "jquery";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";


createApp(App).use(router).mount('#app')
