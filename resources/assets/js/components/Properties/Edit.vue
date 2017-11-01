<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Property Information</div>
                    <div class="panel-body">
                        <div class="details">
                            <div class="form-group">
                                <label>Address 1</label>
                                <input v-model="propertyObj.address1" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Address 2</label>
                                <input v-model="propertyObj.address2" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input v-model="propertyObj.city" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <helper-states v-bind:selected="propertyObj.state" @update="changeState"></helper-states>
                            </div>

                            <div class="form-group">
                                <label>Zip</label>
                                <input v-model="propertyObj.zip" value="" class="form-control">
                            </div>

                        </div>
                        <div class="events">
                            <ul v-if="propertyObj.events">
                                <li v-for="event in propertyObj.events">
                                    {{ event.name }} | {{ event.pivot.date }} @ {{ event.pivot.time }}
                                </li>
                            </ul>
                        </div>
                        <button class="btn btn-default" @click="submitForm">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props: ['property'],
    data: function() {
      return {
        propertyObj: '',
      }
    },
    mounted() {
      this.propertyObj = this.getProperty;
    },
    computed: {
      getProperty()
      {
        var results = JSON.parse(this.property);
        return results;
      },
    },
    methods: {
      destroy: function(id) {
        console.log("destroy: " + id);
      },
      complete: function(id) {
        axios.post('properties/' + id + '/complete', { data: {} })
            .then(function(response) {
              if(response.data.success){
                console.log($(this));
              }
            })
            .catch(function(error) {
              console.log(error.message);
            });
      },
      submitForm: function() {
        var formData = this.propertyObj;
        axios.put('/properties/' + formData.id + '/', { data: formData})
            .then(function(response) {
              console.log(response);
              flash('Property Updated Successfully.','success');
            })
            .catch(function(error) {
              console.log(error.message);
              flash('Property Update Failed. Try again.','error');
            });
      },
      changeState (x) {
        this.propertyObj.state = x;
      }
    }
  }
</script>