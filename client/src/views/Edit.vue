<template>
  <v-card-text>
    <v-form @submit.prevent="editResume">

      <p>Personal info</p>
      <v-container>

        <v-row>
          <v-col>
            <v-text-field label="Full name" v-model="resume.person.name"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Phone" v-model="resume.person.phone_number"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Email" v-model="resume.person.email"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Link" v-model="resume.person.links"></v-text-field>
          </v-col>
        </v-row>

      </v-container>

      <p>Education</p>
      <v-container v-for="education in resume.education" :key="education.id">

        <v-row>
          <v-col>
            <v-text-field label="School" v-model="education.school"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Faculty" v-model="education.faculty"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Field of study" v-model="education.field_of_study"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Degree" v-model="education.degree"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Start Year" v-model="education.start_year"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="End Year" v-model="education.end_year"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-textarea label="Description" v-model="education.description"></v-textarea>
          </v-col>
        </v-row>

      </v-container>

      <p>Work Experience</p>
      <v-container v-for="experience in resume.work_experience" :key="experience.title">

        <v-row>
          <v-col>
            <v-text-field label="Title" v-model="experience.title"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Company" v-model="experience.company"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Location" v-model="experience.location"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Employment schedule" v-model="experience.employment_schedule"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Start Date" v-model="experience.start_date"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="End Date" v-model="experience.end_date"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-textarea label="Description" v-model="experience.description"></v-textarea>
          </v-col>
        </v-row>

      </v-container>

      <p>Address</p>
      <v-container>

        <v-row>
          <v-col>
            <v-text-field label="Address" v-model="resume.address.address"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Country" v-model="resume.address.country"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Postal Code" v-model="resume.address.postal_code"></v-text-field>
          </v-col>
        </v-row>

      </v-container>
      <v-btn
          type="submit"
      >
        Save
      </v-btn>

    </v-form>
  </v-card-text>

</template>

<script>
  import axios from "@/axios";

  export default {
    name: 'Home',
    data() {
      return {
        resume: {}
      }
    },

    created() {
      this.fetchResume();
    },

    methods: {
      fetchResume() {
        axios.get(`resume/${this.$route.params.id}`).then(({data}) => {
          this.resume = data.data;
          console.log(this.resume)
        })
            .catch(console.error)
      },
      editResume() {
        axios.put('resume', this.resume).then().catch(console.error)
      }
    }
  }
</script>
