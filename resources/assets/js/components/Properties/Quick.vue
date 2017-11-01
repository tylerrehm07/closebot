<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Property's Information
                        <div class="pull-right">
                            <a href="#" v-on:click="edit(propertyObj.id)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="#" v-on:click="complete(propertyObj.id)"><i class="fa fa-check" aria-hidden="true"></i></a>
                            <a href="#" v-on:click="destroy(propertyObj.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <a href="#" v-on:click="show(propertyObj.id)"><i class="fa fa-search" aria-hidden="true"></i></a>
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
                            <ul v-if="propertyObj.events">
                                <li v-for="event in propertyObj.events">
                                    {{ event.name }} | {{ event.pivot.date }} @ {{ event.pivot.time }}
                                </li>
                            </ul>
                        </div>
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
          edit: function(id) {
            console.log("edit: " + id);
            window.location.href = '/properties/' + id + '/edit/';
          },
          show: function(id) {
            console.log("show: " + id);
            window.location.href = '/properties/' + id + '/';
          },
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
          }
        }
    }
</script>
