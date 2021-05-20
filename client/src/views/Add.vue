<template>
  <v-container class="my-4">
    <FormResume
        @formSubmit="addResume($event)"
        :edit="false"
    />
    <v-alert
        :key="errors"
        v-if="errors"
        v-model="alert"
        border="left"
        close-text="Close Alert"
        color="deep-purple accent-4"
        dark
        dismissible
    >
      <div v-for="(errs, i) in errors" :key="i">
        <p v-for="(err, i) in errs" :key="i">
          {{err}}
        </p>
      </div>
    </v-alert>
  </v-container>

</template>

<script>
import axios from "@/axios";
import FormResume from "../components/FormResume";

export default {
  name: "Add",
  components: {
    FormResume
  },
  data() {
    return {
      errors: '',
    }
  },

  methods: {

    addResume(resume) {
      this.loading = true;
      axios.post('resume', resume).then(() => {
        alert('Resume has been saved')
      })
          .catch(error => {
            this.errors = error.response.data.errors
          })
    },
  }
}
</script>