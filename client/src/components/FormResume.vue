<template>

    <v-form @submit.prevent="$emit('formSubmit', resume)">

      <v-card flat max-width="60rem" class="mx-auto grey lighten-2">
        <div class="text-h6 pl-5">Personal info</div>
        <v-card  flat tile class="ma-5 pa-5">
          <v-text-field label="Full name" :rules="rules" v-model="resume.person.name"></v-text-field>
          <v-text-field label="Phone" :rules="rules" v-model="resume.person.phone_number"></v-text-field>
          <v-text-field label="Email" :rules="rules" v-model="resume.person.email"></v-text-field>
          <v-text-field label="Link" v-model="resume.person.links"></v-text-field>
        </v-card>
      </v-card>

      <v-card flat max-width="60rem" class="mx-auto grey lighten-2">
        <v-layout row class="ma-0">
          <span class="text-h6 pl-5">Education</span>
          <v-spacer></v-spacer>
          <v-btn
              icon
              color="green"
              class="mx-5"
              @click="addEducation()"
          >
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </v-layout>
        <v-card
            v-for="(education, index) in resume.education"
            :key="education.id"
            flat tile class="ma-5 pa-5"
        >
          <div class="text-right">
            <v-btn
                icon
                color="error"
                @click="removeEducation(index)"
            >
              <v-icon>mdi-text-box-remove-outline</v-icon>
            </v-btn>
          </div>
          <v-text-field label="School" :rules="rules" v-model="education.school"></v-text-field>
          <v-text-field label="Faculty" v-model="education.faculty"></v-text-field>
          <v-text-field label="Field of study" :rules="rules" v-model="education.field_of_study"></v-text-field>
          <v-text-field label="Degree" :rules="rules" v-model="education.degree"></v-text-field>
          <v-row>
            <v-col>
              <v-text-field label="Start Year" :rules="rules" v-model="education.start_year"></v-text-field>
            </v-col>
            <v-col>
              <v-text-field label="End Year" v-model="education.end_year"></v-text-field>
            </v-col>
          </v-row>
          <v-textarea label="Description" v-model="education.description"></v-textarea>
        </v-card>
      </v-card>

      <v-card flat max-width="60rem" class="mx-auto grey lighten-2">
        <v-layout row class="ma-0">
          <span class="text-h6 pl-5">Experience</span>
          <v-spacer></v-spacer>
          <v-btn
              icon
              color="green"
              class="mx-5"
              @click="addExperience()"
          >
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </v-layout>
        <v-card
            v-for="(experience, index) in resume.work_experience"
            :key="experience.title"
            flat tile class="ma-5 pa-5"
        >
          <div class="text-right">
            <v-btn
                icon
                color="error"
                @click="removeExperience(index)"
            >
              <v-icon>mdi-text-box-remove-outline</v-icon>
            </v-btn>
          </div>
          <v-text-field label="Title" v-model="experience.title"></v-text-field>
          <v-text-field label="Company" v-model="experience.company"></v-text-field>
          <v-text-field label="Location" v-model="experience.location"></v-text-field>
          <v-text-field label="Employment schedule" v-model="experience.employment_schedule"></v-text-field>
          <v-row>
            <v-col>
              <v-text-field label="Start Date" v-model="experience.start_date"></v-text-field>
            </v-col>
            <v-col>
              <v-text-field label="End Date" v-model="experience.end_date"></v-text-field>
            </v-col>
          </v-row>
          <v-textarea label="Description" v-model="experience.description"></v-textarea>
        </v-card>
      </v-card>

      <v-card flat max-width="60rem" class="mx-auto grey lighten-2">
        <div class="text-h6 pl-5">Address</div>
        <v-card  flat tile class="ma-5 pa-5">
          <v-text-field label="Address" :rules="rules" v-model="resume.address.address"></v-text-field>
          <v-text-field label="Country" :rules="rules" v-model="resume.address.country"></v-text-field>
          <v-text-field label="Postal Code" :rules="rules" v-model="resume.address.postal_code"></v-text-field>
        </v-card>
        <div class="text-right">
          <v-btn color="primary" class="mr-5" type="submit">Save</v-btn>
        </div>
      </v-card>
    </v-form>

</template>

<script>
export default {

  name: "FormResume",

  props: {
    edit: Boolean,
    initialResume: Object
  },

  data() {
    return {
      resume: {},
      rules: [
        value => !!value || 'Required.'
      ]
    }
  },

  created() {
    this.setResume();
  },

  methods: {
    setResume() {
      if (this.edit) {
        this.resume = this.initialResume
        return
      }

      this.resume = {
        person: {},
        education: [{}],
        work_experience: [{}],
        address: {}
      }
    },
    removeEducation(index) {
      this.resume.education.splice(index, 1);
    },
    addEducation() {
      this.resume.education.push({});
    },
    removeExperience(index) {
      this.resume.work_experience.splice(index, 1);
    },
    addExperience() {
      this.resume.work_experience.push({});
    }
  }
}
</script>

<style scoped>

</style>