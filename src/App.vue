<template>
  <Header/>
  <div class="left-panel">
    <InputBox label="Профессия:" v-model="profession"/>
    <InputBox label="Город:" v-model="city"/>
    <InputBox label="Ссылка на фото:" v-model="photo_url"/>
    <InputBox label="ФИО:" v-model="fio"/>
    <InputBox label="Номер телефона:" v-model="phone" regex="^\d{6,10}$" error_message="Неверный номер"/>
    <InputBox label="E-mail:" v-model="email"/>
    <InputBox label="День рождения:" v-model="birthday"/>
    <SelectBox label="Образование" :options="['Среднее','Среднее специальное','Неоконченное высшее','Высшее'] " v-model="education"/>
    <InputBox v-if="education != 'Среднее'" label="Учебное заведение:" v-model="school"/>
    <InputBox v-if="education != 'Среднее'" label="Факультет:" v-model="faculty"/>
    <InputBox v-if="education != 'Среднее'" label="Специализация:" v-model="specialization"/>
    <InputBox v-if="education != 'Среднее'" label="Год выпуска:" v-model="graduation"/>
    <InputBox label="Желаемый оклад:" v-model="salary"/>
    <InputBox label="Навыки:" v-model="skills"/>
    <InputBox label="О себе:" v-model="about"/>
  </div>

  <div class="right-panel">
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
      <p>Образование: {{education}}</p>
      <p v-if="education != 'Среднее'">Учебное заведение:{{school}}<br>
        Факультет:{{faculty}}<br>
        Специализация:{{specialization}}<br> 
        Год окончания:{{graduation}}<br>
      </p>
      <p>О себе:</p>
      <p>{{about}}</p>
      <p>Ключевые навыки:</p>
      <p>{{skills}}</p>
    </div>
  </div>
</template>

<script>
import Header from './components/Header.vue'
import InputBox from './components/InputBox.vue'
import SelectBox from './components/SelectBox.vue'

export default {
  name: 'App',
  components: {
    Header,
    InputBox,
    SelectBox
  },
  data() {
    return {
      profession:"Программист",
      city:"Липецк",
      photo_url:"https://i.pinimg.com/736x/22/71/48/22714827862d17e1a1a78bd344bfc5fc.jpg",
      fio:"Жидков Иван Александрович",
      phone:"9205108779",
      email:"test@gmail.com",
      birthday:"28.08.2001",
      education:"Среднее",
      school:"Очень хорошее",
      faculty:"Невероятный",
      specialization:"Хороший мальчик",
      graduation:"2023",
      salary:"50000",
      skills:"Очень много. Список огромный",
      about:"Невероятный красавчик",
    }
  }
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
.left-panel {
  padding: 5px;
  display: flex;
  flex-wrap: wrap;
  margin: 1%;
  background-color: rgb(51, 59, 79);
  width: 40%;
  float:left
}
.right-panel {
  padding: 5px;
  margin: 1%;
  background-color: rgb(51, 59, 79);
  width: 40%;
  float:left
}
</style>
