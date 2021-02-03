<template>
  <div class="v-pf-search-list">
    <div v-if="isShow">
      <div class="pf-search-btn-show">
        <button class="search-type-btn" @click="setSearchType(0)">
          言語を絞って探す
        </button>
        <button class="search-type-btn" @click="setSearchType(1)">
          スキルを絞って探す
        </button>
        <button class="search-type-btn" @click="setSearchType(2)">
          機能を絞って探す
        </button>
        <button class="search-type-btn" @click="setSearchType(3)">
          キーワードで探す
        </button>
      </div>
    </div>
    <div v-else class="pf-search-btn-show">
      <button class="search-type-btn" @click="showList()">条件検索</button>
    </div>

    <div v-if="type == 0">言語を絞って探す</div>

    <div v-else-if="type == 1">スキルを絞って探す</div>

    <div v-else-if="type == 2">機能を絞って探す</div>

    <div v-else-if="type == 3">キーワードで探す</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isShow: false,
      type: null,
    };
  },
  methods: {
    showList: function () {
      this.isShow = !this.isShow;
    },
    setSearchType: function (typeNum) {
      this.type = typeNum;
    },
  },
};
</script>