<template>
  <div id="404">
    <div class="container center">
      <CompHeader />
      <div class="page404">
        <div class="page404__conteiner">
          <div class="page404__text-block">
            <h1 class="page404__heading">404</h1>
            <h4 class="page404__text">
              We are sorry, but the page you requested was not found
            </h4>
            <router-link to="/project-interno/"><button class="page404__button">
                Back To Home<svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.85938 8.43542L15.5826 8.29857M10.4776 1.91138L17.0005 8.43436L10.3461 15.0887"
                    stroke="#CDA274" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                </svg></button></router-link>
          </div>
          <img class="page404__img" src="@/assets/img/not-found.png" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotFound",
};
</script>

<style lang="scss" scoped>
.center {
  padding-left: calc(50% - 600px);
  padding-right: calc(50% - 600px);
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.page404 {
  display: flex;

  &__conteiner {
    display: flex;
    flex-direction: row;
    align-items: center;
    max-width: 1200px;
    gap: 81px;
  }

  &__text-block {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 569px;
  }

  &__heading {
    color: #cda274;
    font-family: "DM Serif Display";
    font-size: 250px;
    font-style: normal;
    font-weight: 400;
    line-height: 125%;
  }

  &__text {
    color: #292f36;
    font-family: "DM Serif Display";
    font-size: 35px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    letter-spacing: 0.35px;
    //margin-top: 15px;
    width: 569px;
    margin-bottom: 23px;
  }

  &__button {
    cursor: pointer;
    display: flex;
    padding: 26px 54px;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 10px;
    border-radius: 18px;
    background: #292f36;
    box-shadow: 0px 10px 20px 0px rgba(192, 192, 192, 0.35);
    color: #fff;
    text-align: center;
    font-family: "Jost";
    font-size: 18px;
    font-style: normal;
    font-weight: 600;
    line-height: 125%;
    letter-spacing: 0.36px;

    &:hover {
      background-color: #cda274;
      transition: all 0.8s ease-out;
    }
  }
}
</style>
