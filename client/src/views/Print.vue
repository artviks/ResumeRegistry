<template>
  <v-card v-if="!loading" flat max-width="60rem" class="mx-auto pa-10 my-5">

    <v-card-title class="text-h4 font-weight-bold pb-0">{{ resume.person.name }}</v-card-title>
    <p class="pt-0 ml-4">{{ resume.address.country }}</p>
    <v-card flat class="mx-4">
      <v-row class="ma-0 pa-0">
        <v-col>
          <p><v-icon class="px-2">mdi-email</v-icon>{{ resume.person.email }}</p>
        </v-col>
        <v-col>
          <p><v-icon class="px-2">mdi-phone</v-icon>{{resume.person.phone_number}}</p>
        </v-col>
      </v-row>
      <v-row class="ma-0 pa-0">
        <v-col>
          <p><v-icon class="px-2">mdi-linkedin</v-icon>{{resume.person.links}}</p>
        </v-col>
      </v-row>
    </v-card>

    <v-card-title class="text-h5 font-weight-bold">Experience</v-card-title>
    <v-card
        flat class="mx-4"
        v-for="experience in resume.work_experience"
        :key="experience.title"
    >

      <v-card-text>
        <div class="text--primary font-weight-bold text-h6">{{ experience.title }}</div>
        <div class="overline text--primary">{{ experience.company }}</div>
        <div>{{ experience.start_date.substring(0,7) }} - {{ experience.end_date.substring(0,7) }}</div>
        <div>{{experience.description}}</div>
      </v-card-text>
    </v-card>

    <v-card-title class="text-h5 font-weight-bold">Education</v-card-title>
    <v-card
        flat class="mx-4"
        v-for="education in resume.education"
        :key="education.id"
    >

      <v-card-text>
        <div class="text--primary font-weight-bold text-h6">{{ education.school }} - {{ education.degree }}</div>
        <div class="overline text--primary">{{ education.field_of_study }}</div>
        <div>{{ education.start_year }} - {{ education.end_year }}</div>
        <div>{{ education.description}}</div>
      </v-card-text>
    </v-card>

  </v-card>
</template>

<script>
import axios from "@/axios";

export default {
  name: "ResumeView",
  data() {
    return {
      resume: {},
      loading: false
    }
  },

  created() {
    this.fetchResume();
  },

  methods: {

    fetchResume() {
      this.loading = true;
      axios.get(`resume/${this.$route.params.id}`).then(({data}) => {
        this.resume = data.data;
        this.loading = false;
      })
          .catch(console.error)
    },
  }
}
</script>