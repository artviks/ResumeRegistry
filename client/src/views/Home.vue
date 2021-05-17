<template>
  <v-card-text>
    <v-form>

      <v-container>

        <p>Personal info</p>
        <v-row>
          <v-col>
            <v-text-field label="Full name" v-model="person.name"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Phone" v-model="person.phone"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Email" v-model="person.email"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Link" v-model="person.links"></v-text-field>
          </v-col>
        </v-row>

      </v-container>

      <v-container>

        <p>Education</p>
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
            <v-text-field label="Field of study" v-model="education.field"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Degree" v-model="education.degree"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Start Year" v-model="education.startYear"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="End Year" v-model="education.endYear"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-textarea label="Description" v-model="education.description"></v-textarea>
          </v-col>
        </v-row>

      </v-container>

      <v-container>

        <p>Work Experience</p>
        <v-row>
          <v-col>
            <v-text-field label="Title" v-model="workExperience.title"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Company" v-model="workExperience.company"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Location" v-model="workExperience.location"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Employment schedule" v-model="workExperience.employmentSchedule"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Start Date" v-model="workExperience.startDate"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="End Date" v-model="workExperience.endDate"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-textarea label="Description" v-model="workExperience.description"></v-textarea>
          </v-col>
        </v-row>

      </v-container>

      <v-container>

        <p>Address</p>
        <v-row>
          <v-col>
            <v-text-field label="Address" v-model="address.address"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field label="Country" v-model="address.country"></v-text-field>
          </v-col>
          <v-col>
            <v-text-field label="Postal Code" v-model="address.postalCode"></v-text-field>
          </v-col>
        </v-row>

      </v-container>

    </v-form>
  </v-card-text>

</template>

<script>
  export default {
    name: 'Home',
    data() {
      return {
        resume: {},
        person: {},
        education: {},
        workExperience: {},
        address: {}
      }
    },

    methods: {
      getResume() {
        this.resume.person = this.person;
        this.resume.education = this.education;
        this.resume.workExperience = this.workExperience;
        this.resume.address = this.address;

        return this.resume;
      }
    }
  }
</script>
