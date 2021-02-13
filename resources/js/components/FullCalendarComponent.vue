<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import jaLocale from "@fullcalendar/core/locales/ja";
import timeGridPlugin from "@fullcalendar/timegrid";

export default {
  components: {
    FullCalendar, // make the <FullCalendar> tag available
  },
  data() {
    return {
      locale: jaLocale,
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        dateClick: this.handleDateClick,
        events: [
          { title: "event 1", date: "2019-04-01" },
          { title: "event 2", date: "2019-04-02" },
        ],
      },
      calendarOptions: {
        plugins: [dayGridPlugin, timeGridPlugin],
        headerToolbar: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
      },
    };
  },
};
</script>
<template>
  <FullCalendar
    :options="calendarOptions"
    :locale="locale"
    :header="calendarHeader"
  />
</template>