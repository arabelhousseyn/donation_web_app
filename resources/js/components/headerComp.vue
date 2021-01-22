<template>
<div>
  <div v-if="grreting" class="donation">
<div v-if="fr" style="text-align:center;" class="alert alert-success">
    vous êtes inscrit avec succès si vous souhaitez publier vos dons veuillez vous connecter merci
  </div>
  <div v-if="en" style="text-align:center;" class="alert alert-success">
    you are registered successfully if you want to upload your donations please login thank you
  </div>
  <div v-if="ar" style="text-align:center;" class="alert alert-success">
   لقد تم تسجيلك بنجاح إذا كنت تريد تحميل تبرعاتك برجاء تسجيل الدخول شكرا لك
  </div>
  </div>
    <div v-if="fr" class="upper">
      <div class="container">
        <div class="row">
          <div class="col-md">
            <a href="index"><img src="public/images/logo.png" id="logo" alt="logo"></a>
          </div>

          <div class="col-md">
            
          </div>

          <div class="col-md">
         <div v-if="!perm" class="connect">
              <span class="icon"><i class="fa fa-user-edit"></i></span><a href="" data-toggle="modal" data-target="#register" id="reg">S'inscrire</a> 
              <span style="padding:10px;">|</span> 
              <span  class="icon"><i class='fa fa-user'></i></span><a href="" data-toggle="modal" data-target="#login" id="log">Connexion</a>
            </div>
            
             <div v-if="perm" v-for="pr in profile" :key="pr.id" class="session">
              <button type="button"  data-toggle="modal" data-target="#addPost" id="add-donation"><span id="plus"><i class="fa fa-plus"></i></span></button>

              <a style="text-decoration:none;" class="btn-floating btn-lg black dropdown-toggle" type ="button" id="dropdownMenu3" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false"> <img v-if="pr.avatar !== ''" :src="avatar + pr.avatar" id="imgProfile" alt="">
  <img v-else :src="avatar + 'custom.jpg' " id="imgProfile" alt="">
   <span id="profileName">{{ pr.fullName }}</span></a>
<br>

  <div class="dropdown-menu dropdown-primary">
    <a class="dropdown-item" :href="'profile/'+pr.username + '/'"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;Profil</a>
    <a class="dropdown-item" :href="'profile/'+pr.username + '/settings'"><i class="fa fa-cog"></i>&nbsp;&nbsp;Réglages</a>
    <a class="dropdown-item" href="logout/"><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;Se déconnecter</a>
  </div>
</div>
            </div>

            <div class="col-md-2">
              <div style="margin-top:56px;" class="dropdown">
  <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    langage
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <button class="dropdown-item" @click="enn">en</button>
    <button class="dropdown-item" @click="arr">ar</button>
  </div>
</div>
            </div>
          </div>
        </div>
        <login-modal :ar="ar" :fr="fr" :en="en"  />
        <register-modal :ar="ar" :fr="fr" :en="en" />
        <add-posts-modal :ar="ar" :fr="fr" :en="en" />
      </div>

      <div v-if="en" class="upper">
      <div class="container">
        <div class="row">
          <div class="col-md">
            <a href="index"><img src="public/images/logo.png" id="logo" alt="logo"></a>
          </div>

          <div class="col-md">

          </div>

          <div class="col-md">
         <div v-if="!perm" class="connect">
              <span class="icon"><i class="fa fa-user-edit"></i></span><a href="" data-toggle="modal" data-target="#register" id="reg">Register</a> 
              <span style="padding:10px;">|</span> 
              <span  class="icon"><i class='fa fa-user'></i></span><a href="" data-toggle="modal" data-target="#login" id="log">Login</a>
            </div>
            
             <div v-if="perm" v-for="pr in profile" :key="pr.id" class="session">
              <button type="button"  data-toggle="modal" data-target="#addPost" id="add-donation"><span id="plus"><i class="fa fa-plus"></i></span></button>

              <a style="text-decoration:none;" class="btn-floating btn-lg black dropdown-toggle" type ="button" id="dropdownMenu3" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false"> <img v-if="pr.avatar !== ''" :src="avatar + pr.avatar" id="imgProfile" alt="">
  <img v-else :src="avatar + 'custom.jpg' " id="imgProfile" alt="">
   <span id="profileName">{{ pr.fullName }}</span></a>
<br>

  <div class="dropdown-menu dropdown-primary">
    <a class="dropdown-item" :href="'profile/'+pr.username + '/'"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;Profile</a>
    <a class="dropdown-item" :href="'profile/'+pr.username + '/settings'"><i class="fa fa-cog"></i>&nbsp;&nbsp;Settings</a>
    <a class="dropdown-item" href="logout/"><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
  </div>
</div>
            </div>

            <div class="col-md-2">
              <div style="margin-top:56px;" class="dropdown">
  <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    language
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <button class="dropdown-item" @click="frr">fr</button>
    <button class="dropdown-item" @click="arr">ar</button>
  </div>
</div>
            </div>
          </div>
        </div>
        <login-modal :ar="ar" :fr="fr" :en="en"  />
        <register-modal :ar="ar" :fr="fr" :en="en" />
        <add-posts-modal :ar="ar" :fr="fr" :en="en" />
      </div>

      <div v-if="ar" class="upper">
      <div class="container">
        <div class="row">
          <div class="col-md">
            <a href="index"><img src="public/images/logo.png" id="logo" alt="logo"></a>
          </div>

          <div class="col-md">

          </div>

          <div class="col-md">
         <div v-if="!perm" class="connect">
              <span class="icon"><i class="fa fa-user-edit"></i></span><a href="" data-toggle="modal" data-target="#register" id="reg">تسجيل حساب جديد</a> 
              <span style="padding:10px;">|</span> 
              <span  class="icon"><i class='fa fa-user'></i></span><a href="" data-toggle="modal" data-target="#login" id="log">تسجيل الدخول</a>
            </div>
            
             <div v-if="perm" v-for="pr in profile" :key="pr.id" class="session">
              <button type="button"  data-toggle="modal" data-target="#addPost" id="add-donation"><span id="plus"><i class="fa fa-plus"></i></span></button>

              <a style="text-decoration:none;" class="btn-floating btn-lg black dropdown-toggle" type ="button" id="dropdownMenu3" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false"> <img v-if="pr.avatar !== ''" :src="avatar + pr.avatar" id="imgProfile" alt="">
  <img v-else :src="avatar + 'custom.jpg' " id="imgProfile" alt="">
   <span id="profileName">{{ pr.fullName }}</span></a>
<br>

  <div class="dropdown-menu dropdown-primary">
    <a class="dropdown-item" :href="'profile/'+pr.username + '/'"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;حسابي</a>
    <a class="dropdown-item" :href="'profile/'+pr.username + '/settings'"><i class="fa fa-cog"></i>&nbsp;&nbsp;إعدادات</a>
    <a class="dropdown-item" href="logout/"><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;تسجيل الخروج</a>
  </div>
</div>
            </div>
            <div class="col-md-2">
              <div style="margin-top:56px;" class="dropdown">
  <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    اللغة
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <button class="dropdown-item" @click="frr">fr</button>
    <button class="dropdown-item" @click="enn">en</button>
  </div>
</div>
            </div>
          </div>
        </div>
        <login-modal :ar="ar" :fr="fr" :en="en"  />
        <register-modal :ar="ar" :fr="fr" :en="en" />
        <add-posts-modal :ar="ar" :fr="fr" :en="en" />
      </div>
      </div>
</template>

<script>
import loginModal from './loginModal'
import registerModal from './registerModal'
import addPostsModal from './addPostsModal';
import AddPostsModal from './addPostsModal.vue';
export default {
  props : ['ar','en','fr'],
  data(){
    return{
      perm : false,
      grreting : false,
      profile : null,
      avatar : "../files_system/avatars/"
    }
  },
  components : {
    loginModal,
    registerModal,
    AddPostsModal
  },
  methods : {
    async arr()
    {
      const a = await this.callApi('GET','ar')
      if(a.status == 200)
      {
        if(a.data == 'ar')
        {
         location.reload();
        }
      }
    },

    async frr()
    {
      const f = await this.callApi('GET','fr')
      if(f.status == 200)
      {
        if(f.data == 'fr')
        {
              location.reload();
        }
      }
    },

    async enn()
    {
      const e = await this.callApi('GET','en')
      if(e.status == 200)
      {
        if(e.data == "en")
        {
           location.reload();
        }
      }
    }
  },
  async created(){
    const res = await this.callApi('GET','checkAuth')
    if(res.status == 200)
    {
      if(res.data == "no")
      {
        this.perm = false
      }else if(res.data == "yes"){
        this.perm = true
      }
       
    }
    const res2 = await this.callApi('GET','alert')
    if(res2.status === 200)
    {
           if(res2.data == "yes")
    {
     this.grreting = true
    }else{
    this.grreting = false
    }
    }

    if(this.perm)
    {
      const res3 = await this.callApi('GET','userInformation')
      if(res3.status === 200)
      {
        this.profile = res3.data
      }
    }
  }
}
</script>