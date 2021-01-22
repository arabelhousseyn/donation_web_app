<template>
    <div id="home">
        <header-comp :ar="ar" :fr="fr" :en="en"  />
        <main-comp :ar="ar" :fr="fr" :en="en" />
        <footer-comp :ar="ar" :fr="fr" :en="en" />
        
    </div>
</template>

<script>
import headerComp from '../components/headerComp'
import mainComp from '../components/mainComp'
import footerComp from '../components/footerComp'
export default {
    components : {
        headerComp,
        mainComp,
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
        const res = await this.callApi('GET','language')
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