<template>
  <ResumeEditor ref="editor" v-on:dataChanged="UpdateResume"></ResumeEditor>

</template>

<script>
  import ResumeEditor from './ResumeEditor.vue'
  const axios = require('axios');

  export default {
    name: 'EditResume',
    components: {
      ResumeEditor,
    },
    data() {
      return {

      }
    },
    methods: {
      sql_array_to_array(str) {
        str = str.replace("{", "");
        str = str.replace("}", "");
        str = str.replace("\\", "");
        str = str.replace('"', "");
        return str.split(',')    
      },
      array_to_sql_array(array) {
        let result = "{"
        for (var i = 0; i < array.length; i++) {
          if (i == array.length - 1) {
            result += array[i]
          }
          else {
            result +=  array[i] + ","
          }
        }
        result += "}"
        return result
      },

      FetchResume() {
        console.log( this.array_to_sql_array( ["1", "2"] ) )
        const options = {
          method: 'GET',
          url: 'http://localhost/vue/backend/api/cv',
          params: {
            id: this.$route.query.id,
          }
        };

        //this.$refs.editor.profession = "test"
        var self = this

        axios.request(options).then(function (response) {
          console.log(response.data[0])
          var educations = self.sql_array_to_array(response.data[0].education)
          var schools = self.sql_array_to_array(response.data[0].school)
          var faculties = self.sql_array_to_array(response.data[0].faculty)
          var specialisations = self.sql_array_to_array(response.data[0].spec)
          var graduations = self.sql_array_to_array(response.data[0].graduation_year)
          
          self.$refs.editor.educations = []
          for(var i = 0; i < educations.length; i++) {
            self.$refs.editor.educations.push( {
              education: educations[i],
              school: schools[i],
              faculty: faculties[i],
              specialization: specialisations[i],
              graduation: graduations[i],
            })
          }

          self.$refs.editor.profession = response.data[0].profession
          self.$refs.editor.city=response.data[0].city
          self.$refs.editor.photo_url=response.data[0].photo_url
          self.$refs.editor.fio=response.data[0].name
          self.$refs.editor.phone=response.data[0].phone
          self.$refs.editor.email=response.data[0].email
          self.$refs.editor.birthday=response.data[0].birthday
          self.$refs.editor.salary=response.data[0].payment
          self.$refs.editor.skills=response.data[0].skills
          self.$refs.editor.about=response.data[0].about


        }).catch(function (error) {
          console.error(error);
        });
      },

      UpdateResume(data) {
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
          url: 'http://localhost/vue/backend/api/cv/edit',
          params: {
            id: this.$route.query.id,
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

    },
    created() {
      this.FetchResume()
    },
  }

</script>