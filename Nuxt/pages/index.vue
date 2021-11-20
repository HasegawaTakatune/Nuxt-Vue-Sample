<template>
  <Tutorial />
</template>

<script>
export default {
  mounted() {
    var list = ["sample", "test"];
    var test = new RegExp(list.join("|"), "g");
    var str = ["min", "max", "testsadfasdf", "zxcvasdsample", "hoge"];

    console.log(test);
    for (var i = 0; i < str.length; i++) {
      if (test.test(str[i])) {
        console.log("マッチしたよ >> " + str[i]);
      } else {
        console.log("マッチしなかったよ");
      }
    }
  },
};
</script>
