<template>
    <div>
        <recover-comp :fr="fr" :en="en" :ar="ar" :code="code"  />    
        <footer-comp :fr="fr" :en="en" :ar="ar" />
    </div>
</template>

<script>
import recoverComp from '../components/recoverComp.vue'
import footerComp from '../components/footerComp.vue'
export default {
    props : ['code'],
    components : {
        recoverComp,
        footerComp
    },
    data()
    {
      return{
          ar : false,
          en : false,
          fr : false,
      }
    },

    async created()
    {
        const res = await this.callApi('GET','../language')
        if(res.status == 200)
        {
             if(res.data == 'fr')
             {
                 this.fr = true
                 this.ar =false
                 this.en = false
             }else if(res.data == 'ar')
             {
               this.ar = true
               this.fr = false
               this.en = false
             }else if(res.data == 'en')
             {
                 this.en = true
                 this.fr = false
                 this.ar = false
             }
        }
    }

}
</script>