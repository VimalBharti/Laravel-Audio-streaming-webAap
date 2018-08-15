<template lang="html">
  <div class="preload" id="preload">
    <div class="preload-logo">
      <!-- MY-<span style="color:darkturquoise;">BYBU</span> -->
      <img src="images/logo.png">
    </div>
    <div class="loader-frame">
      <div class="loader1" id="loader1"></div>
      <div class="loader2" id="loader2"></div>
    </div>
  </div>
</template>

<style lang="css">
  .preload{
    width: 100%;
    height: 100%;background: #f7f7f7;
    position: fixed;
    top: 0;left: 0;bottom: 0;right: 0;z-index: 99999;
  }
  .preload-logo{
    width: 100%;margin:150px auto 50px auto;font-size: 50px;
    text-shadow: -1px 2px 2px #000;text-align: center;color: azure;
  }
  .loader-frame{
    width: 70px;height: 70px;
    margin: auto;position: relative;
  }
  .loader1, .loader2{
    position: absolute;
    border: 1px solid transparent;border-radius: 50%;
  }
  .loader1{
    width: 70px;height: 70px;border-top: 8px solid #333;border-bottom: 8px solid #333;
    animation: clockwisespin 2s linear 3;
  }
  .loader2{
    width: 60px;height: 60px;border-top: 6px solid #890454;border-bottom: 5px solid #890454;
    top:5px;left: 5px;animation: anticlockwisespin 2s linear 3;
  }
  @keyframes clockwisespin {
    from{transform: rotate(0deg);}
    to{transform: rotate(360deg);}
  }
  @keyframes anticlockwisespin {
    from{transform: rotate(0deg);}
    to{transform: rotate(-360deg);}
  }
  @keyframes fadeout {
    from {opacity: 1;}
    to {opacity: 0;}
  }
</style>
