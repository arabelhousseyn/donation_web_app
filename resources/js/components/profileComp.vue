<template>
    <div>
     <div v-if="fr"  class="profile">
           <div v-for="inf in info" :key="inf.id" style="text-align:center;margin-top:32px;"  class="container">
             <a href="../index"><img :src="logo" alt="logo"></a>
             <div class="row">
                 <div class="col-lg-8">
                     <input type="hidden" id="town" :value="inf.id_town">
                   <img style="border-radius: 50%;" :src="path + inf.avatar" alt="">
                   <h1 :title="inf.fullName">{{inf.fullName}}</h1>
                   <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Donations</a>
  </li>
  <li v-if="perm && editable" class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Favoirs</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div v-for="donation in donations" :key="donation.id" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div  style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="donation.title"></h5>
              <br>
              <p class="card-text" v-html="donation.description"></p>
              <p class="card-text"><small class="text-muted"><a ><i class="fas fa-calendar-check"></i> {{donation.date}}</a> </small></p>
            </div>
            <div v-if="donation.images !== ''" class="found">
               <img class="card-img-top"  :src="path2 + donation.images" style="width: 100%;" alt="Card image cap">
            </div>
          </div>
          <div v-if="perm && editable" class="card-footer">
                <button @click="remove(donation)" class='btn btn-danger'><i class='fas fa-trash'></i></button>
          </div>
        </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div v-for="(fa,index) in favorits" :key="index" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div  style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="fa.title"></h5>
              <br>
              <p class="card-text" v-html="fa.description"></p>
              <p class="card-text"><small class="text-muted"><a><i class="fas fa-calendar-check"></i> {{fa.date}}</a> </small></p>
            </div>
            <div v-if="fa.images !== ''" class="found">
               <img class="card-img-top"  :src="path2 + fa.images" style="width: 100%;" alt="Card image cap">
            </div>
          </div>
          <div v-if="perm && editable" class="card-footer">
                <button @click="unlike(fa)" class='btn btn-danger'><i class='fas fa-thumbs-down'></i></button>
          </div>
        </div>
        
 </div>
</div>
                 </div>
                 <div class="col-lg-4">
                    <div class="card my-4">
          <h5 v-if="perm && editable" class="card-header">Information : <a :href="inf.username + '/settings'" style="float:right;" class='btn btn-secondary'><i class='fas fa-edit'></i></a></h5>
          <h5 v-else class="card-header">Information : </h5>
          <div class="card-body">
              <p><strong>Email : </strong><span>{{inf.email}}</span></p>
              <p><strong>Telephone : </strong><span>{{inf.phone}}</span></p>
              <p><strong>Proviance : </strong><span>{{inf.name}}</span></p>
          </div>
        </div>
                 </div>
             </div>
         </div>
     </div>


     <div v-if="en"  class="profile">
           <div v-for="inf in info" :key="inf.id" style="text-align:center;margin-top:32px;"  class="container">
             <a href="../index"><img :src="logo" alt="logo"></a>
             <div class="row">
                 <div class="col-lg-8">
                     <input type="hidden" id="town" :value="inf.id_town">
                   <img style="border-radius: 50%;" :src="path + inf.avatar" alt="">
                   <h1 :title="inf.fullName">{{inf.fullName}}</h1>
                   <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Donations</a>
  </li>
  <li v-if="perm && editable" class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Favorits</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div v-for="donation in donations" :key="donation.id" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div  style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="donation.title"></h5>
              <br>
              <p class="card-text" v-html="donation.description"></p>
              <p class="card-text"><small class="text-muted"><a ><i class="fas fa-calendar-check"></i> {{donation.date}}</a> </small></p>
            </div>
            <div v-if="donation.images !== ''" class="found">
               <img class="card-img-top"  :src="path2 + donation.images" style="width: 100%;" alt="Card image cap">
            </div>
          </div>
          <div v-if="perm && editable" class="card-footer">
                <button @click="remove(donation)" class='btn btn-danger'><i class='fas fa-trash'></i></button>
          </div>
        </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div v-for="(fa,index) in favorits" :key="index" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div  style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="fa.title"></h5>
              <br>
              <p class="card-text" v-html="fa.description"></p>
              <p class="card-text"><small class="text-muted"><a :href="'../'+fa.title + '/'"><i class="fas fa-calendar-check"></i> {{fa.date}}</a> </small></p>
            </div>
            <div v-if="fa.images !== ''" class="found">
               <img class="card-img-top"  :src="path2 + fa.images" style="width: 100%;" alt="Card image cap">
            </div>
          </div>
          <div v-if="perm && editable" class="card-footer">
                <button class='btn btn-danger'><i class='fas fa-thumbs-down'></i></button>
          </div>
        </div>
        
 </div>
</div>
                 </div>
                 <div class="col-lg-4">
                    <div class="card my-4">
          <h5 v-if="perm && editable" class="card-header">Information : <a :href="inf.username + '/settings'" style="float:right;" class='btn btn-secondary'><i class='fas fa-edit'></i></a></h5>
          <h5 v-else class="card-header">Information : </h5>
          <div class="card-body">
              <p><strong>Email : </strong><span>{{inf.email}}</span></p>
              <p><strong>Phone : </strong><span>{{inf.phone}}</span></p>
              <p><strong>Proviance : </strong><span>{{inf.name}}</span></p>
          </div>
        </div>
                 </div>
             </div>
         </div>
     </div>


     <div v-if="ar"  class="profile">
           <div v-for="inf in info" :key="inf.id" style="text-align:center;margin-top:32px;"  class="container">
             <a href="../index"><img :src="logo" alt="logo"></a>
             <div class="row">
                 <div class="col-lg-8">
                     <input type="hidden" id="town" :value="inf.id_town">
                   <img style="border-radius: 50%;" :src="path + inf.avatar" alt="">
                   <h1 :title="inf.fullName">{{inf.fullName}}</h1>
                   <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">تبرعات</a>
  </li>
  <li v-if="perm && editable" class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">إعجاب</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div v-for="donation in donations" :key="donation.id" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div  style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="donation.title"></h5>
              <br>
              <p class="card-text" v-html="donation.description"></p>
              <p class="card-text"><small class="text-muted"><a ><i class="fas fa-calendar-check"></i> {{donation.date}}</a> </small></p>
            </div>
            <div v-if="donation.images !== ''" class="found">
               <img class="card-img-top"  :src="path2 + donation.images" style="width: 100%;" alt="Card image cap">
            </div>
          </div>
          <div v-if="perm && editable" class="card-footer">
                <button @click="remove(donation)" class='btn btn-danger'><i class='fas fa-trash'></i></button>
          </div>
        </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div v-for="(fa,index) in favorits" :key="index" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div  style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="fa.title"></h5>
              <br>
              <p class="card-text" v-html="fa.description"></p>
              <p class="card-text"><small class="text-muted"><a ><i class="fas fa-calendar-check"></i> {{fa.date}}</a> </small></p>
            </div>
            <div v-if="fa.images !== ''" class="found">
               <img class="card-img-top"  :src="path2 + fa.images" style="width: 100%;" alt="Card image cap">
            </div>
          </div>
          <div v-if="perm && editable" class="card-footer">
                <button class='btn btn-danger'><i class='fas fa-thumbs-down'></i></button>
          </div>
        </div>
        
 </div>
</div>
                 </div>
                 <div class="col-lg-4">
                    <div class="card my-4">
                      <h5 v-if="perm && editable" class="card-header"> : معلومات <a :href="inf.username + '/settings'" style="float:right;" class='btn btn-secondary'><i class='fas fa-edit'></i></a></h5>
          <h5 v-else class="card-header"> :  معلومات</h5>
          <div class="card-body">
              <p><strong>إيمايل : </strong><span>{{inf.email}}</span></p>
              <p><strong>هاتف : </strong><span>{{inf.phone}}</span></p>
              <p><strong>المنطقة : </strong><span>{{inf.name}}</span></p>
          </div>
        </div>
                 </div>
             </div>
         </div>
     </div>
    </div>
</template>
<script>
export default {
    props : ['info','ar','en','fr','donations','favorits','editable'],
    data(){
        return{
            path : '../../files_system/avatars/',
            logo : '../public/images/logo.png',
            path2 : '../../files_system/global/',
            perm : false

        }
    },
    methods : {
        async remove(inf)
        {
          const res1 = await this.callApi('POST','profile/removeDonationFromUser',inf)
          if(res1.status === 200)
          {
            
            if(res1.data == "yes")
            {
              var i =0;
          for (const donation of this.donations) {
               if(donation.id == inf.id)
               {
                 this.donations.splice(i,1)
               }
               i++;
          }
            }
          }
        },
        async unlike(fa)
        {
          const res2 = await this.callApi('POST','profile/dislike',fa)
          if(res2.status === 200)
          {
            if(res2.data === "yes")
            {
               var i = 0;
          for (const fav of this.favorits) {
              if(fa.id == fav.id)
              {
                this.favorits.splice(i,1)
              }
              i++;
          }
            }
          }
        }
    },
    async created(){
        const res = await this.callApi('GET','profile/checkAuth')
        if(res.status === 200)
        {
             if(res.data == "yes")
             {
               this.perm = true
             }else{
               this.perm = false
             }
        }
  }
}
</script>