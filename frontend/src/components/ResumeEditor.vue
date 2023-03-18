<template>
  <div class="left-panel">
    <div class="about-panel">
      <InputBox label="Профессия:" v-model="profession"/>
      <ComboBox label="Город:" :options="city_hints" v-model="city"/>
      <InputBox label="Ссылка на фото:" v-model="photo_url"/>
      <InputBox label="ФИО:" v-model="fio"/>
      <InputBox label="Номер телефона:" v-model="phone" regex="^\d{6,10}$" error_message="Неверный номер"/>
      <InputBox label="E-mail:" v-model="email"/>
      <InputBox label="День рождения:" v-model="birthday"/>
      <InputBox label="Желаемый оклад:" v-model="salary"/>
      <InputBox label="Навыки:" v-model="skills"/>
      <InputBox label="О себе:" v-model="about"/>
    </div>
    
    <div class="education-panel" v-for="(value, index) in educations" v-bind:key="index">
      <SelectBox :label="'Образование ' + (index + 1)" :options="['Среднее','Среднее специальное','Неоконченное высшее','Высшее'] " v-model="educations[index]['education']"/>
      <ComboBox v-if="educations[index]['education'] != 'Среднее'" label="Учебное заведение:" v-model="educations[index]['school']" :options="univerity_hints"/>
      <InputBox v-if="educations[index]['education'] != 'Среднее'" label="Факультет:" v-model="educations[index]['faculty']"/>
      <InputBox v-if="educations[index]['education'] != 'Среднее'" label="Специализация:" v-model="educations[index]['specialization']"/>
      <InputBox v-if="educations[index]['education'] != 'Среднее'" label="Год выпуска:" v-model="educations[index]['graduation']"/>

    </div>
    <br>
    <Button text="Добавить Образование" v-on:click='educations.push( {education:"Среднее",school:"",faculty:"",specialization:"",graduation:""} )'></button>
    <Button text="Удалить Образование" v-on:click='educations.pop()'></button>
    <br><br>
    <Button text="Применить" v-on:click="dataChanged()"></button>
    
  </div>
    


  <div class="preview-panel">
    <img :src="photo_url" width=300 height=300 />
    <h2>{{fio}}</h2>
    <p>Родился {{birthday}}</p>
    {{phone}}<br>
    <b>{{email}}</b>
    <p>
      Проживаю в {{city}}
    </p>
    <h3>{{profession}}</h3>
    <div align="justify">
      <p>Желаемый оклад: {{salary}} ₽</p>
      <div v-for="(value, index) in educations" v-bind:key="index">
        Образование: {{educations[index]['education']}}
        <p v-if="educations[index]['education'] != 'Среднее'">
          Учебное заведение:{{educations[index]['school']}}<br>
          Факультет:{{educations[index]['faculty']}}<br>
          Специализация:{{educations[index]['specialization']}}<br> 
          Год окончания:{{educations[index]['graduation']}}<br>
        </p>
      </div>

      <p>О себе:</p>
      <p>{{about}}</p>
      <p>Ключевые навыки:</p>
      <p>{{skills}}</p>
    </div>
  </div>
</template>

<script>
import InputBox from './InputBox.vue'
import SelectBox from './SelectBox.vue'
import ComboBox from './ComboBox.vue'
import Button from './RegularButton.vue'
const axios = require('axios');

export default {
  name: 'App',
  components: {
    InputBox,
    SelectBox,
    ComboBox,
    Button
  },
  data() {
    return {
      profession:"Программист",
      city:"Липецк",
      city_hints: [],
      photo_url:"https://i.pinimg.com/736x/22/71/48/22714827862d17e1a1a78bd344bfc5fc.jpg",
      fio:"Жидков Иван Александрович",
      phone:"9205108779",
      email:"test@gmail.com",
      birthday:"28.08.2001",
      salary:"50000",
      skills:"Очень много. Список огромный",
      about:"Невероятный красавчик",
      educations: [
      {
        education:"Высшее",
        school:"Очень хорошее",
        faculty:"Невероятный",
        specialization:"Хороший мальчик",
        graduation:"2023",
      }],
      univerity_hints: [],
    }
  },
  methods : {
    dataChanged() {
      let new_data = {
        profession: this.profession,
        city: this.city,
        photo_url: this.photo_url,
        fio: this.fio,
        phone: this.phone,
        email: this.email,
        birthday: this.birthday,
        salary: this.salary,
        skills: this.skills,
        about: this.about,
        educations: this.educations
      }
      this.$emit("dataChanged", new_data)
    }
  },
  watch: {
    city(val) {
      axios
      .get("http://localhost/vue/backend/get_cities.php", { 
        params: { 
          search: val,
        } })
      .then(response => {this.city_hints = response["data"] })
    },
    educations: {
      handler(val) {
        if (val.length == 0) {
          return
        }
        axios
        .get("http://localhost/vue/backend/get_universities.php", { 
          params: { 
            city: this.city,
            search: val[val.length-1]["school"],
          } })
        .then(response => {this.univerity_hints = response["data"] })
      }, 
      deep:true
    }
  },
  emits: ["dataChanged"]
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: rgb(204, 206, 211);
}
.about-panel {
  display: flex;
  flex-wrap: wrap;
}
.left-panel {
  padding: 5px;
  float: left;
  margin: 1%;
  width: 47%;
  background-color: rgb(51, 59, 79);
}
.education-panel {
  display: flex;
  flex-wrap: wrap;
}
.preview-panel {
  padding: 5px;
  margin: 1%;
  background-color: rgb(51, 59, 79);
  width: 47%;
  float:right
}
</style>
