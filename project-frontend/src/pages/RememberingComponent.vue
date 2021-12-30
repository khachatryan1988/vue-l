<template>
  <div>
    <b-container>
      <b-row>
        <b-col cols="6">
          <PartOneComponent @messagefromPartOne="calc"/>
        </b-col>
        <b-col cols="6">
          <PartTweComponent
            :result='result'
          />

        </b-col>

      </b-row>
    </b-container>
  </div>
</template>


<script>

import PartOneComponent from "../../../../../../Users/user/test-app/src/components/PartOneComponent";
import PartTweComponent from "../../../../../../Users/user/test-app/src/components/PartTweComponent";

export default {

  components: {
    PartOneComponent,
    PartTweComponent
  },
  data() {
    return {
      result: ''
    }
  },
  methods: {
    calc(arg) {
      return this.result = arg
    }

  }
}


</script>


<style scoped>
</style>
