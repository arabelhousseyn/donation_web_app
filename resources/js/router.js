import vue from 'vue'
import router from 'vue-router'

vue.use(router)


const routes = [
    
]

export default new router({
    mode : "history",
    base: process.env.BASE_URL,
    routes,
});
