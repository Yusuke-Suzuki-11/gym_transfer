
<template>
  <FullCalendar defaultView="dayGridMonth" :plugins="calendarPlugins" />
  <p>test</p>
  <p>test</p>
  <p>test</p>
  <p>test</p>
  <p>test</p>
  <p>test</p>
  <p>test</p>
</template>

<script>
// import FullCalendar from "@fullcalendar/vue";
import fullcalendar from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import jaLocale from "@fullcalendar/core/locales/ja";
import FullCalendar from "@fullcalendar/vue";

export default {
  components: {
    FullCalendar,
  },
  data() {
    return {
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
      },
    };
  },
};
</script>


