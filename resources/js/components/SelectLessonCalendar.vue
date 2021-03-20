<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import bootstrapPlugin from "@fullcalendar/bootstrap";

export default {
  components: {
    FullCalendar, // make the <FullCalendar> tag available
  },
  props: {
    dateData: {
      type: Array,
    },
  },

  mounted: function () {},
  data() {
    return {
      calendarOptions: {
        locale: "ja",
        plugins: [dayGridPlugin, interactionPlugin, bootstrapPlugin],
        themeSystem: "bootstrap",
        headerToolbar: {
          left: null,
          center: "title",
          right: "prev,next",
        },
        events: this.dateData,
        timeZone: "Asia/Tokyo",
        dayCellContent: function (e) {
          e.dayNumberText = e.dayNumberText.replace("日", "");
        },
        showNonCurrentDates: false,
      },
    };
  },
  methods: {},
};
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>