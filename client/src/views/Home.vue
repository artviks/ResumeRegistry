<template>

  <v-container>
    <div class="text-center">
      <v-btn
          plain
          @click="fetchResumes(pagination.prev)"
          :disabled="!pagination.prev"
      >
        Prev
      </v-btn>
      <v-btn
          plain
          @click="fetchResumes(pagination.next)"
          :disabled="!pagination.next"
      >
        Next
      </v-btn>
    </div>
    <v-card flat tile v-for="resume in resumes" :key="resume.id" class="ma-5">
      <v-layout row wrap class="pa-4">
        <v-flex xs6 md3 class="pl-2">
          <div class="overline">Person</div>
          <div class="body-2">{{ resume.person.name }}</div>
        </v-flex>
        <v-flex xs6 md3>
          <div class="overline">Education</div>
          <div class="body-2" v-if="resume.education.length !== 0">{{ resume.education[resume.education.length - 1].school }}</div>
        </v-flex>
        <v-flex xs6 md3>
          <div class="overline">Work Experience</div>
          <div class="body-2" v-if="resume.work_experience.length !== 0">{{ resume.work_experience[resume.work_experience.length - 1].title }}</div>
        </v-flex>
        <v-flex xs6 md3 class="d-flex align-self-center justify-space-around">
          <v-btn
              plain
              small
              @click="$router.push(`edit/${resume.id}`)"
              color="light-green darken-2"
          >
            Edit
          </v-btn>
          <v-btn
              plain
              small
              @click="$router.push(`view/${resume.id}`)"
              color="grey"
          >
            View
          </v-btn>
          <v-btn
              plain
              small
              @click="deleteResume(resume.id)"
              color="deep-orange"
          >
            Delete
          </v-btn>
        </v-flex>
      </v-layout>
    </v-card>
  </v-container>

</template>

<script>
  import axios from "@/axios";

  export default {
    name: 'Home',
    data() {
      return {
        firstPage: 'resumes',
        resumes: [],
        pagination: {}
      }
    },

    created() {
      this.fetchResumes()
    },

    methods: {

      fetchResumes(url = this.firstPage) {
        axios.get(url).then(({data}) => {
          this.resumes = data.data;
          this.makePagination(data.links);
        })
            .catch(console.error)
      },

      makePagination(links) {
        const {prev, next} = links;
        this.pagination = {next, prev};
      },

      deleteResume(id) {
        if (confirm('Are You Sure?')) {
          axios.delete(`resume/${id}`).then(() => {
            this.fetchResumes()
          })
              .catch(console.error)
        }
      },

    }

  }
</script>
