<template>
        <div class="row ">
            <div class="col-12">
                <h1>EVENT CALENDAR</h1>
            </div>
            <div class="col-4">
                <form @submit.prevent="Save">
                <div class="form-group">
                    <label for="eventName">Event Name</label>
                    <input class="form-control" id="eventName" name="eventName" type="text" v-model="form.eventName">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="dateFrom">Event Name</label>
                        <input type="date" id="dateFrom" name="dateFrom" class="form-control" v-model="dateFrom">
                    </div>
                    <div class="col-6">
                        <label for="dateTo">Event Name</label>
                        <input type="date" id="dateTo" name="dateTo" class="form-control" v-model="dateTo">
                    </div>
                </div>
                <div class="mt-4">
                    <input type="checkbox" class="mx-2" value="0" v-model="days">
                    <label for="mon">Mon</label>
                    <input type="checkbox" class="mx-2" value="1" v-model="days">
                    <label for="tue">Tue</label>
                    <input type="checkbox" class="mx-2" value="2" v-model="days">
                    <label for="wed">Wed</label>
                    <input type="checkbox" class="mx-2" value="3" v-model="days">
                    <label for="thu">Thu</label>
                    <input type="checkbox" class="mx-2" value="4" v-model="days">
                    <label for="fri">Fri</label>
                    <input type="checkbox" class="mx-2" value="5" v-model="days">
                    <label for="sat">Sat</label>
                    <input type="checkbox" class="mx-2" value="6" v-model="days">
                    <label for="sun">Sun</label>
                </div>
                
                <button class="btn btn-primary mt-2" type="submit">Save</button>
                </form>
            </div>
            <div class="col-8">
                <h1>January</h1>
                <table class="table">

                    <tr v-for="days of jan">
                        <td>
                            <span v-text="days.getDate()"></span>
                        </td>
                        <td>
                            <div v-for="event of form.events">
                                <!-- <span v-text="event"></span> -->
                                <div v-if="event.getDate() == days.getDate()">
                                    <span v-text="form.eventName"></span>
                                </div>
                            </div>
                        </td>
                    </tr>

                </table>
                <div >
                    <div></div>
                </div>
            </div>

        </div>
</template>

<script>
    export default {
        mounted() {
            let first = new Date('2021/01/01');
            let last = new Date('2021/01/31');

            for(let i = first.getDate(); i <= last.getDate(); i++){
                    let newDt = new Date(first);
                    this.jan.push(newDt);
                    first.setDate(first.getDate() + 1);
                }
        },
       data() {
            return {
                form: new Form({
                    eventName: '',
                    events: ''
                }),
                dateFrom: '',
                dateTo: '',
                days: [],
                jan: []
                // events: [],
            }   
        },
        computed: {
          
        },
        methods: {
            Save: function() {
                this.form.events = [];
                let dateFrom = new Date(this.dateFrom);
                let dateTo = new Date(this.dateTo);            

                for(let i = dateFrom.getDate(); i <= dateTo.getDate(); i++){
                    let newDate = new Date(dateFrom);
                    for(const day of this.days){
                        // console.log(day);
                        if(day == newDate.getDay()){
                            // console.log('NEW DATE', newDate)
                        //     this.events.push({
                        //         event_date: this.newDate,
                        //         event_name: this.eventName
                        // });
                        this.form.events.push(newDate);
                        }
                    }
                    dateFrom.setDate(dateFrom.getDate() + 1);
                }

                console.log(this.form.events);
                this.form.post('api/event');
            }
        }
    }
</script>
