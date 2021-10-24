import {createApp} from 'vue'
import App from './App.vue'
import router from './router'

// import 'lib-flexible/flexible.js'
import '@/assets/css/app.less'
// import "jquery";
// import "bootstrap";
// import "bootstrap/dist/css/bootstrap.min.css";

import Vant from 'vant';
import 'vant/lib/index.css';

createApp(App).use(router).use(Vant).mount('#app')
