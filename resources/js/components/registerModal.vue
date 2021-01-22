<template>
    <div>
<div v-if="fr" class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">S'inscrire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
         <label for="name" style='font-weight:bold;'>Nom Complet</label>
         <input type="text"  name="name" id="name" v-model="name" class="form-control" placeholder="Nom Complet"  required>
       </div>

       <div class="form-group">
         <label for="username" style='font-weight:bold;'>Nom d'utilisateur</label>
         <input type="text" name="username"  v-model="username" id="username" class="form-control" placeholder="Nom d'utilisateur"  required>
       </div>

       <div class="form-group">
         <label for="email" style='font-weight:bold;'>Email</label>
         <input type="email" name="email"  id="email" v-model="email" class="form-control" placeholder="Email"  required>
       </div>

       <div class="form-group">
         <label for="phone" style='font-weight:bold;'>Téléphone</label>
         <input type="number" max="11"  name="phone" v-model="phone" id="phone" class="form-control" placeholder="Téléphone"  required>
       </div>

       <div class="form-group">
         <label for="password" style='font-weight:bold;'>Mot de passe</label>
         <input type="password" name="password"  v-model="pass" id="password" class="form-control" placeholder="Mot de passe"  required>
       </div>

       <div class="form-group">
         <label for="re-password" style='font-weight:bold;'>Retaper le mot de passe</label>
         <input type="password"  name="re-password" v-model="re_pass" id="re-password" class="form-control" placeholder="Retaper le mot de passe"  required>
       </div>

       <div class="form-group">
         <label for="proviance" style='font-weight:bold;'>Proviance</label>
         <select class="form-control" @change="checker" v-model="proviance" id="proviance">
      <option v-for="state in states" :key="state.id" :value="state.id + ';' + state.id_country">{{ state.name }}</option>
    </select>
       </div>

       <div class="custom-file">
    <input type="file" class="custom-file-input" id="profile"  accept="image/png, image/jpeg,image/jpg" @change="handleImage" required>
    <label class="custom-file-label" for="profile">AVATAR...</label>
  </div>
  <img v-if="tmp !== ''"  :src="tmp" style="width:200px; height:200px;margin-top: 16px;margin-left: 129px;" alt="image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" :disabled="bool" @click="register"  class="btn btn-success"> {{ !clicked ? "S'inscrire" : "..." }} </button>
      </div>
    </div>
  </div>
</div>



<div v-if="en" class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
         <label for="name" style='font-weight:bold;'>Full Name</label>
         <input type="text"  name="name" id="name" v-model="name" class="form-control" placeholder="Full Name"  required>
       </div>

       <div class="form-group">
         <label for="username" style='font-weight:bold;'>Username</label>
         <input type="text" name="username"  v-model="username" id="username" class="form-control" placeholder="Username"  required>
       </div>

       <div class="form-group">
         <label for="email" style='font-weight:bold;'>Email</label>
         <input type="email" name="email"  id="email" v-model="email" class="form-control" placeholder="Email"  required>
       </div>

       <div class="form-group">
         <label for="phone" style='font-weight:bold;'>Phone</label>
         <input type="number" max="11"  name="phone" v-model="phone" id="phone" class="form-control" placeholder="Phone"  required>
       </div>

       <div class="form-group">
         <label for="password" style='font-weight:bold;'>Password</label>
         <input type="password" name="password"  v-model="pass" id="password" class="form-control" placeholder="Password"  required>
       </div>

       <div class="form-group">
         <label for="re-password" style='font-weight:bold;'>re enter Password</label>
         <input type="password"  name="re-password" v-model="re_pass" id="re-password" class="form-control" placeholder="re enter Password"  required>
       </div>

       <div class="form-group">
         <label for="proviance" style='font-weight:bold;'>Proviance</label>
         <select class="form-control" @change="checker" v-model="proviance" id="proviance">
      <option v-for="state in states" :key="state.id" :value="state.id + ';' + state.id_country">{{ state.name }}</option>
    </select>
       </div>

       <div class="custom-file">
    <input type="file" class="custom-file-input" id="profile"  accept="image/png, image/jpeg,image/jpg" @change="handleImage" required>
    <label class="custom-file-label" for="profile">AVATAR...</label>
  </div>
  <img v-if="tmp !== ''"  :src="tmp" style="width:200px; height:200px;margin-top: 16px;margin-left: 129px;" alt="image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" :disabled="bool" @click="register"  class="btn btn-success"> {{ !clicked ? "Register" : "..." }} </button>
      </div>
    </div>
  </div>
</div>



<div v-if="ar" class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تسجيل حساب جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
         <label for="name" style='font-weight:bold;'>الإسم كامل</label>
         <input type="text"  name="name" id="name" v-model="name" class="form-control" placeholder="الإسم كامل"  required>
       </div>

       <div class="form-group">
         <label for="username" style='font-weight:bold;'>إسم المستخدم</label>
         <input type="text" name="username"  v-model="username" id="username" class="form-control" placeholder="إسم المستخدم"  required>
       </div>

       <div class="form-group">
         <label for="email" style='font-weight:bold;'>البريد الإلكتروني</label>
         <input type="email" name="email"  id="email" v-model="email" class="form-control" placeholder="البريد الإلكتروني"  required>
       </div>

       <div class="form-group">
         <label for="phone" style='font-weight:bold;'>الهاتف</label>
         <input type="number" max="11"  name="phone" v-model="phone" id="phone" class="form-control" placeholder="الهاتف"  required>
       </div>

       <div class="form-group">
         <label for="password" style='font-weight:bold;'>كلمة المرور</label>
         <input type="password" name="password"  v-model="pass" id="password" class="form-control" placeholder="كلمة المرور"  required>
       </div>

       <div class="form-group">
         <label for="re-password" style='font-weight:bold;'>إعادة إدخال كلمة المرور</label>
         <input type="password"  name="re-password" v-model="re_pass" id="re-password" class="form-control" placeholder="إعادة إدخال كلمة المرور"  required>
       </div>

       <div class="form-group">
         <label for="proviance" style='font-weight:bold;'>الولاية</label>
         <select class="form-control" @change="checker" v-model="proviance" id="proviance">
      <option v-for="state in states" :key="state.id" :value="state.id + ';' + state.id_country">{{ state.name }}</option>
    </select>
       </div>

       <div class="custom-file">
    <input type="file" class="custom-file-input" id="profile"  accept="image/png, image/jpeg,image/jpg" @change="handleImage" required>
    <label class="custom-file-label" for="profile">صورة...</label>
  </div>
  <img v-if="tmp !== ''"  :src="tmp" style="width:200px; height:200px;margin-top: 16px;margin-left: 129px;" alt="image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
        <button type="button" :disabled="bool" @click="register"  class="btn btn-success"> {{ !clicked ? "تسجيل" : "..." }} </button>
      </div>
    </div>
  </div>
</div>
    </div>
</template>

<script>
export default {
  props : ['fr','ar','en'],
  data(){
    return{
       name : '',
       username : '',
       email : '',
       phone : '',
       pass : '',
       re_pass : '',
       proviance : '',
       states : [],
       imageSelected : '',
       tmp : '',
       bool  : true,
       clicked : false

    }
  },
  methods : {
      async register()
      {
        this.clicked = true
        this.bool = true

        if(this.name !== "" && this.username !== "" && this.email !== "" && this.phone !== "" && this.pass !== "" &&
        this.re_pass !==  "")
        {
          if(this.pass == this.re_pass)
          {
            let data = new FormData();
            data.append('name',this.name)
            data.append('username',this.username)
            data.append('email',this.email)
            data.append('phone',this.phone)
            data.append('pass',this.re_pass)
            data.append('state',this.proviance)
            data.append('avatar',this.imageSelected)

            const res = await this.callApi('POST','register',data)
            if(res.status === 200)
            {
               if(res.data == "no")
               {
                  setTimeout(() => {
           this.clicked = false
        this.bool = false
         if(this.fr)
         {
           this.statu('sélectionnez une image valide',"error")
         }else if(this.en)
         {
           this.statu('select a valid image',"error")
         }else if(this.ar)
         {
          this.statu('إختر صورة صالحة',"error")
         }
         }, 2000);
               }else if(res.data == "yes"){
                 setTimeout(() => {
           this.clicked = false
        this.bool = false
         if(this.fr)
         {
           this.statu('opèration effectuée',"success")
         }else if(this.en)
         {
           this.statu('operation performed',"success")
         }else if(this.ar)
         {
           this.statu('أجريت العملية',"success")
         }

         }, 2000);
         this.name = ""; this.username = ""; this.email = ""; this.phone = ""; this.pass = ""; this.re_pass = ""; this.tmp = ""
         location.href = "verification/";
               }else if(res.data == "nono")
               {
                 setTimeout(() => {
           this.clicked = false
        this.bool = false
         if(this.fr)
         {
           this.statu('Nom d\'utilisateur déjà utilisé',"error")
         }else if(this.en)
         {
           this.statu('Username already in use',"error")
         }else if(this.ar)
         {
           this.statu('اسم المستخدم قيد الاستخدام بالفعل',"error")
         }
         }, 2000);
               }
            }

          }else{
            setTimeout(() => {
           this.clicked = false
        this.bool = false
         if(this.fr)
         {
           this.statu('le mot de passe doit être correspondant',"error")
         }else if(this.en)
         {
          this.statu('the password must match',"error")
         }else if(this.ar)
         {
            this.statu('يجب أن تتطابق كلمة المرور',"error")
         }
         }, 2000);
          }

        }else{
         setTimeout(() => {
           this.clicked = false
        this.bool = false
         if(this.fr)
         {
           this.statu('complètè vos information',"error")
         }else if(this.en)
         {
          this.statu('complete your information',"error")
         }else if(this.ar)
         {
          this.statu('أكمل معلوماتك',"error")
         }
         }, 2000);
        }

      },

      handleImage(e)
      {
         this.imageSelected = e.target.files[0]
         var reader = new FileReader()  
            reader.onload = (f) => {
               this.tmp = f.target.result
            }
            reader.readAsDataURL(e.target.files[0])

         this.bool = false
      },
      checker()
      {
           this.bool= false
      }
  },
  async created()
  {
    const res = await this.callApi('GET','states')
    if(res.status == 200)
    {
      this.states = res.data
    }
  }
}
</script>