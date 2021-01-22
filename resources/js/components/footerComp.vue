<template>
    <footer class="main">
      <div v-if="fr" class="container">
        <div class="row">
          <div class="col-lg-4">
        
          </div>
          <div class="col-lg-4">
            <span id="copy">
          Tous les droits sont réservés <span id="year"></span> <a href="#" id="na"> Elhousseyn arab</a>
        </span>
          </div>
          <div class="col-lg-4">
            
          </div>
        </div>
      </div>

      <div v-if="en" class="container">
        <div class="row">
          <div class="col-lg-4">
           
          </div>
          <div class="col-lg-4">
            <span id="copy">
          All rights reserved <span id="year"></span> <a href="#" id="na"> Elhousseyn arab</a>
        </span>
          </div>
          <div class="col-lg-4">
            
          </div>
        </div>
      </div>

      <div v-if="ar" class="container">
        <div class="row">
          <div class="col-lg-4">
           
          </div>
          <div class="col-lg-4">
            <span id="copy">
          كل الحقوق محفوظة <span id="year"></span> <a href="#" id="na"> Elhousseyn arab</a>
        </span>
          </div>
          <div class="col-lg-4">
            
          </div>
        </div>
      </div>
     </footer>
</template>

<script>
export default {
  props : ['ar','fr','en'],
}
</script>

<style scoped>
 .list,a{
   color:white;
   text-decoration:none;
 }
 .lisr,a:hover{
   color : #e7e7e7;
 }
</style>