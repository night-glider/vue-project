<template>
  <div class="table">
    <span class="column">Новый ({{news.length}})</span>
    <span class="column">Назначено<br>собеседование ({{interview.length}})</span>
    <span class="column">Принят ({{acccepted.length}})</span>
    <span class="column">Отказ ({{rejected.length}})</span>
  </div>
  <div class="table">
      <draggable 
      class="column"
      :list="news"
      item-key="name" 
      group="people" 
      @start="drag=true" 
      @end="drag=false">
      <template #item="{element}">
        <DragCard 
          :name="element.name"
          :photo_url="element.photo"
          :profession="element.profession"
          :age="element.age"
          :id="element.id">
        </DragCard>
      </template>
      </draggable>
    

      <draggable
        class="column"
        :list="interview"
        item-key="name" 
        group="people" 
        @start="drag=true" 
        @end="drag=false">
        <template #item="{element}">
          <DragCard 
            :name="element.name"
            :photo_url="element.photo"
            :profession="element.profession"
            :age="element.age"
            :id="element.id">
          </DragCard>
        </template>
      </draggable>

      <draggable
        class="column"
        :list="acccepted"
        item-key="name" 
        group="people" 
        @start="drag=true" 
        @end="drag=false">
        <template #item="{element}">
          <DragCard 
            :name="element.name"
            :photo_url="element.photo"
            :profession="element.profession"
            :age="element.age"
            :id="element.id">
          </DragCard>
        </template>
      </draggable>

      <draggable
        class="column"
        :list="rejected"
        item-key="name" 
        group="people" 
        @start="drag=true" 
        @end="drag=false">
        <template #item="{element}">
          <DragCard 
            :name="element.name"
            :photo_url="element.photo"
            :profession="element.profession"
            :age="element.age"
            :id="element.id">
          </DragCard>
        </template>
      </draggable>
  </div>
  
</template>

<script>
  import draggable from 'vuedraggable'
  import DragCard from './DragCard.vue'
  const axios = require('axios');

  export default {
    components: {
      draggable,
      DragCard
    },
    data() {
      return {
        drag: false,
        news: [],
        interview: [],
        acccepted: [],
        rejected: [],
      }
    },
    methods: {
      update_tables() {
        const options = {
          method: 'GET',
          url: 'http://localhost/vue/backend/api/cv',
        };
        var self = this;

        axios.request(options).then(function (response) {
          console.log(response.data);
          for(var i = 0; i < response.data.length; i+=1) {
            var new_card_data = {
              id: response.data[i].id,
              name: response.data[i].name,
              profession: response.data[i].profession,
              photo: response.data[i].photo_url,
              age: response.data[i].birthday
            }
            //self.news.push({name:"test"})
            if(response.data[i].status == "новый") {
              self.news.push(new_card_data)
            }
            if(response.data[i].status == "собес") {
              self.interview.push(new_card_data)
            }
            if(response.data[i].status == "принят") {
              self.acccepted.push(new_card_data)
            }
            if(response.data[i].status == "отказ") {
              self.rejected.push(new_card_data)
            }
            
          }


        }).catch(function (error) {
          console.error(error);
        });
      },

      change_status(summary_id, new_status) {
        const options = {
          method: 'POST',
          url: 'http://localhost/vue/backend/api/cv/status/update',
          params: {
            id: summary_id,
            status: new_status,
          }
        };

        axios.request(options).then(function (response) {
          console.log(response.data);
        }).catch(function (error) {
          console.error(error);
        });
      }
    },
    created() {
      this.update_tables()
    },
    watch: {
      news: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, "новый")
          }
        },
        deep:true
      },
      interview: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, "собес")
          }
        },
        deep:true
      },
      acccepted: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, "принят")
          }
        },
        deep:true
      },
      rejected: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, "отказ")
          }
        },
        deep:true
      },
    }
  }

</script>

<style scoped>
  .table {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding: 10px;
  }

  .column {
    float: left;
    min-width: 22%;
    border-style: solid;
  }
</style>