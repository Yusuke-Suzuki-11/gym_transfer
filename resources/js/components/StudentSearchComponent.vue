<template>
  <div class="tc-student-box">
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
              <select name="dayOfWeek"></select>
            </div>
          </div>
          <div class="tc-student-search-sub">
            <div class="tc-student-search-form">
              <p>クラス</p>
              <select name="grade">
                <option value="">----</option>
              </select>
            </div>
            <div class="tc-student-search-form">
              <p>性別</p>
              <select name="gender">
                <option value="">----</option>
              </select>
            </div>
          </div>
          <div class="tc-student-search-sub">
            <div class="tc-student-search-form">
              <p>性別</p>
              <select name="gender">
                <option value="">----</option>
              </select>
            </div>
            <div class="tc-student-search-form">
              <p>振替</p>
              <select name="transfar">
                <option value="">----</option>
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      test: "test",
    };
  },
};
</script>