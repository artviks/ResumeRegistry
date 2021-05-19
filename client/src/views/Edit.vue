<template>
  <v-container>
    <div v-if="loading">
      <h1>Loading</h1>
    </div>
    <div v-if="!loading">
      <FormResume
          @formSubmit="editResume($event)"
          :edit="true"
          :initial-resume="this.resume"
      />
    </div>
  </v-container>
</template>

<script>
  import axios from "@/axios";
  import FormResume from "../components/FormResume";

  export default {
    name: 'Edit',
    components: {
      FormResume
    },
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

      editResume(resume) {
        this.loading = true;
        axios.put('resume', resume).then(() => {
          this.loading = false;
        })
            .catch(console.error)
      },
    }
  }
</script>
