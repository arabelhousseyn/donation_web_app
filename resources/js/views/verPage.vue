<template>
<div>
<div v-if="fr" id="verification">
        <div style="text-align:center;" id="boxx">
             <a href="index/"><img src="public/images/logo.png" alt="logo"></a>
        </div>
        <div style='text-align: center;margin-top: 200px;'  class="container">
            <h1>nous vous envoyons un code de vérification, veuillez vérifier votre adresse e-mail</h1>
            <div class="form-group">
                <input @keypress="checker" @keyup.enter="verify" type="number" name="code" id="code" placeholder="code de vérification" v-model="data.code" class='form-control' required>
            </div>
            <button @click="verify" :disabled="bool" class='btn btn-primary'> {{ !clicked ? "vérification" : "..." }} </button>
            <button @click="resend" class='btn btn-success'> <span><i class="fas fa-reply"></i></span> renvoyer le code</button>
        </div>
    </div>


    <div v-if="en" id="verification">
        <div style="text-align:center;" id="boxx">
             <a href="index/"><img src="public/images/logo.png" alt="logo"></a>
        </div>
        <div style='text-align: center;margin-top: 200px;'  class="container">
            <h1>we send you a verification code, please verify your email address</h1>
            <div class="form-group">
                <input @keypress="checker" @keyup.enter="verify" type="number" name="code" id="code" placeholder="Verification code" v-model="data.code" class='form-control' required>
            </div>
            <button @click="verify" :disabled="bool" class='btn btn-primary'> {{ !clicked ? "vérification" : "..." }} </button>
            <button @click="resend" class='btn btn-success'> <span><i class="fas fa-reply"></i></span> resend code</button>
        </div>
    </div>


    <div v-if="ar" id="verification">
        <div style="text-align:center;" id="boxx">
             <a href="index/"><img src="public/images/logo.png" alt="logo"></a>
        </div>
        <div style='text-align: center;margin-top: 200px;'  class="container">
            <h1>نرسل لك رمز التحقق ، يرجى التحقق من عنوان بريدك الإلكتروني</h1>
            <div class="form-group">
                <input @keypress="checker" @keyup.enter="verify" type="number" name="code" id="code" placeholder="رمز التحقق" v-model="data.code" class='form-control' required>
            </div>
            <button @click="verify" :disabled="bool" class='btn btn-primary'> {{ !clicked ? "vérification" : "..." }} </button>
            <button @click="resend" class='btn btn-success'> <span><i class="fas fa-reply"></i></span> أعد إرسال الرمز</button>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data()
    {
        return{
            ar : false,
            fr : false,
            en : false,
            data : {
                code : ""
            },
            bool : true,
            clicked : false,
        }
    },
    methods :{

        async verify()
        {
          this.bool = true
          this.clicked =true
          const res = await this.callApi('POST','vercode',this.data)
          if(res.status === 200)
          {
              if(res.data == "yes")
              {
                location.href = "index/"
              }else{
                setTimeout(() => {
                    this.bool = false
          this.clicked =false
          if(this.fr)
          {
            this.statu("erreur de code","error")
          }else if(this.en)
          {
            this.statu("code error","error")
          }else if(this.ar)
          {
          this.statu("رمز الخطأ","error")
          }
                }, 2000);
              }
          }

        },
        checker()
        {
           if(this.data.code.length > 3)
           {
               this.bool =  false
           }else{
               this.bool = true
           }
        },
        async resend()
        {
            const res = await this.callApi('GET','resendCode')
            if(res.status === 200)
            {
                if(this.fr)
                {
                  this.statu("code envoyé","success")
                }else if(this.en)
                {
                  this.statu("code sended","success")
                }else if(this.ar)
                {
                this.statu("تم إرسال الرمز","success")
                }
            }
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
                this.ar = false
                this.en = false
            }else if(res.data == "en")
            {
                this.en = true
                this.fr = false
                this.ar = false
            }else if(res.data == "ar")
            {
                this.ar = true
                this.en = false
                this.fr = false
            }
       }
    }
}
</script>