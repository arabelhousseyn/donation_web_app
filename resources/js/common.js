import { Callbacks } from "jquery";

import Vue from "vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
Vue.use(VueToast);
export default {
    data() {
        return {
            uri: ""
        };
    },
    methods: {
        async callApi(mth, url, data) {
            return await axios({
                method: mth,
                url: url,
                data: data
            });
        },
        async statu(message, type) {
            return await Vue.$toast.open({
                message: message,
                type: type
            });
        },
        getUrl()
        {
            return this.uri
        }
    },
    created() {
       /* let url = window.location;
         
        this.uri = f;*/
        
    },
};
