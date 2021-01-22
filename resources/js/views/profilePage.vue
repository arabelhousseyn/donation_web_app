<template>
    <div>
        <profile-comp :ar="ar" :fr="fr" :en="en" :info="info" :donations="donations" :favorits="favorits" :editable="editable" />
     <footer-comp :ar="ar" :fr="fr" :en="en" />
    </div>
</template>

<script>
import profileComp from '../components/profileComp.vue'
import footerComp from '../components/footerComp.vue'
export default {
    props : ['username'],
    components : {
        profileComp,
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
            donations : [],
            favorits : [],
            editable : false,
        }
    },
    async created()
    {
        document.title = this.username
        const res = await this.callApi('POST','profile/userinfomarion',this.data)
        if(res.status === 200)
        {
            if(res.data == "no")
            {
                 location.href = '../index'
            }else{
               this.info = res.data
            }
        }

        const res2 = await this.callApi('GET','profile/language')
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
        }
        const res3 = await this.callApi('POST','profile/getPosts',this.data)
        if(res3.status === 200)
        {
            this.donations = res3.data
            for (const donation of this.donations) {
                if(donation.images !== "")
                {
                    const str = donation.images.split(';')
                    donation.images = str[0]
                }
            }
        }
        const res4 = await this.callApi('POST','profile/getFavorits',this.data)
        if(res4.status === 200)
        {
          this.favorits = res4.data
          for (const fav of this.favorits) {
              if(fav.images !== "")
              {
                 const tr = fav.images.split(';')
                 fav.images = tr[0]
              }
          }
        }

        const res5 = await this.callApi('POST',"profile/checkUsername",this.data)
        if(res5.status === 200)
        {
            if(res5.data === "yes")
            {
                this.editable = true
            }else{
                this.editable = false
            } 
        }
    }
}
</script>