<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";

export default {
  components: {
    FullCalendar, // make the <FullCalendar> tag available
  },
  props: {
    dateData: {
      type: Array,
    },
  },
  data() {
    return {
      calendarOptions: {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        headerToolbar: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        initialView: "dayGridMonth",
        events: this.dateData,
        eventClick: this.test,
      },
    };
  },
  methods: {
    test: function () {
      alert("test");
    },
  },
};
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>