<template>
    <div id="home">
        <header-comp :fr="fr" :en="en" :ar="ar" />
        <post-comp :fr="fr" :en="en" :ar="ar" :title="title" />
        <footer-comp :fr="fr" :en="en" :ar="ar" />
    </div>
</template>

<script>
import headerComp from '../components/headerComp'
import postComp from '../components/postComp'
import footerComp from '../components/footerComp'
export default {
    props : ['title'],
    components : {
        headerComp,
        postComp,
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
        document.title = this.title
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