<template>
    <div class="add_post">
      <div  v-if="fr" class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="title" style="font-weight:bold;">Titre</label>
            <input type="text"  v-model="data.title" name="title" id="title" class="form-control" placeholder="Titre"  required>
        </div>

        <div class="form-group">
            <textarea name="description" @keyup="toggle" v-model="data.description" cols="60" resize="none" style="resize: none;outline: none;border: none;" rows="10" id="description" placeholder="ècrire quelque chose !" required></textarea>
        </div>
        <div class="form-group">
            <select @change="checker1" v-model="data.typeD" class="custom-select" id="typeDonation">
    <option selected disabled>Type de Donation</option>
    <option value="0">Donateur</option>
    <option value="1">Nécessiteux</option>
  </select>
        </div>

        <div v-if="show1" class="form-group">
            <select class="custom-select" v-model="data.donation" @change="checker2" id="les donation">
    <option selected disabled>Donation possible</option>
    <option v-for="don in donations" :key="don.id" :value="don.name">{{don.name}}</option>
  </select>
        </div>

        <div v-if="show2" class="form-group">
            <label for="other">Autre</label>
            <input type="text" name="other" v-model="data.other" id="other" placeholder="Autre" class="form-control" required>
        </div>

        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Images</span>
  </div>
  <div class="custom-file">
    <input accept="image/png, image/jpeg, image/jpg" type="file" @change="handleImage" class="custom-file-input" id="images01" multiple>
    <label class="custom-file-label" for="images01">...</label>
  </div>
</div>
<label for="" style="font-weight:bold; color:red;">Sèlèctionner 4 image</label>
<div style="margin-top:10px;" v-for="t in tmp" :key="t" class="col-sm">
 <img style="width:100%;height:100%;" :src="t" alt="image">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" :disabled="bool" @click="addPost" class="btn btn-primary"> {{ !clicked ? "Ajouter" : "..." }} </button>
      </div>
    </div>
  </div>
</div>


<div  v-if="en" class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="title" style="font-weight:bold;">Title</label>
            <input type="text" v-model="data.title" name="title" id="title" class="form-control" placeholder="Title"  required>
        </div>

        <div class="form-group">
            <textarea name="description" @keyup="toggle" v-model="data.description" cols="60" resize="none" style="resize: none;outline: none;border: none;" rows="10" id="description" placeholder="write something !" required></textarea>
        </div>
        <div class="form-group">
            <select @change="checker1" v-model="data.typeD" class="custom-select" id="typeDonation">
    <option selected disabled>Type of donation</option>
    <option value="0">giver</option>
    <option value="1">Needy</option>
  </select>
        </div>

        <div v-if="show1" class="form-group">
            <select class="custom-select" v-model="data.donation" @change="checker2" id="les donation">
    <option selected disabled>Possible donation</option>
    <option v-for="don in donations" :key="don.id" :value="don.name">{{don.name}}</option>
  </select>
        </div>

        <div v-if="show2" class="form-group">
            <label for="other">Other</label>
            <input type="text" name="other" v-model="data.other" id="other" placeholder="other" class="form-control" required>
        </div>

        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Photos</span>
  </div>
  <div class="custom-file">
    <input accept="image/png, image/jpeg, image/jpg" type="file" @change="handleImage" class="custom-file-input" id="images01" multiple>
    <label class="custom-file-label" for="images01">...</label>
  </div>
</div>
<label for="" style="font-weight:bold; color:red;">Select 4 image</label>
<div style="margin-top:10px;" v-for="t in tmp" :key="t" class="col-sm">
 <img style="width:100%;height:100%;" :src="t" alt="image">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" :disabled="bool" @click="addPost" class="btn btn-primary"> {{ !clicked ? "Add" : "..." }} </button>
      </div>
    </div>
  </div>
</div>


<div  v-if="ar" class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تبرع</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="title" style="font-weight:bold;">عنوان</label>
            <input type="text" v-model="data.title" name="title" id="title" class="form-control" placeholder="عنوان"  required>
        </div>

        <div class="form-group">
            <textarea name="description" @keyup="toggle" v-model="data.description" cols="60" resize="none" style="resize: none;outline: none;border: none;" rows="10" id="description" placeholder="أكتب شيئا" required></textarea>
        </div>
        <div class="form-group">
            <select @change="checker1" v-model="data.typeD" class="custom-select" id="typeDonation">
    <option selected disabled>نوع التبرع</option>
    <option value="0">متبرع</option>
    <option value="1">محتاج</option>
  </select>
        </div>

        <div v-if="show1" class="form-group">
            <select class="custom-select" v-model="data.donation" @change="checker2" id="les donation">
    <option selected disabled>تبرعات</option>
    <option v-for="don in donations" :key="don.id" :value="don.name">{{don.name}}</option>
  </select>
        </div>

        <div v-if="show2" class="form-group">
            <label for="other">أخرى</label>
            <input type="text" name="other" v-model="data.other" id="other" placeholder="أخرى" class="form-control" required>
        </div>

        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">صور</span>
  </div>
  <div class="custom-file">
    <input accept="image/png, image/jpeg, image/jpg" type="file" @change="handleImage" class="custom-file-input" id="images01" multiple>
    <label class="custom-file-label" for="images01">...</label>
  </div>
</div>
<label for="" style="font-weight:bold; color:red;">إختر 4 صور</label>
<div style="margin-top:10px;" v-for="t in tmp" :key="t" class="col-sm">
 <img style="width:100%;height:100%;" :src="t" alt="image">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
        <button type="button" :disabled="bool" @click="addPost" class="btn btn-primary"> {{ !clicked ? "أضف" : "..." }} </button>
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
            donations : null,
            show1 : false,
            show2 : false,
            data : {
                title : "",
                description : "",
                typeD : null,
                donation : null,
                other : "",
                images : []
            },
            bool : true,
            clicked : false,
            tmp : []

        }
    },
    methods : {
           checker1()
           {
               if(this.data.typeD == 0)
               {
                   this.show1 = true
               }else{
                   this.show1 = false
               }
           },
           checker2()
           {
               if(this.data.donation == "autre")
               {
                   this.show2 = true 
               }else{
                   this.show2 = false
               }
           },
           toggle()
           {
               this.bool = false
           },
           async addPost()
           {
               var k = 0;
               this.bool = true
               this.clicked = true
               var push = new FormData();
                 push.append('title',this.data.title)
                 push.append('description',this.data.description)
                 push.append('type_post',this.data.typeD)    
            for (k = 0; k < this.data.images.length; k++) {
                push.append('image' + k,this.data.images[k])
            } 
                 push.append('donation',this.data.donation)
                 push.append('other',this.data.other)
                 push.append("count",k)
                 k = 0;

                 var res1 = await this.callApi('POST','addPost',push)
                 if(res1.status === 200)
                 {
                     if(res1.data == "nousername")
                     {
                         if(this.fr)
                         {
                             this.statu('ce titre est déjà utilisé','error')
                         }else if(this.en)
                         {
                             this.statu('this title is already used','error')
                         }else if(this.ar)
                         {
                             this.statu('تم إستخدام هذا العنوان من قبل','error')
                         }

                         setTimeout(() => {
                             this.bool = false
                            this.clicked = false
                         }, 2000);

                     }else if(res1.data == "yes")
                     {
                         if(this.fr)
                         {
                           this.statu('opération effectuée','success')
                         }else if(this.en)
                         {
                             this.statu('operation performed','success')
                         }else if(this.ar)
                         {
                             this.statu('أجريت العملية','success')
                         }
                         location.href =  this.data.title 

                         this.data.title  = "";this.data.description = "";this.data.typeD = null; this.data.donation = null;
                         this.data.images.splice(0,this.data.images.length)
                         this.tmp.splice(0,this.tmp.length)
                         setTimeout(() => {
                             this.bool = true
                            this.clicked = false
                         }, 2000);
                     }
                 }
            
           },
           handleImage(e)
           {
               if(e.target.files.length <= 4)
               {
                   if(this.tmp.length < 4)
                   {
                       for (let i = 0; i < e.target.files.length; i++) {
                  this.data.images.push(e.target.files[i])
                  var read = new FileReader();
                  read.onload = (f)=>{
                     this.tmp.push(f.target.result)
                  }
                  read.readAsDataURL(e.target.files[i])
              }
                   }else{
                      if(this.fr)
                   {
                        this.statu('le nombre maximum est de 4 photos','error')
                   }else if(this.en)
                   {
                       this.statu('the maximum number is 4 photos','error')
                   } else if(this.ar)
                   {
                       this.statu('الحد الأقصى هو 4 صور','error')
                   }
                   }
               }else{
                   if(this.fr)
                   {
                        this.statu('veuillez sélectionner 4 photos','error')
                   }else if(this.en)
                   {
                       this.statu('please select 4 photos','error')
                   }else if(this.ar)
                   {
                       this.statu('الرجاء تحديد 4 صور','error')
                   }
               }
           }

    },
    async created()
    {
        const res = await this.callApi('GET','donations')
        if(res.status === 200)
        {
              this.donations = res.data
        }
    }
}
</script>