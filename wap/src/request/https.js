import axios from 'axios'
import Qs from 'qs'
import { message} from 'ant-design-vue'

// import storage from '../storage/index'
/**
 * axios 封装统一用post 
 */
// 请求超时时间
axios.defaults.timeout = 10000;

var instance = axios.create({
    baseURL: process.env.VUE_APP_API_URL,
    transformResponse: [function (data) {
        try {
            data = JSON.parse(data)
        } catch (e) {
            console.error('请求到的数据不是json格式', data)
        }
        return data
    }],
    transformRequest: [function (data) {
        data = Qs.stringify(data);
        return data
    }]

});
//http request 拦截器
instance.interceptors.request.use((config) => {
    config.headers = {
        'content-type': "application/x-www-form-urlencoded;charset=UTF-8"
    };
    // 下面会说在什么时候存储 token
    // config.headers.token = storage.get('token');
    return config;
},(error)   => {
    return Promise.reject(error);
});
//http response 拦截器
instance.interceptors.response.use(res => {
    // 响应失败
    if (res.data.code   == 199) {
        // storage.remove('token');
        // router.push({
        //     name: 'login'
        // }).catch(err => {err});
    }
    return res;
}, (error) => {
    return Promise.reject(error)
});
/**
 * 封装post请求
 * @param url
 * @param data
 * @returns {Promise}
 */

export function post (url,praram = {}) {
    praram = praram || {}
    return new Promise((resolve, reject) => {
            instance.post(url,praram)
                .then(response => {
                    var res = response.data;
                    if (res.code === 0) {
                        resolve(res);
                    } else {
                        message.error({ content: res.msg, duration: 2 })
                        reject({code: res.code, msg: res.msg})
                    }
                },err => {
                    reject(err)
                })
    })
}

export function get (url, praram = {}) {
    return new Promise((resolve, reject) => {
        instance.get(url, praram).then(
        response => {
          resolve(response.data)
        },
        err => {
          reject(err)
        }
      )
        .catch(error => {
          reject(error)
        })
    })
  }

