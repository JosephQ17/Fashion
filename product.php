<!DOCTYPE html>
<html>
  <head>
    <title>Product</title>
    <style>
      * {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.whole-product-container {
  width: 100%;
  height: 700px;
  background: rgba(255, 255, 255, 1);
  opacity: 1;
  overflow: hidden;
  justify-content: center;
  align-items: center;
}
.container {
  width: 825px;
  height: 600px;
  background: rgba(254, 243, 226, 1);
  opacity: 1;
  position: absolute;
  top: 70px;
  left: 22rem;
  border: 2px solid rgba(250, 64, 50, 1);
  border-radius: 12px;
  overflow: hidden;
  margin: 0;
}
.img-container {
  width: 322px;
  height: 320px;
  background: rgba(250, 64, 50, 1);
  opacity: 1;
  position: absolute;
  top: 110px;
  left: 395px;
  border-radius: 12px 12px 0px 0px;
  overflow: hidden;
}

.img-box{
  height: 20rem;
}

.img-box img{
  height: 250px;
  width: 250px;
  margin: 2.3rem;
}

.description-box {
  width: 375px;
  height: 511px;
  background: rgba(250, 64, 50, 1);
  opacity: 1;
  position: absolute;
  top: 110px;
  left: 760px;
  border-radius: 12px;
  overflow: hidden;
}
.additional-info {
  width: 322px;
  height: 206px;
  background: rgba(255, 255, 255, 1);
  opacity: 1;
  position: absolute;
  top: 430px;
  left: 395px;
  border-radius: 0px 0px 12px 12px;
  overflow: hidden;
}
.price {
  width: 190px;
  color: rgba(226, 33, 33, 1);
  position: absolute;
  top: 440px;
  left: 410px;
  font-family: Inter;
  font-weight: bold;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.product-info {
  width: 285px;
  color: rgba(0, 0, 0, 1);
  position: absolute;
  top: 480px;
  left: 413px;
  font-family: Inter;
  font-size: 13px;
  opacity: 1;
  text-align: left;
}
.product-name {
  width: 354px;
  color: rgba(255, 255, 255, 1);
  position: absolute;
  top: 120px;
  left: 775px;
  font-family: Inter;
  font-weight: bold;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.description {
  width: 375px;
  height: 465px;
  background: rgba(255, 255, 255, 1);
  opacity: 1;
  position: absolute;
  top: 170px;
  left: 760px;
  border-radius: 0px 0px 12px 12px;
  overflow: hidden;
}

.detailed-description {
  width: 353px;
  color: rgba(0, 0, 0, 1);
  position: absolute;
  top: 180px;
  left: 775px;
  font-family: Inter;
  font-weight: bold;
  font-size: 13px;
  opacity: 1;
  text-align: left;
}

    </style>
  </head>
  <body>
    <div class="whole-product-container">
        <div class="container"></div>

          <div class="img-container">
            <div class="img-box">
              <img src="S1.png" alt="">
            </div>
          </div>

        <div class="description-box"></div>
        <div class="additional-info"></div>
        <span class="price">1000$</span>
            <span class="product-info">
                10k+ sold<br />
                Tanay, Rizal<br />
                Stock: 143
            </span>
        <span class="product-name">Jordan 11 Space Jam</span>

        <div class="description"></div>
        

            <span class="detailed-description">
                Air Jordan shoes are a line of basketball shoes designed by Nike for Michael Jordan, a former NBA player: <br />
                Name<br />
                The name "Air Jordan" is a combination of "Air", which refers to the shoes' air cushion technology, and "Jordan", which is the name of the player.
            </span>
    </div>
  </body>
</html>
