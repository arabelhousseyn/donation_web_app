<template>
    <div>
      <settings-comp :editable="editable" :info="info" :ar="ar" :fr="fr" :en="en" />
     <footer-comp :ar="ar" :fr="fr" :en="en" />
    </div>
</template>

<script>
import settingsComp from '../components/settingsComp.vue'
import footerComp from '../components/footerComp.vue'
export default {
    props : ['username'],
    components : {
        settingsComp,
        footerComp
    },
    data(){
        return{
            data : {
                username : this.username
            },
            fr : false,
            en : false,
            ar : false,
            info : [],
            editable : false,
        }
    },
    async created()
    {
        const res = await this.callApi('POST','../profile/userinfomarion',this.data)
        if(res.status === 200)
        {
            if(res.data == "no")
            {
               location.href = '../index'  
            }else{
               this.info = res.data
            }
        }

        const res2 = await this.callApi('GET','../profile/language')
        if(res2.status == 200)
        {

             if(res2.data == 'fr')
             {
                 this.fr = true
                 this.ar =false
                 this.en = false
             }else if(res2.data == 'ar')
             {
               this.ar = true
               this.fr = false
               this.en = false
             }else if(res2.data == 'en')
             {
                 this.en = true
                 this.fr = false
                 this.ar = false
             }
              if(this.fr)
              {
                  document.title = 'paramètres-' + this.username
              }else if(this.en)
              {
                  document.title = "settings-" + this.username
              }else{
                  document.title = this.username + "-إعدادات"
              }
        }

        const res5 = await this.callApi('POST',"../profile/checkUsername",this.data)
        if(res5.status === 200)
        {
            if(res5.data === "yes")
            {
                this.editable = true
            }else{
                location.href = '../index'
            }
        }
    }
    
}
</script>