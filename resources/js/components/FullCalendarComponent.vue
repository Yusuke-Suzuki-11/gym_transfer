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
  created: function () {
    this.formatDate();
  },
  data() {
    return {
      calendarOptions: {
        locale: "ja",
        plugins: [dayGridPlugin, interactionPlugin],
        headerToolbar: {
          left: null,
          center: "title",
          right: "prev,next",
        },
        events: this.dateData,
        eventClick: this.test,
        timeZone: "Asia/Tokyo",
      },
    };
  },
  methods: {
    test: function () {
      alert("test");
    },
    formatDate: function () {
      var elements = info.querySlelectAll(".fc-daygrid-day-number");
      Array.prototype.forEach.call(elements, function (el) {
        el.textContent = el.textContent.replace("日", "");
      });
    },
  },
};
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>