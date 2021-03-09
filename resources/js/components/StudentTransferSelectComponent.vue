<template>
  <div>
    <select v-model="lessonDateAndTimeId" @change="selectDateCheck">
      <option class="dummy" :value="null" disabled>=========</option>
      <option v-for="(item, id) in lessonDataForSelect" v-bind:value="id">
        {{ item.formatLessonDate }}　{{ item.lessonTime }}
      </option>
    </select>
    <br />

    <div class="st-top-lesson-container" v-if="lessonDateAndTimeId != null">
      <!-- {{ --レッスンタイトル枠-- }} -->
      <div class="st-top-lesson-title">
        <div class="st-top-lesson-title-sub">
          <p class="st-top-lesson-date">{{ this.lessonDate }}</p>
          <div class="st-top-lesson-category">
            <i class="fas fa-clock"></i>
            <span class="st-top-lesson-time">{{ this.lessonTime }}</span>
          </div>
        </div>
      </div>
      <!-- {{ --メイン情報-- }} -->
      <div class="st-top-lesson-main">
        <div class="st-top-lesson-mem-box">
          <div class="st-top-lesson-mem-category">
            <div class="st-top-sub-title-box">
              <i class="fas fa-user"></i>
              <p class="st-top-sub-title">担当コーチ</p>
            </div>
            <p class="st-top-sub-contents">岸本 鷹斗<span> コーチ</span></p>
          </div>
          <div class="st-top-lesson-mem-category">
            <div class="st-top-sub-title-box">
              <i class="fas fa-star"></i>
              <p class="st-top-sub-title">クラス</p>
            </div>
            <p class="st-top-sub-contents">
              {{ this.grade }}<span> クラス</span>
            </p>
          </div>
          <div class="st-top-lesson-mem-category">
            <div class="st-top-sub-title-box">
              <i class="fas fa-star"></i>
              <p class="st-top-sub-title">練習項目１</p>
            </div>
            <p class="st-top-sub-contents">
              練習の説明、ポイント<span> クラス</span>
            </p>
          </div>
          <div class="st-top-lesson-mem-category">
            <div class="st-top-sub-title-box">
              <i class="fas fa-star"></i>
              <p class="st-top-sub-title">練習項目２</p>
            </div>
            <p class="st-top-sub-contents">
              練習の説明、ポイント<span> クラス</span>
            </p>
          </div>
        </div>
      </div>
      <input type="hidden" :value="this.lessonId" name="nowLessonId" />
      <input type="hidden" :value="this.courseId" name="courseId" />
      <input
        type="hidden"
        :value="this.targetLessonDate"
        name="targetLessonDate"
      />

      <button type="submit" class="btn btn-success">この練習に変更する</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    lessonDataForSelect: Array,
  },
  mounted() {
    console.log(this.lessonDataForSelect);
  },
  data() {
    return {
      lessonDateAndTimeId: null,
      lessonDate: null,
      lessonTime: null,
      grade: null,
      lessonId: null,
      targetLessonDate: null,
      courseId: null,
    };
  },
  methods: {
    selectDateCheck: function () {
      this.lessonDate = this.lessonDataForSelect[
        this.lessonDateAndTimeId
      ].formatLessonDate;

      this.lessonTime = this.lessonDataForSelect[
        this.lessonDateAndTimeId
      ].lessonTime;

      this.grade = this.lessonDataForSelect[this.lessonDateAndTimeId].grade;

      this.courseId = this.lessonDataForSelect[
        this.lessonDateAndTimeId
      ].courseId;

      this.lessonId = this.lessonDataForSelect[
        this.lessonDateAndTimeId
      ].lessonId;

      this.targetLessonDate = this.lessonDataForSelect[
        this.lessonDateAndTimeId
      ].lessonDate;
    },
  },
};
</script>