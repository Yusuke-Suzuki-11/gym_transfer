<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

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
  mounted: function () {},
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
        timeZone: "Asia/Tokyo",
      },
    };
  },
  methods: {
    formatDate: function () {
      var elements = document.querySelectorAll(".fc-daygrid-day-number");
      Array.prototype.forEach.call(elements, function (el) {
        alert(el.textContent);
        el.textContent = el.textContent.replace("日", "");
      });
    },
  },
};
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>