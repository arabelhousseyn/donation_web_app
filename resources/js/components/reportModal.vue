<template>
    <div class="report">
       <div v-if="fr" class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
        <div v-for="report in reports" :key="report.id" class="form-group">
            <label :for="report.name" style='font-weight:bold;'> {{ report.name }} </label>
            <input type="radio" class='form-control' :name="report.name" :id="report.name"   :value="report.id" v-model="data.type" required>
        </div>
        <div class="form-group">
           <textarea name="desc" @keyup="toggle" v-model="data.description" cols="60" resize="none" style="resize: none;outline: none;border: none;" rows="10" id="desc" placeholder="ècrire quelque chose !" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" :disabled="bool" @click="report" class="btn btn-danger">{{ !clicked ? "Signaler" : "..." }} </button>
      </div>
    </div>
  </div>
</div>

<div v-if="en" class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
        <div v-for="report in reports" :key="report.id" class="form-group">
            <label :for="report.name" style='font-weight:bold;'> {{ report.name }} </label>
            <input type="radio" class='form-control' :name="report.name" :id="report.name"   :value="report.id" v-model="data.type" required>
        </div>
        <div class="form-group">
           <textarea name="desc" @keyup="toggle" v-model="data.description" cols="60" resize="none" style="resize: none;outline: none;border: none;" rows="10" id="desc" placeholder="write something!" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" :disabled="bool" @click="report" class="btn btn-danger">{{ !clicked ? "Report" : "..." }} </button>
      </div>
    </div>
  </div>
</div>

<div v-if="ar" class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
        <div v-for="report in reports" :key="report.id" class="form-group">
            <label :for="report.name" style='font-weight:bold;'> {{ report.name }} </label>
            <input type="radio" class='form-control' :name="report.name" :id="report.name"   :value="report.id" v-model="data.type" required>
        </div>
        <div class="form-group">
           <textarea name="desc" @keyup="toggle" v-model="data.description" cols="60" resize="none" style="resize: none;outline: none;border: none;" rows="10" id="desc" placeholder="أكتب شيئا!" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
        <button type="button" :disabled="bool" @click="report" class="btn btn-danger">{{ !clicked ? "تبليغ" : "..." }} </button>
      </div>
    </div>
  </div>
</div>
    </div>
</template>

<script>
export default {
    props : ['ar','fr','en','id_post','reports'],
    data()
    {
        return{
            data : {
                type : null,
                description : "",
            },
            bool : true,
            clicked : false,
        }
    },
    methods : {
        async report()
        {
            this.bool = true
            this.clicked = true
            if(this.data.type !== null)
            {
                const up = await this.callApi('POST','addReport',this.data)
                if(up.status === 200)
                {
                   if(up.data == "yes")
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
                   }
                }

            }else{
                if(this.fr)
                {
                    this.statu('choisir','error')
                }else if(this.en)
                {
                    this.statu('select','error')
                }else if(this.ar)
                {
                    this.statu('إختر','error')
                }
            }

        },
        toggle()
        { 
       this.bool= false
        }
    },

}
</script>