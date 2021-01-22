<template>
    <div id="wrap">
        <div v-if="fr" style="margin-top:32px;text-align:center;" class="container">
            <a href="../index"><img :src="logo" alt="logo"></a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="code" style="font-weight:bold;">Code Verificarion</label>
                        <input @keyup="toggle" @keyup.enter="verify" type="text" name="code" id="code" class="form-control" v-model="data.enter" required>
                    </div>
                    <button @click="verify" :disabled="bool" class='btn btn-primary'>Valider</button>
                </div>
            </div>
            <div v-if="show" class="password">
                <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="newpass" style="font-weight:bold;">Nouveau mote de passe</label>
                        <input @keyup="toggle1" type="password" name="newpass" id="newpass" class='form-control' v-model="data1.new" required>
                    </div>

                    <div class="form-group">
                        <label for="rnewpass" style="font-weight:bold;">re-entrer Nouveau mote de passe</label>
                        <input @keyup="toggle1" type="password" name="newpass" id="rnewpass" class='form-control' v-model="data1.rnew" required>
                    </div>
                    <button @click="change" :disabled="bool1" class='btn btn-success'>changer</button>
                </div>
            </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    props : ['ar','fr','en','code'],
    data()
    {
        return{
            data : {
                code : this.code,
                enter : null,
            },
            logo : '../public/images/logo.png',
            bool : true,
            show : false,
            data1:{
                new : null,
                rnew : null
            },
            bool1 : true
        }
    },
    methods : {
          toggle()
          {
              this.bool = false
          },
          async verify()
          {
             this.bool = true
            const res = await this.callApi('POST','../verifyy',this.data)
            if(res.status === 200)
            {
                if(res.data === "yes")
                {
                this.show = true
                }else if(res.data === "no")
                {
                    if(this.fr)
                    {
                        this.statu('code incorrect','error')
                    }else if(this.en)
                    {
                        this.statu('incorrect code','error')
                    }else if(this.ar)
                    {
                        this.statu('كود خطأ','error')
                    }
                    this.bool = false
                }
            }
          },
          async change()
          {
              this.bool1 = true
              const res1 = await this.callApi('POST','../changePassword',this.data1)
              if(res1.status === 200)
              {
                  if(res1.data === "yes")
                  {
                      location.href = "../index"

                  }else{
                      if(this.fr)
                      {
                          this.statu('le mot de passe ne correspond pas','error')
                      }else if(this.en)
                      {
                          this.statu('password does not match','error')
                      }else if(this.ar)
                      {
                          this.statu('كلمة السر غير متطابقة','error')
                      }
                      this.bool1 =  false
                  }
              }
          },
          toggle1()
          {
              this.bool1 = false
          }
    }
}
</script>