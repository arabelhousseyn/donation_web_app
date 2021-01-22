<template>
    <div>
        <checkpoint-comp :fr="fr" :en="en" :ar="ar" />
        <footer-comp :fr="fr" :en="en" :ar="ar" />
    </div>
</template>

<script>
import checkpointComp from '../components/checkpointComp.vue'
import footerComp from '../components/footerComp.vue'
export default {
    components : {
        checkpointComp,
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