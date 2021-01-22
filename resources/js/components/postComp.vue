<template>
    <div style="margin-top:32px;" id="post">
         <div v-if="fr" class="container">

    <div v-for="pos in post" :key="pos.id" class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4" v-html="pos.title"></h1>

        <!-- Author -->
        <p class="lead">
          par
          <a :href="'profile/'+pos.username + '/'">{{pos.fullName}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Publier à {{pos.date}}</p>

        <hr>

        <p>Telephone  : {{pos.phone}}</p>

        <hr>

        <p v-if="pos.type_post == 0 && pos.name == 'autre'"><strong>Donateur de {{pos.name_donation}}</strong></p>
        <p v-if="pos.type_post == 0 && pos.name !== 'autre'"><strong>Donateur de {{pos.name}}</strong></p>
        <p v-if="pos.type_post == 1"><strong>Nécessiteux</strong></p>

        <hr>

        <!-- Preview Image -->
        <div v-if="pos.images.length !== 0">
          <div v-for="(im,index) in pos.images" :key="index" style='margin-top:10px;' class="col-md">
          <img v-if="im !== ''" class="img-fluid rounded" :src="path + im" :alt="title">
        </div>
           <hr>
        </div>

        <!-- Post Content -->
        <p class="lead" v-html="pos.description"></p>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Donations Similaires</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li v-for="(relate,index) in related" v-if="index < 3" :key="index">
                    <a :href="relate.title" v-html="relate.title" ></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li v-if="index >= 3" v-for="(relate,index) in related" :key="index">
                    <a :href="relate.title" v-html="relate.title"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
    <!-- /.row -->

  </div>

  <div v-if="en" class="container">

    <div v-for="pos in post" :key="pos.id" class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4" v-html="pos.title"></h1>

        <!-- Author -->
        <p class="lead">
          By
          <a :href="'profile/'+pos.username + '/'">{{pos.fullName}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Published at {{pos.date}}</p>

        <hr>

        <p>Phone  : {{pos.phone}}</p>

        <hr>

        <p v-if="pos.type_post == 0 && pos.name == 'autre'"><strong>giver of {{pos.name_donation}}</strong></p>
        <p v-if="pos.type_post == 0 && pos.name !== 'autre'"><strong>giver of {{pos.name}}</strong></p>
        <p v-if="pos.type_post == 1"><strong>Needy</strong></p>

        <hr>

        <!-- Preview Image -->
        <div v-if="pos.images.length !== 0">
          <div v-for="(im,index) in pos.images" :key="index" style='margin-top:10px;' class="col-md">
          <img v-if="im !== ''" class="img-fluid rounded" :src="path + im" :alt="title">
        </div>
           <hr>
        </div>

        <!-- Post Content -->
        <p class="lead" v-html="pos.description"></p>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Similar donations</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li v-for="(relate,index) in related" v-if="index < 3" :key="index">
                    <a :href="relate.title" v-html="relate.title"></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li v-if="index >= 3" v-for="(relate,index) in related" :key="index">
                    <a :href="relate.title" v-html="relate.title"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

       

      </div>

    </div>
    <!-- /.row -->

  </div>



  <div v-if="ar" class="container">

    <div v-for="pos in post" :key="pos.id" class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4" v-html="pos.title"></h1>

        <!-- Author -->
        <p class="lead">
          من طرف
          <a :href="'profile/'+pos.username + '/'">{{pos.fullName}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>تاريخ {{pos.date}}</p>

        <hr>

        <p>الهاتف  : {{pos.phone}}</p>

        <hr>

        <p v-if="pos.type_post == 0 && pos.name == 'autre'"><strong>متبرع ل {{pos.name_donation}}</strong></p>
        <p v-if="pos.type_post == 0 && pos.name !== 'autre'"><strong>متبرع ل {{pos.name}}</strong></p>
        <p v-if="pos.type_post == 1"><strong>محتاج</strong></p>

        <hr>

        <!-- Preview Image -->
        <div v-if="pos.images.length !== 0">
          <div v-for="(im,index) in pos.images" :key="index" style='margin-top:10px;' class="col-md">
          <img v-if="im !== ''" class="img-fluid rounded" :src="path + im" :alt="title">
        </div>
           <hr>
        </div>

        <!-- Post Content -->
        <p class="lead" v-html="pos.description"></p>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">تبرعات مماثلة</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li v-for="(relate,index) in related" v-if="index < 3" :key="index">
                    <a :href="relate.title" v-html="relate.title"></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li v-if="index >= 3" v-for="(relate,index) in related" :key="index">
                    <a :href="relate.title" v-html="relate.title"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
    <!-- /.row -->

  </div>
    </div>
</template>
<script>

export default {
    props : ['title','fr','en','ar'],
    data()
    {
        return{
            data : {
                title : this.title
            },
            post : [],
            path : '../files_system/global/',
            related : []
        }
    },
    async created()
    {
        const res = await this.callApi('POST','getPostByName',this.data)
        if(res.status === 200)
        {
          if(res.data == 'no')
          {
            location.href = 'index/';
          }

            this.post = res.data
            for (const pos of this.post) {
                if(pos.images !== "")
                {
                    let str = pos.images.split(';')
                    pos.images = str
                }
            }
        }
        let ap = new FormData();
        for (const pos of this.post) {
          ap.append('type_post',pos.type_post)
          ap.append('id_donation',pos.id_donation)
        }
        const res1 = await this.callApi('POST','getRelatedPosts',ap)
        if(res1.status === 200)
        {
            this.related = res1.data
        }

        for (const rel of this.related) {
           rel.title = rel.title.replace('<span style="float:right;">','')
           rel.title = rel.title.replace('</span>','')
        }
    }
}
</script>