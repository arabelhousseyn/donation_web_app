<template>
<div  class="parent">
<div  class="mnn">
        <div  class="main">
      <div v-if="fr"  class="container">
      </div>

      <div v-if="en"  class="container">
        
      </div>

      <div v-if="ar"  class="container">
        
      </div>
    </div>
    
    <!-- end of search box information -->
     
    <!-- start last content -->

    <div class="main">
      <div class="container">
        <div v-for="post in posts" :key="post.id" style="margin-bottom: 20px;" class="card-group">
          <div  style="margin-right:10px;" class="card">
            <div @click="redirect(post.title)" style='cursor:pointer;' class="card-body">
              <h5 class="card-title" v-html="post.title"></h5>
              <br>
              <p class="card-text" v-html="post.description"></p>
              <p class="card-text"><small class="text-muted"><a ><i class="fas fa-calendar-check"></i> {{post.date}}</a> </small></p>
            </div>
            <div v-if="post.images !== ''" class="found">
               <img class="card-img-top"  :src="path + post.images" style="width: 100%;" alt="Card image cap">
            </div>
            <div class="card-footer">
              <div v-if="!perm" class="con">
                <button class="all" type="button" data-toggle="modal" data-target="#login"><span class="font"><i class="fa fa-heart"></i></span></button>
                <button class="all" type="button" data-toggle="modal" data-target="#login"><span class="font"><i class="fa fa-exclamation-circle"></i></span></button>
              </div>
              <div v-if="perm" class="con">
                <button @click="favorits(post.id)" class="all"><span class="font"><i class="fa fa-heart"></i></span></button>
                <button @click="reportHnalde(post.id)" type="button" data-toggle="modal" data-target="#report" class="all"><span class="font"><i class="fa fa-exclamation-circle"></i></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- end last content -->

    <!-- start loading section -->
    <div class="main">
      <div class="container">

        <div class="loading"  style="border:none;">
          <infinite-loading @infinite="infiniteHandler">
            <div slot="no-more">
              <button class='btn btn-primary' @click="reload"><i class='fas fa-redo'></i></button>
            </div>
            <div slot="no-results"><button class='btn btn-primary' @click="reload"><i class='fas fa-redo'></i></button></div>
          </infinite-loading>
        </div>
      </div>
    </div>
    </div>
    <login-modal :ar="ar" :fr="fr" :en="en" />
    <report-modal :ar="ar" :fr="fr" :en="en" :reports="reports" />
</div>
</template>


<script>

import axios from 'axios';
import loginModal from './loginModal.vue'
import ReportModal from './reportModal.vue'

export default {
  props : ['ar','en','fr'],
  data() {
    return {
      init : "",
      perm : false,
      posts : [],
      page : 1,
      path : '../files_system/global/',
      data : {
        id : null
      },
      reports : []
    };
  },
  components : {
    loginModal,
    ReportModal
  },
  methods: {
    infiniteHandler($state) {
      axios.get('getAllPosts', {
        params: {
          page: this.page,
        },
      }).then(({ data }) => {
        if (data.data.length) {
          this.page += 1;
          this.posts.push(...data.data);
          $state.loaded();

          for (const post of this.posts) {
            if(post.images !== "")
            {
              let str = post.images.split(';')
            post.images = str[0]
            }
          }

        } else {
          $state.complete();
        }
      });
    },
    reload()
    {
       location.reload();
    },
    async favorits(id)
    {
      this.data.id  = id
      const fav = await this.callApi('POST','likePost',this.data) 
      if(fav.status ===200)
      {
        if(fav.data == "yes")
        {
          if(this.fr)
          {
            this.statu('j\'aime','success')
          }else if(this.en)
          {
            this.statu('like','success')
          }else if(this.ar)
          {
            this.statu('إعجاب','success')
          }
        }
      }
    },
    async reportHnalde(id)
    {
      this.data.id = id
        const session = await this.callApi('POST','postSession',this.data)
    },
    redirect(title)
    {
      title = title.replace('<span style="float:right;">','')
      title = title.replace('</span>','')
      location.href =  title;
    }
  },
  async created()
  {
    const res = await this.callApi('GET','checkAuth')
    if(res.status === 200)
    {
        if(res.data == "no")
      {
        this.perm = false
      }else if(res.data == "yes"){
        this.perm = true
      }
    }
     const res1 = await this.callApi('GET','allReports')
       if(res1.status === 200)
       {
           this.reports = res1.data
       }
  },
};
</script>