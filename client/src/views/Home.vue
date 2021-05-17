<template>

  <v-container>
    <v-card v-for="resume in resumes" :key="resume.id"
            class="ma-2"
            elevation="4"
    >

      <v-card-title>
        {{ resume.person.name }}
      </v-card-title>
      <v-card-subtitle class="d-inline">
        Education
      </v-card-subtitle>
      <v-card-text v-for="education in resume.education" :key="education.id" class="d-inline">
        {{ education.school }}
      </v-card-text>

      <v-card-actions>
        <v-btn
            @click="$router.push(`edit/${resume.id}`)"
            elevation="2"
            color="primary"
        >
          Edit
        </v-btn>
        <v-btn
            elevation="2"
            color="secondary"
        >
          View
        </v-btn>
        <v-btn
            elevation="2"
            color="error"
        >
          Delete
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>

</template>

<script>
  import axios from "@/axios";

  export default {
    name: 'Home',
    data() {
      return {
        resumes: [],
        pagination: {},
      }
    },

    created() {
      this.fetchResumes('resumes')
    },

    methods: {

      fetchResumes(url) {
        axios.get(url).then(({data}) => {
          this.resumes = data.data;
          this.makePagination(data.meta, data.links);
        })
            .catch(err => console.log(err))
      },

      makePagination(meta, links) {
        const {current_page, last_page} = meta;
        const {prev, next} = links;
        this.pagination = {current_page, last_page, next, prev};
      },

    }
  }
</script>
