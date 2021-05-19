<template>
  <v-container class="my-4">
    <FormResume
        @formSubmit="addResume($event)"
        :edit="false"
    />
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

  methods: {

    addResume(resume) {
      this.loading = true;
      axios.post('resume', resume).then(() => {
        this.loading = false;
      })
          .catch(console.error)
    },
  }
}
</script>