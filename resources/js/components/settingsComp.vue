<template>
<div id="wrap">
    <div v-for="inf in info" :key="inf.id"  v-if="fr && editable" style='text-align:center;' class="settings">
        <div class="container">
            <a href="../../index"><img :src="logo" alt="logo"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <div class="form-group">
                   <label for="name" style="font-weight:bold;">Nom Complete : {{inf.fullName}}</label>
                   <input @change="toggle" type="text" name="name" id="name" class='form-control' v-model="inf.fullName" required>
               </div>
               <div class="form-group">
                   <label for="phone" style="font-weight:bold;">Telephone : {{inf.phone}}</label>
                   <input @change="toggle" type="number" max="10" name="phone" id="phone" class='form-control' v-model="inf.phone"  required>
               </div>
               <button :disabled="bool" @click="change1" class='btn btn-success'> {{ !clicked ?'modify' : '...' }} </button>
                </div>
            </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span>Mote de passe</span>
                        <div class="form-group">
                            <label for="oldPass" style='font-weight:bold;'>Ancien mote de passe</label>
                            <input @change="toggle1" type="password" name="oldPass" id="oldPass" v-model="data2.old" class='form-control' required>
                        </div>

                        <div class="form-group">
                            <label for="newPass" style='font-weight:bold;'>Nouveau mote de passe</label>
                            <input @change="toggle1" type="password" name="newPass" id="newPass" v-model="data2.new" class='form-control' required>
                        </div>

                        <div class="form-group">
                            <label for="renPass" style='font-weight:bold;'>re-entrer Nouveau mote de passe</label>
                            <input @change="toggle1" type="password" name="renPass" id="renPass" v-model="data2.rnew" class='form-control' required>
                        </div>
                        <button :disabled="bool1" @click="change2" class='btn btn-success'> {{ !clicked1 ? 'Changer' : '...' }} </button>
                    </div>
                </div>
                </div>       
    </div>

    <div v-for="inf in info" :key="inf.id"  v-if="en && editable" style='text-align:center;' class="settings">
        <div class="container">
            <a href="../../index"><img :src="logo" alt="logo"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <div class="form-group">
                   <label for="name" style="font-weight:bold;">FullName : {{inf.fullName}}</label>
                   <input @change="toggle" type="text" name="name" id="name" class='form-control' v-model="inf.fullName" required>
               </div>
               <div class="form-group">
                   <label for="phone" style="font-weight:bold;">Phone : {{inf.phone}}</label>
                   <input @change="toggle" type="number" max="10" name="phone" id="phone" class='form-control' v-model="inf.phone"  required>
               </div>
               <button :disabled="bool" @click="change1" class='btn btn-success'> {{ !clicked ?'Modifier' : '...' }} </button>
                </div>
            </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span>Password</span>
                        <div class="form-group">
                            <label for="oldPass" style='font-weight:bold;'>old password</label>
                            <input @change="toggle1" type="password" name="oldPass" id="oldPass" v-model="data2.old" class='form-control' required>
                        </div>

                        <div class="form-group">
                            <label for="newPass" style='font-weight:bold;'>new password</label>
                            <input @change="toggle1" type="password" name="newPass" id="newPass" v-model="data2.new" class='form-control' required>
                        </div>

                        <div class="form-group">
                            <label for="renPass" style='font-weight:bold;'>re-enter new password</label>
                            <input @change="toggle1" type="password" name="renPass" id="renPass" v-model="data2.rnew" class='form-control' required>
                        </div>
                        <button :disabled="bool1" @click="change2" class='btn btn-success'> {{ !clicked1 ? 'change' : '...' }} </button>
                    </div>
                </div>
                </div>       
    </div>


    <div v-for="inf in info" :key="inf.id"  v-if="ar && editable" style='text-align:center;' class="settings">
        <div class="container">
            <a href="../../index"><img :src="logo" alt="logo"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <div class="form-group">
                   <label for="name" style="font-weight:bold;">{{inf.fullName}} : الإسم كامل</label>
                   <input @change="toggle" type="text" name="name" id="name" class='form-control' v-model="inf.fullName" required>
               </div>
               <div class="form-group">
                   <label for="phone" style="font-weight:bold;">{{inf.phone}} : الهاتف</label>
                   <input @change="toggle" type="number" max="10" name="phone" id="phone" class='form-control' v-model="inf.phone"  required>
               </div>
               <button :disabled="bool" @click="change1" class='btn btn-success'> {{ !clicked ?'Modifier' : '...' }} </button>
                </div>
            </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span>الرقم السري</span>
                        <div class="form-group">
                            <label for="oldPass" style='font-weight:bold;'>الرقم السري القديم</label>
                            <input @change="toggle1" type="password" name="oldPass" id="oldPass" v-model="data2.old" class='form-control' required>
                        </div>

                        <div class="form-group">
                            <label for="newPass" style='font-weight:bold;'>الرقم السري الجديد</label>
                            <input @change="toggle1" type="password" name="newPass" id="newPass" v-model="data2.new" class='form-control' required>
                        </div>

                        <div class="form-group">
                            <label for="renPass" style='font-weight:bold;'>إعادة إدخال الرقم السري الجديد</label>
                            <input @change="toggle1" type="password" name="renPass" id="renPass" v-model="data2.rnew" class='form-control' required>
                        </div>
                        <button :disabled="bool1" @click="change2" class='btn btn-success'> {{ !clicked1 ? 'Changer' : '...' }} </button>
                    </div>
                </div>
                </div>       
    </div>
</div>
</template>
<script>
export default {
    props : ['editable','info','ar','en','fr'],
    data()
    {
        return{
            logo : '../../public/images/logo.png',
            path : '../../../files_system/avatars/',
            data2 : {
                old : null,
                new : null,
                rnew : null,
                basic : ""
            },
            bool : true,
            clicked: false,
             bool1 : true,
            clicked1: false,
        }
    },
    methods : {
        async change1()
    {
        this.bool = true
        this.clicked = true
        if(this.info.fullName == "" || this.info.phone == "")
        {
          if(this.fr)
          {
              this.statu('entrez tous les champs','error')
          }else if(this.en)
          {
              this.statu('enter all fields','error')
          }else{
              this.statu('أدخل جميع الحقول','error')
          }
           this.bool = true
        this.clicked = false
        }else{
            var data = new FormData();
            for (const inf of this.info) {
                data.append('fullName',inf.fullName)
            data.append('phone',inf.phone)   
            }
            const res = await this.callApi('POST','../profile/changeUserInformation',data)
       if(res.status == 200)
       {
           if(res.data == "yes")
           {
               if(this.fr)
               {
                   this.statu('opèration effectuée','success')
               }else if(this.en)
               {
                   this.statu('operation performed','success')
               }else if(this.ar)
               {
                   this.statu('أجريت العملية','success')
               }
               setTimeout(() => {
                    this.bool = true
        this.clicked = false
               }, 2000);
           }else if(res.data == "no")
           {
              if(this.fr)
               {
                   this.statu('le numéro de téléphone existe déjà','error')
               }else if(this.en)
               {
                   this.statu('phone number already exist','error')
               }else if(this.ar)
               {
                   this.statu('رقم الهاتف موجود بالفعل','error')
               } 
               setTimeout(() => {
                    this.bool = true
        this.clicked = false
               }, 2000);
           }
        }
       }
    },
    async change2()
    {
        this.bool1 = true
        this.clicked1 = true
        const ch = await this.callApi('POST','../profile/changePassword',this.data2)
        if(ch.status === 200)
        {
            if(ch.data == "no")
            {
                if(this.fr)
                {
                  this.statu('Ancien mot de passe est incorrect','error')
                }else if(this.en)
                {
                    this.statu('old password is incorrect','error')
                }else if(this.ar)
                {
                    this.statu('كلمة سر قديمة ليست صحيحة','error')
                }
                setTimeout(() => {
                    this.bool1 = false
                this.clicked1 = false
                }, 2000);
            }else if(ch.data == "nono")
            {
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
                setTimeout(() => {
                    this.bool1 = false
                this.clicked1 = false
                }, 2000);
            }else if(ch.data == "yes")
            {
                location.href = '../../index'
            }
        }
    },
    toggle()
    {
        if(this.info.fullName == "" || this.info.phone == "")
        {
            this.bool = true
        }else{
            this.bool= false
        }
    },
    toggle1()
    {
        if(this.data2.basic == "")
        {
                  for (const inf of this.info) {
           this.data2.basic = inf.password
       }
        }

        if(this.data2.old  == "" || this.data2.new == "" || this.data2.rnew == "")
        {
            this.bool1 = true
        }else{
            if(this.data2.new == this.data2.rnew)
            {
                this.bool1 = false
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
            }
        }
    }
    },
}
</script>