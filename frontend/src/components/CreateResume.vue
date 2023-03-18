<template>
  <ResumeEditor v-on:dataChanged="createResume"></ResumeEditor>

</template>

<script>
  import ResumeEditor from './ResumeEditor.vue'
  const axios = require('axios');

  export default {
    name: 'CreateResume',
    components: {
      ResumeEditor,
    },
    data() {
      return {
      }
    },
    methods: {
      array_to_sql_array(array) {
        let result = "{"
        for (var i = 0; i < array.length; i++) {
          if (i == array.length - 1) {
            result += array[i]
          }
          else {
            result += array[i] + ","
          }
        }
        result += "}"
        return result
      },

      createResume(data) {
        let educations = []
        let schools = []
        let faculties = []
        let specialisations = []
        let graduations = []

        for (var i = 0; i < data.educations.length; i++) {
          educations.push(data.educations[i].education )
          schools.push(data.educations[i].school)
          faculties.push(data.educations[i].faculty)
          specialisations.push(data.educations[i].specialization)
          graduations.push(data.educations[i].graduation)
        }

        const options = {
          method: 'POST',
          url: 'http://localhost/vue/backend/api/cv/add',
          params: {
            prof: data.profession,
            city: data.city,
            name: data.fio,
            phon: data.phone,
            mail: data.email,
            birt: data.birthday,
            pay: data.salary,
            skills: data.skills,
            about: data.about,
            educ: this.array_to_sql_array(educations),
            school: this.array_to_sql_array(schools),
            fac: this.array_to_sql_array(faculties),
            spec: this.array_to_sql_array(specialisations),
            grad: this.array_to_sql_array(graduations),
            photo: data.photo_url,
          }
        };

        axios.request(options).then(function (response) {
          console.log(response.data);
        }).catch(function (error) {
          console.error(error);
        });
      }
    }
  }

</script>