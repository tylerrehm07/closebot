<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Property Information
                        <div class="pull-right">
                            <span class="fa-stack fa-2x">
                              <i class="fa fa-calendar-o fa-stack-2x"></i>
                              <strong class="fa-stack-1x calendar-text">{{ completionDay }}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="details">
                            <span>{{ propertyObj.address1 }}</span>
                            <span>{{ propertyObj.city }}</span>
                            <span>{{ propertyObj.state }}</span>
                            <span>{{ propertyObj.zip }}</span>
                        </div>
                        <div class="events">
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" v-bind:style="{ width: completionPercentage + '%' }">
                                    {{ completionPercentage }}% Complete (success)
                                </div>
                            </div>
                            <table v-if="propertyObj.events" class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                                <tr v-for="event in propertyObj.events">
                                    <td v-bind:class="{ completed: event.pivot.completed }"><span>{{ event.name }}</span></td>
                                    <td v-bind:class="{ completed: event.pivot.completed }"><span>{{ event.pivot.date + " " + event.pivot.time | moment("dddd, MMMM Do YYYY") }}</span></td>
                                    <td v-bind:class="{ completed: event.pivot.completed }"><span>{{ event.pivot.date + " " + event.pivot.time | moment("h:m A") }}</span></td>
                                    <td v-bind:class="{ completed: event.pivot.completed }"><span>{{ getStatus(event.pivot.date, event.pivot.completed) }}</span></td>
                                    <td>
                                        <a href="#" @click="edit(event.pivot.id)">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" @click="complete(event.pivot.id)">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" @click="notify(event.pivot.id)">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <modal></modal>
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
        completionDay: '',
        completionPercentage: '',
      }
    },
    mounted() {
      this.propertyObj = this.getProperty;
      this.completionDay = this.getCompletionDay;
      this.completionPercentage = this.getCompletionPercentage;
    },
    computed: {
      getProperty()
      {
        var results = JSON.parse(this.property);
        return results;
      },
      getCompletionDay()
      {
        var results = this.propertyObj.completion_date.day;
        return results;
      },
      getCompletionPercentage()
      {
        var results = this.propertyObj.calculations.percentage * 100;
        results = results.toFixed(0)
        return results;
      },
    },
    methods: {
      getStatus(date, completed = false){
        var eventDate = Date.parse(date)
        var now = new Date();

        if(!completed){
          if(eventDate > now.setHours(0,0,0,0)) {
            return "Upcoming";
          } else {
            return "Overdue";
          }
        } else {
          return "Completed";
        }
      },
      edit(id){

      },
      complete: function(id) {
        axios.post('/properties/' + id + '/complete', { data: {} })
          .then(function(response) {
            if(response.data.success){
              console.log($(this));
            }
          })
          .catch(function(error) {
            console.log(error.message);
          });
      },
      notify(id){

      }
    }
  }
</script>

<style>
    .completed {
        text-decoration: line-through;
    }
    .calendar-text {
        margin-top: .25em;
    }
</style>