<template>
    <div id="checkpoint">
         <div v-if="fr" style="text-align:center;margin-top:32px;" class="wrap">
             <div class="container">
                 <a href="../index"><img :src="logo" alt="logo"></a>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="form-group">
                             <label for="username" style="font-weight:bold;">Nom d'utilisateur</label>
                             <input @keyup="toggle" @keyup.enter="search" type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" id="username" v-model="data.username" required>
                         </div>
                         <button @click="search" :disabled="bool" class='btn btn-primary'>Rechercher</button>
                     </div>
                 </div>
             </div>
         </div>

         <div v-if="en" style="text-align:center;margin-top:32px;" class="wrap">
             <div class="container">
                 <a href="../index"><img :src="logo" alt="logo"></a>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="form-group">
                             <label for="username" style="font-weight:bold;">Username</label>
                             <input @keyup="toggle" @keyup.enter="search" type="text" name="username" class="form-control" placeholder="Username" id="username" v-model="data.username" required>
                         </div>
                         <button @click="search" :disabled="bool" class='btn btn-primary'>Search</button>
                     </div>
                 </div>
             </div>
         </div>

         <div v-if="ar" style="text-align:center;margin-top:32px;" class="wrap">
             <div class="container">
                 <a href="../index"><img :src="logo" alt="logo"></a>
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="form-group">
                             <label for="username" style="font-weight:bold;">إسم المستخدم</label>
                             <input @keyup="toggle" @keyup.enter="search" type="text" name="username" class="form-control" placeholder="إسم المستخدم" id="username" v-model="data.username" required>
                         </div>
                         <button @click="search" :disabled="bool" class='btn btn-primary'>البحث</button>
                     </div>
                 </div>
             </div>
         </div>
    </div>
</template>

<script>
export default {
    props : ['ar','fr','en'],
    data()
    {
        return{
            logo : '../public/images/logo.png',
            data : {
                username : ""
            },
            bool : true,
        }
    },
    methods : {
        toggle()
        {
            this.bool = false
        },
        async search()
        {
            this.bool = true
            const res = await this.callApi('POST','../checkpointUsername',this.data)
            if(res.status === 200)
            {
                if(res.data === "yes")
                {
                 location.href="recover/"
                }else if(res.data === "no")
                {
                    if(this.fr)
                    {
                        this.statu('Le nom d\'utilisateur n\'existe pas','error')
                    }else if(this.en)
                    {
                        this.statu('username does not exist','error')
                    }else if(this.ar)
                    {
                        this.statu('اسم المستخدم غير موجود','error')
                    }
                    setTimeout(() => {
                        this.bool = false
                    }, 2000);
                }
            }
        }
    }
}
</script>