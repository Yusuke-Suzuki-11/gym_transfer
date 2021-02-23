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
            <input type="text" v-model="name" />
          </div>
          <div class="tc-student-search-form">
            <p>曜日</p>
            <select v-model="dayOfWeekSelect">
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
            <select v-model="gradeSelect">
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
            <select v-model="gender">
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
            <select v-model="transfer">
              <option class="dummy" :value="null" disabled>
                振替を選択してください
              </option>
              <option :value="0">振替していない</option>
              <option :value="1">振替している</option>
            </select>
          </div>
        </div>
        <div class="tc-student-search-button">
          <button
            class="btn btn-outline-info search-btn js-st-search-btn"
            v-on:click="searchStudent"
          >
            <i class="fas fa-search"></i> 検索する
          </button>
          <button
            class="btn btn-outline-danger cross-btn"
            v-on:click="formClear"
          >
            <i class="fas fa-times"></i> 条件をクリア
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    formItem: Object,
    url: String,
  },
  mounted() {},
  data() {
    return {
      name: null,
      dayOfWeekSelect: null,
      gradeSelect: null,
      gender: null,
      transfer: null,
    };
  },
  methods: {
    formClear: function () {
      this.name = null;
      this.dayOfWeekSelect = null;
      this.gradeSelect = null;
      this.gender = null;
      this.transfer = null;
    },
    searchStudent: function () {
      if (
        this.name == null &&
        this.dayOfWeekSelect == null &&
        this.gradeSelect == null &&
        this.gender == null &&
        this.transfer == null
      ) {
        alert("検索条件を入力してください");
        return;
      }
      axios
        .get(this.url, {
          params: {
            name: this.name,
            dayOfWeek: this.dayOfWeekSelect,
            grade: this.gradeSelect,
            gender: this.gender,
            transfer: this.transfer,
          },
        })
        .then();
    },
  },
};
</script>