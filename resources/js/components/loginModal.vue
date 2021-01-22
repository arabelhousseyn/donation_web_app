<template>
<div>
<div v-if="fr" class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="user" style="font-weight:bold;">Nom d'utilisateur</label>
          <input type="text" name="user" id="user" placeholder="Nom d'utilisateur" v-model="data.username" class='form-control' required>
        </div>

        <div class="form-group">
          <label for="pass" style="font-weight:bold;">Mot de passe</label>
          <input type="password" @keyup.enter="login" @keypress="check" name="pass" id="pass" placeholder="Mot de passe" v-model="data.password" class='form-control' required>
        </div>
        <a href="forget/checkpoint/">mote de passe oubliè ?</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" @click="login" :disabled="bool" class="btn btn-primary"> {{ !clicked ? "Connexion" : "..." }} </button>
      </div>
    </div>
  </div>
</div>

<div v-if="en" class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="user" style="font-weight:bold;">Username</label>
          <input type="text" name="user" id="user" placeholder="Username" v-model="data.username" class='form-control' required>
        </div>

        <div class="form-group">
          <label for="pass" style="font-weight:bold;">Password</label>
          <input type="password" @keyup.enter="login" @keypress="check" name="pass" id="pass" placeholder="Password" v-model="data.password" class='form-control' required>
        </div>
        <a href="forget/checkpoint/">Forget password ?</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" @click="login" :disabled="bool" class="btn btn-primary"> {{ !clicked ? "login" : "..." }} </button>
      </div>
    </div>
  </div>
</div>


<div v-if="ar" class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تسجيل الدخول</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="user" style="font-weight:bold;">إسم المستخدم</label>
          <input type="text" name="user" id="user" placeholder="إسم المستخدم" v-model="data.username" class='form-control' required>
        </div>

        <div class="form-group">
          <label for="pass" style="font-weight:bold;">الرقم السري</label>
          <input type="password" @keyup.enter="login" @keypress="check" name="pass" id="pass" placeholder="الرقم السري" v-model="data.password" class='form-control' required>
        </div>
        <a href="forget/checkpoint/">نسيت كلمة السر؟</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
        <button type="button" @click="login" :disabled="bool" class="btn btn-primary"> {{ !clicked ? "تسجيل الدخول" : "..." }} </button>
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
       bool : true,
       data : {
         username : "",
         password : "",
       },
       clicked : false,
    }
  },
  methods : {
    async login()
    {
      this.bool = true
      this.clicked = true
      const res = await this.callApi('POST','login',this.data)
      if(res.status === 200)
      {
        if(res.data == "yes")
        {
           location.reload();
        }else if(res.data == "no")
        {
           this.bool = false
      this.clicked = false
      if(this.fr)
      {
       this.statu("Le nom d'utilisateur n'existe pas","error")
      }else if(this.en)
      {
           this.statu("username does not exist","error")
      }else if(this.ar)
      {
           this.statu("اسم المستخدم غير موجود","error")
      }  
        }else if(res.data == "nono")
        {
          this.bool = false
      this.clicked = false
      if(this.fr)
      {
       this.statu("Mot de passe incorrect","error")
      }else if(this.en)
      {
           this.statu("incorrect password","error")
      }else if(this.ar)
      {
           this.statu("كلمة سر خاطئة","error")
      }
        }else if(res.data == "verify")
        {
          location.href = "verification/";
        }
      }
    },
    check()
    {
      this.bool = false
    }
  }
}
</script>