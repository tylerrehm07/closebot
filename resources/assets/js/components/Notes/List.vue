<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Note</div>
                    <div class="panel-body">
                        <div class="details">
                            <span>{{ noteObj.address1 }}</span>
                            <span>{{ noteObj.city }}</span>
                            <span>{{ noteObj.state }}</span>
                            <span>{{ noteObj.zip }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['note'],
        data: function() {
            return {
                noteObj: '',
            }
        },
        mounted() {
            this.noteObj = this.getNote;
        },
        computed: {
            getNote()
            {
                var results = JSON.parse(this.note);
                return results;
            },
        },
        methods: {

        }
    }
</script>
