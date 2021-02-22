<template>
  <div class="tc-student-search">
    <div class="tc-student-search-title">
      <p>検索条件</p>
    </div>
    <div class="tc-student-search-main">
      <div class="tc-student-search-content">
        <div class="tc-student-search-sub">
          <div class="tc-student-search-form">
            <p>名前</p>
            <input type="text" name="name" />
          </div>
          <div class="tc-student-search-form">
            <p>曜日</p>
            <select name="dayOfWeek" v-model="dayOfWeekSelect">
              <option class="dummy" :value="null" disabled>
                曜日を選択してください
              </option>
              <option
                v-for="(item, id) in formItem['dayOfWeekSelect']"
                v-bind:value="id"
              >
                {{ item }}
              </option>
            </select>
          </div>
        </div>
        <div class="tc-student-search-sub">
          <div class="tc-student-search-form">
            <p>クラス</p>
            <select name="grade" v-model="gradeSelect">
              <option class="dummy" :value="null" disabled>
                クラスを選択してください
              </option>
              <option
                v-for="(item, id) in formItem['gradeSelect']"
                v-bind:value="id"
              >
                {{ item }}
              </option>
            </select>
          </div>
          <div class="tc-student-search-form">
            <p>性別</p>
            <select name="gender" v-model="gender">
              <option class="dummy" :value="null" disabled>
                性別を選択してください
              </option>
              <option
                v-for="(item, id) in formItem['gender']"
                v-bind:value="id"
              >
                {{ item }}
              </option>
            </select>
          </div>
        </div>
        <div class="tc-student-search-sub">
          <div class="tc-student-search-form">
            <p>振替</p>
            <select name="transfar">
              <option class="dummy" value="">振替を選択してください</option>
              <option value="1">振替している</option>
              <option value="0">振替していない</option>
            </select>
          </div>
        </div>
        <div class="tc-student-search-button">
          <button class="btn btn-outline-info search-btn">
            <i class="fas fa-search"></i> 検索する
          </button>
          <button class="btn btn-outline-danger cross-btn">
            <i class="fas fa-times"></i> 条件をクリア
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    formItem: Object,
  },
  data() {
    return {
      test: "test",
      dayOfWeekSelect: null,
      gradeSelect: null,
      gender: null,
    };
  },
  mounted() {
    conl;
  },
};
</script>